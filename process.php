<?php

/**
 * Dukascopy processor (Birt's Tick Data Suite original PHP files)
 *
 * 2021 Updated
 *
 * @see LICENSE
 */

// Yeah I know, this is a bullshit but I don't want to waste thousand lines just for 1 best practice
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'symbols.php';

if (5 != $argc)
{
    logger('Invalid command line arguments: php -f ' . implode(' ', $argv));
    logger('Syntax: php -f ' . basename(__FILE__) . ' <CURRENCY_PAIR> <START_DATE> <END_DATE> <OUT_FILE>');
    logger('Example: php -f ' . basename(__FILE__) . ' EURUSD 2020-09 2021-03 EURUSD.csv');

    exit(1);
}

list($script, $symbol, $fromDate, $toDate, $csv) = $argv;

if (!file_exists($symbol))
{
    logger('Symbol ' . $symbol . ' data folder does not exist');

    exit(1);
}

if (7 != strlen($fromDate) || 7 != strlen($toDate))
{
    logger('Input dates must be in YYYY-MM format, for example 2021-03');

    exit(1);
}

if (!validDate($fromDate) || !validDate($toDate))
{
    logger('Invalid input date, must be in range from 1900 and 2100 year and from 1 to 12 month');

    exit(1);
}

$floatPoint                 = getFloatPoint($symbol);
list($fromYear, $fromMonth) = explode('-', $fromDate);
list($toYear, $toMonth)     = explode('-', $toDate);
$startDate                  = gmmktime(0, 0, 0, $fromMonth, 1, $fromYear);
$endDate                    = gmmktime(0, 0, 0, $toMonth, 1, $toYear);
$startDate                 -= $startDate % 3600;
$csvHandler                 = fopen($csv, 'a+');

if (false === $csvHandler)
{
    logger('Cannot open CSV file ' . $csv . ' for writing');

    exit(1);
}

logger('Processing from ' . gmstrftime('%y-%m-%d %H:%M:%S', $startDate) . ' to ' . gmstrftime('%y-%m-%d %H:%M:%S', $endDate));

for ($date = $startDate; $date < $endDate; $date += 3600)
{
    $year  = gmstrftime('%Y', $date);
    $month = str_pad(gmstrftime('%m', $date) - 1, 2, '0', STR_PAD_LEFT);
    $day   = gmstrftime('%d', $date);
    $hour  = gmstrftime('%H', $date);
    $path  = $symbol . '/' . $year . '/' . $month . '/' . $day;
    $file  = $path . '/' . $hour . 'h_ticks.bi5';

    if (!is_file($file))
    {
        logger('Can\'t find file for this date ' . gmstrftime('%y-%m-%d %H:%M:%S', $date));

        continue;
    }

    if (is_file($file))
    {
        decodeBi5File($file, $csvHandler, $date, $floatPoint);
    }
}

fclose($csvHandler);
