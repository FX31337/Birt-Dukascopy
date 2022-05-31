<?php

/**
 * Dukascopy downloader (Birt's Tick Data Suite original PHP files)
 *
 * 2022 Updated
 *
 * @see LICENSE
 */

// Yeah I know, this is a bullshit but I don't want to waste thousand lines just for 1 best practice
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'symbols.php';

// Symbols to download, to download all just: $download = $symbols;
$symbols  = $symbols ?? [];
$download = [
    'ESPIDXEUR',
    'DEUIDXEUR',
    'AUDUSD',
    'CHFJPY',
    'EURCHF',
    'EURGBP',
    'EURJPY',
    'EURUSD',
    'GBPCHF',
    'GBPJPY',
    'GBPUSD',
    'USDCAD',
    'USDCHF',
    'USDJPY',
    'XAUUSD',
];

$curlOptions = [
    CURLOPT_BINARYTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
];

foreach ($download as $symbol)
{
    if (!in_array($symbol, $symbols))
    {
        logger('The symbol ' . $symbol . ' is not in the available list');

        continue;
    }

    $maxNotFoundFiles = 12; // 12 hours without data is enough
    $maxErrorFiles    = 6;  // 6 retries between 30 seconds es enough
    $notFoundFiles    = 0;
    $errorFiles       = 0;
    $emptyFiles       = 0;

    try
    {
        $currentDateTime = new DateTime('now', new DateTimeZone('UTC'));
    }
    catch (Exception $e)
    {
        logger('Exit with exception: ' . $e->getMessage());

        exit;
    }

    $downloadDirectory = '';
    logger('Downloading ' . $symbol . '...');

    while (1970 < $currentDateTime->format('Y'))
    {
        if ($maxNotFoundFiles < $notFoundFiles)
        {
            logger('Too many not found files, aborting...');

            break;
        }

        if ($maxErrorFiles < $errorFiles)
        {
            logger('Too many error files, aborting...');

            break;
        }

        $currentDateTime->modify('-1 hour');
        $relativePath   = getRelativePath($symbol, $currentDateTime);
        $fileToDownload = __DIR__ . DIRECTORY_SEPARATOR . $relativePath;
        $dukascopyUrl   = 'http://www.dukascopy.com/datafeed/' . $relativePath;

        if ($downloadDirectory != dirname($fileToDownload))
        {
            $downloadDirectory = dirname($fileToDownload);

            if (!file_exists($downloadDirectory))
            {
                mkdir($downloadDirectory, 0777, true);
            }
        }

        if (is_file($fileToDownload))
        {
            continue;
        }

        $curl    = false;
        $retry   = 0;
        $retries = 10;

        do
        {
            if (false !== $curl)
            {
                curl_close($curl);
            }

            $curl = curl_init($dukascopyUrl);
            curl_setopt_array($curl, $curlOptions);
            $result = curl_exec($curl);
            $retry++;

            if (1 < $retry)
            {
                sleep(1);
            }

        }
        while ($retry <= $retries && curl_errno($curl));

        if (curl_errno($curl))
        {
            logger('Couldn\'t download ' . $dukascopyUrl);
            logger('Error was: ' . curl_error($curl));

            exit(1);
        }
        else
        {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            switch ($httpCode)
            {
                case 404:
                    $notFoundFiles++;
                    logger($dukascopyUrl . ' Not Found');

                    break;

                case 200:
                    $errorFiles    = 0;
                    $notFoundFiles = 0;

                    if (saveBinary($fileToDownload, $result))
                    {
                        logger($dukascopyUrl . ' downloaded ' . mb_strlen($result, '8bit') . ' bytes');
                    }
                    else
                    {
                        logger('Couldn\'t open ' . $fileToDownload);

                        exit(1);
                    }

                    break;

                default:
                    $errorFiles++;
                    $currentDateTime->modify('+1 hour');
                    logger('Error when downloading ' . $dukascopyUrl);
                    logger('HTTP code was: ' . $httpCode);
                    logger('Content was: ' . $result);
                    sleep(30);

                    break;
            }
        }

        curl_close($curl);
    }

    logger('Downloading ' . $symbol . ' completed');
}
