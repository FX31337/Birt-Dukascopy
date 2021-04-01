<?php

/**
 * @param string $message The message to show in console and store in the log
 */
function logger(string $message): void
{
    static $logFile = false;

    $timestamp = date('Y-m-d H:i:s');
    $logEntry  = sprintf('[%s] %s%s', $timestamp, $message, PHP_EOL);

    if (!$logFile)
    {
        $logFile = implode(DIRECTORY_SEPARATOR, [__DIR__, 'logs', date('Y-m-d-H-i-s') . '-dukascopy.log']);

        if (!file_exists($logFile))
        {
            mkdir(dirname($logFile));
        }

        file_put_contents($logFile, "[$timestamp] Script started" . PHP_EOL);
    }

    echo $logEntry;
    error_log($logEntry, 3, $logFile);
}

/**
 * @param string $binaryFile    The file to store the binary content
 * @param string $binaryContent The content itself
 *
 * @return bool true if the content was store successfully, false otherwise
 */
function saveBinary(string $binaryFile, string $binaryContent): bool
{
    $handler = fopen($binaryFile, 'wb');

    if (false === $handler)
    {
        return false;
    }

    fwrite($handler, $binaryContent);
    fclose($handler);

    return true;
}

/**
 * @param string $symbol The symbol to check the float point
 *
 * @return float The float point detected
 */
function getFloatPoint(string $symbol): float
{
    if (false !== stripos($symbol, 'jpy') || false !== stripos($symbol, 'rub'))
    {
        return 0.001;
    }

    if (in_array(mb_strtolower($symbol), ['usdrub', 'xagusd', 'xauusd']))
    {
        return 0.001;
    }

    if (in_array(mb_strtolower($symbol), ['espidxeur', 'deuidxeur']))
    {
        //return 0.001;
    }

    return 0.00001;
}

/**
 * @param string $date The date to check format and values
 *
 * @return bool true if is a valid date, false otherwise
 */
function validDate(string $date): bool
{
    if (7 != mb_strlen($date))
    {
        return false;
    }

    list($year, $month) = explode('-', $date);

    if (1900 > $year || date('Y') < $year)
    {
        return false;
    }

    if (1 > $month || 12 < $month)
    {
        return false;
    }

    return true;
}

/**
 * @return string The extractor command detected, empty otherwise
 */
function getExtractor(): string
{
    static $extractor;

    if (!isset($extractor))
    {
        $extractor = '';

        if (false !== stripos(PHP_OS, 'darwin') || false !== stripos(PHP_OS, 'linux'))
        {
            if (exec('lzma -h 2> /dev/null', $output) && !empty($output))
            {
                $extractor = 'lzma -kdc -S bi5 %s';
            }
            elseif (exec('xz -h 2> /dev/null', $output) && !empty($output))
            {
                $extractor = 'xz -dc %s';
            }
        }
        elseif (false !== stripos(PHP_OS, 'win'))
        {
            if (exec('7za 2> NUL', $output) && !empty($output))
            {
                $extractor = '7za e -y -o"%s" %s';
            }
        }
    }

    return $extractor;
}

/**
 * @return bool true if the platform is Windows, false otherwise
 */
function isWindows(): bool
{
    static $isWindows;

    if (!isset($isWindows))
    {
        $isWindows = false !== stripos(PHP_OS, 'win') && false === stripos(PHP_OS, 'darwin');
    }

    return $isWindows;
}

/**
 * @return string The temp directory path
 */
function getTempDir(): string
{
    static $tempDir = '';

    if (empty($tempDir))
    {
        $tempDir = tempnam(sys_get_temp_dir(), 'TCK');
        unlink($tempDir);
        mkdir($tempDir);
    }

    return $tempDir;
}

/**
 * @return string The file|url relative path
 */
function getRelativePath(string $symbol, \DateTime $date): string
{
    return sprintf('%s/%s/%02s/%s/%sh_ticks.bi5', $symbol, $date->format('Y'), $date->format('m') - 1, $date->format('d'), $date->format('H'));
}

function decodeBi5File(string $filename, $csvHandler, string $date, float $floatPoint): void
{
    static $skipBi5 = false;

    if (empty($extractor = getExtractor()) && !$skipBi5)
    {
        logger('There was no program found able to handle LZMA archives, so bi5 files will not be processed');
        logger('To install on Debian-based systems (Ubuntu, Knoppix etc) type: sudo apt-get install lzma');
        logger('To install on Redhat-based systems (CentOS, Fedora etc) type: yum install xz');
        logger('To install on Windows download the command line version of 7-Zip from http://www.7-zip.org/download.html and unpack 7za.exe in the folder ' . __DIR__);
        logger('On Mac & FreeBSD, you have to install lzma from ports, if you don\'t know how, use Google.');
        logger('Press CTRL+C to stop this script or hit Enter to proceed and process the available bin files.');
        $skipBi5 = true;
        
        while ($char = fread(STDIN, 1))
        {
            if ($char == "\n")
            {
                break;
            }

            usleep(250);
        }
    }

    if ($skipBi5)
    {
        logger('Skipping Bi5 file ' . $filename . ' because there is not a valid extractor detected to handle');

        return;
    }

    if (empty(filesize($filename)))
    {
        logger('Skipping Bi5 file ' . $filename . ' because has zero bytes content');

        return;
    }

    logger('Decoding file ' . $filename);

    if (isWindows())
    {
        shell_exec(sprintf($extractor, getTempDir(), $filename));
        $extracted = getTempDir() . DIRECTORY_SEPARATOR . substr(basename($filename), 0, -4);

        if (!is_file($extracted))
        {
            logger('Failed to extract ' . $filename);

            exit(1);
        }

        $content = file_get_contents($extracted);
        unlink($extracted);
    }
    else
    {
        $content = shell_exec(sprintf($extractor, $filename));
    }

    if (empty($content))
    {
        logger('Unable to read extracted file');

        exit(1);
    }

    $seek = 0;
    $size = strlen($content);

    while ($seek < $size)
    {
        $data = unpack('@' . $seek . '/N', $content);

        $delta  = $data[1];
        $secs   = $date + $delta / 1000;
        $msecs  = $delta % 1000;
        $data   = unpack('@' . ($seek + 4) . '/N', $content);
        $ask    = $data[1] * $floatPoint;
        $data   = unpack('@' . ($seek + 8) . '/N', $content);
        $bid    = $data[1] * $floatPoint;
        $data   = unpack('@' . ($seek + 12) . '/C4', $content);
        $pack   = pack('C4', $data[4], $data[3], $data[2], $data[1]);
        $data   = unpack('f', $pack);
        $askVol = $data[1];
        $data   = unpack('@' . ($seek + 16) . '/C4', $content);
        $pack   = pack('C4', $data[4], $data[3], $data[2], $data[1]);
        $data   = unpack('f', $pack);
        $bidVol = $data[1];

        if ($bid == intval($bid))
        {
            $bid = number_format($bid, 1, '.', '');
        }
        
        if ($ask == intval($ask))
        {
            $ask = number_format($ask, 1, '.', '');
        }

        fwrite($csvHandler, gmstrftime('%Y.%m.%d %H:%M:%S', $secs) . '.' . str_pad($msecs, 3, '0', STR_PAD_LEFT) . ',' . $bid . ',' . $ask . ',' .number_format($bidVol, 2, '.', '') . ',' . number_format($askVol, 2, '.', '') . PHP_EOL);
        $seek += 20;
    }
}
