<?php

/**
 * Dukascopy downloader (Birt's Tick Data Suite original PHP files)
 *
 * 2021 Updated
 *
 * @see LICENSE
 */

// Yeah I know, this is a bullshit but I don't want to waste thousand lines just for 1 best practice
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'symbols.php';

// Symbols to download, to download all just: $download = array_keys($symbols);
$download = [
    'ESPIDXEUR',
    'DEUIDXEUR',
    'AUDUSD',
    'EURUSD',
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
    if (!isset($symbols[$symbol]))
    {
        logger('The symbol ' . $symbol . ' is not in the available list');

        continue;
    }

    $maxNotFoundFiles     = 100;
    $maxEmptyFiles        = 100;
    $downloadDirectory    = '';
    $notFoundFiles        = 0;
    $downloadedEmptyFiles = 0;
    $daysToSkip           = 1;
    $currentDateTime      = new \DateTime('now', new \DateTimeZone('UTC'));
    logger('Downloading ' . $symbol . '...');

    while ($maxNotFoundFiles > $notFoundFiles && $maxEmptyFiles > $downloadedEmptyFiles && 1970 < $currentDateTime->format('Y'))
    {
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

        if (!is_file($fileToDownload))
        {
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
                        $notFoundFiles        = 0;
                        $downloadedEmptyFiles = empty($result) ? $downloadedEmptyFiles + 1 : 0;

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
                        logger('Error when downloading ' . $dukascopyUrl);
                        logger('HTTP code was: ' . $httpCode);
                        logger('Content was: ' . $result);

                        break;
                }
            }

            curl_close($curl);
        }
        else
        {
            $currentDateTimeToSkip = clone $currentDateTime;
            $currentDateTimeToSkip->modify('-' . min(30, $daysToSkip) . ' day');
            $relativePathToSkip   = getRelativePath($symbol, $currentDateTimeToSkip);
            $fileToDownloadToSkip = __DIR__ . DIRECTORY_SEPARATOR . $relativePathToSkip;

            if (is_file($fileToDownloadToSkip))
            {
                $daysToSkip++;
                $currentDateTime = $currentDateTimeToSkip;
            }

            logger($dukascopyUrl . ' skipped, local file already exists');
        }
    }
}
