<?php

/**
 * Dukascopy downloader (Birt's Tick Data Suite original PHP files)
 *
 * 2021 Updated
 *
 * @see LICENSE
 */

// Yeah I know, this is a bullshit but I don't want to waste thousand lines just for 1 best practice
require_once __DIR__ . DIRECTORY_SEPARATOR . 'symbols.php';

// Symbols to download, to download all just: $download = array_keys($symbols);
$download = [
    'ESPIDXEUR',
];

foreach ($download as $symbol)
{
    if (!isset($symbols[$symbol]))
    {
        logger('The symbol ' . $symbol . ' is not in the available list.');

        continue;
    }

    $symbols[$symbol] = time() - 3600 * 24 * 8;

    $tickStart  = $symbols[$symbol] - ($symbols[$symbol] % 3600);
    $tickFinish = time();

    logger('Downloading ' . $symbol . ' starting with ' . gmstrftime('%y-%m-%d %H:%M:%S', $tickStart));

    for ($tick = $tickStart; $tick < $tickFinish; $tick += 3600)
    {
        $year         = gmstrftime('%Y', $tick);
        $month        = str_pad(gmstrftime('%m', $tick) - 1, 2, '0', STR_PAD_LEFT);
        $day          = gmstrftime('%d', $tick);
        $hour         = gmstrftime('%H', $tick);
        $url          = 'http://www.dukascopy.com/datafeed/' . $symbol . '/' . $year . '/' . $month . '/' . $day . '/' . $hour . 'h_ticks.bi5';
        $localPath    = $symbol . '/' . $year . '/' . $month . '/' . $day;
        $localFileBin = $localPath . '/' . $hour . 'h_ticks.bin';
        $localFileBi5 = $localPath . '/' . $hour . 'h_ticks.bi5';

        logger('Processing ' . $symbol . ' ' . $tick . ' - ' . gmstrftime('%y-%m-%d %H:%M:%S', $tick) . ' --- ' . $url);

        if (!file_exists($localPath))
        {
            mkdir($localPath, 0777, true);
        }

        if (!file_exists($localFileBi5) && !file_exists($localFileBin))
        {
            $ch      = false;
            $retries = 0;

            do
            {
                if ($ch !== FALSE)
                {
                    curl_close($ch);
                }

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                $retries++;
            }
            while ($retries <= 3 && curl_errno($ch));

            if (curl_errno($ch))
            {
                logger('Couldn\'t download ' . $url);
                logger('Error was: ' . curl_error($ch));

                exit(1);
            }
            else
            {
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                switch ($httpCode) 
                {
                    case 404:
                        if (isWeekend($tick))
                        {
                            logger('Missing weekend file ' . $url);
                        }
                        else
                        {
                            logger('Missing workday file ' . $url);
                        }

                        break;

                    case 200:
                        if (saveBinary($localFileBi5, $result))
                        {
                            logger('Successfully downloaded ' . $url);
                        }
                        else
                        {
                            logger('Couldn\'t open ' . $binaryFile);

                            exit(1);
                        }

                        break;

                    default:
                        logger('Error when downloading ' . $url);
                        logger('HTTP code was: ' . $httpCode);
                        logger('Content was: ' . $result);

                        break;
                }
            }

            curl_close($ch);
        }
        else
        {
            logger('Skipping ' . $url . ', local file already exists.');
        }
    }
}

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
        $logFile = __DIR__ . DIRECTORY_SEPARATOR . 'download.log';
        file_put_contents($logFile, "[$timestamp] Script started." . PHP_EOL);
    }

    echo $logEntry;
    error_log($logEntry, 3, $logFile);
}

/**
 * @param int $timestap Unix timestamp to check the day of the week
 *
 * @return bool true if is a weekend day or false if not
 */
function isWeekend(int $timestamp): bool
{
    $day = mb_strtolower(gmstrftime('%a', $timestamp));

    return 'sun' == $day || 'sat' == $day;
}

/**
 * @param string $binaryFile    The file to store the binary content
 * @param string $binaryContent The content itself
 *
 * @return bool true if the content was store successfully or false if not
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