<?php

// Symbols available (there are some more, PR if you want to add new ones)
$symbols = [
    // Commodities - Energy
    'E_Light' => 1324375200, // Light starting from 2011.12.20 10:00
    'E_Brent' => 1326988800, // Brent starting from 2012.01.19 16:00

    // Commodities - Metals
    'E_Copper'    => 1326988800, // Copper starting from 2012.01.19 16:00
    'E_Palladium' => 1326988800, // Palladium starting from 2012.01.19 16:00
    'E_Platinum'  => 1326988800, // Platinum starting from 2012.01.19 16:00
    
    // Indices - Europe
    'E_DJE50XX'   => 1326988800, // Europe 50 starting from 2012.01.19 16:00
    'E_CAAC40'    => 1326988800, // France 40 starting from 2012.01.19 16:00
    'E_Futsee100' => 1326988800, // UK 100 starting from 2012.01.19 16:00
    'DEUIDXEUR'   => 1326988800, // Germany 30 starting from 2012.01.19 16:00
    'E_SWMI'      => 1326988800, // Switzerland 20 starting from 2012.01.19 16:00
    'ESPIDXEUR'   => 1325487631, // Spain 35 starting from 2012.01.02 08:00

    // Indices - Americas
    'E_NQcomp'     => 1326988800, // US Tech Composite starting from 2012.01.19 16:00
    'E_Nysseecomp' => 1326988800, // US Composite starting from 2012.01.19 16:00
    'E_DJInd'      => 1326988800, // US 30 starting from 2012.01.19 16:00
    'E_NQ100'      => 1326988800, // US 100 Tech starting from 2012.01.19 16:00
    'E_SandP500'   => 1326988800, // US 500 starting from 2012.01.19 16:00
    'E_AMMEKS'     => 1326988800, // US Average starting from 2012.01.19 16:00

    // Indices - Asia / Pacific
    'E_HKong'   => 1328475600, // Hong Kong 40 starting from 2012.02.05 21:00
    'E_SCKorea' => 1326988800, // Korea 200 starting from 2012.01.19 16:00
    'E_N225Jap' => 1328486400, // Japan 225 starting from 2012.02.06 00:00

    // Stocks - Australia
    'E_ANZASX' => 1348146000, // Australia & Nz Banking starting from 2012.09.20 13:00
    'E_BHPASX' => 1348156800, // Bhp Billiton starting from 2012.09.20 16:00
    'E_CBAASX' => 1348156800, // Commonwealth Bank Of Australia starting from 2012.09.20 16:00
    'E_NABASX' => 1348156800, // National Australia Bank starting from 2012.09.20 16:00
    'E_WBCASX' => 1348156800, // Westpac Banking starting from 2012.09.20 16:00

    // Stocks - Hungary
    'E_EGISBUD'     => 1348146000, // Egis Nyrt starting from 2012.09.20 13:00
    'E_MOLBUD'      => 1348146000, // Mol Hungarian Oil & Gas Nyrt starting from 2012.09.20 13:00
    'E_MTELEKOMBUD' => 1348146000, // Magyar Telekom Telecommunications starting from 2012.09.20 13:00
    'E_OTPBUD'      => 1348146000, // Ot Bank Nyrt starting from 2012.09.20 13:00
    'E_RICHTERBUD'  => 1348146000, // Richter Gedeon Nyrt starting from 2012.09.20 13:00

    // Stocks - France
    'E_BNPEEB' => 1341594000, // BNP Paribas starting from 2012.07.06 17:00
    'E_FPEEB'  => 1341594000, // Total starting from 2012.07.06 17:00
    'E_FTEEEB' => 1341594000, // France Telecom starting from 2012.07.06 17:00
    'E_MCEEB'  => 1341594000, // LVMH Moet Hennessy Louis Vuitton starting from 2012.07.06 17:00
    'E_SANEEB' => 1341594000, // Sanofi starting from 2012.07.06 17:00

    // Stocks - Netherlands
    'E_MTEEB'   => 1333101600, // ArcelorMittal starting from 2012.03.30 10:00
    'E_PHIA'    => 1341406800, // Koninklijke Philips Electronics starting from 2012.07.04 13:00
    'E_RDSAEEB' => 1333101600, // Royal Dutch Shell starting from 2012.03.30 10:00
    'E_UNAEEB'  => 1333101600, // Unilever starting from 2012.03.30 10:00

    // Stocks - Germany
    'E_BAY'     => 1330948800, // Bayer starting from 2012.03.05 12:00
    'E_BMWXET'  => 1333101600, // BMW starting from 2012.03.30 10:00
    'E_EOANXET' => 1333101600, // E.On starting from 2012.03.30 10:00
    'E_SIEXET'  => 1341604800, // Siemens starting from 2012.07.06 20:00
    'E_VOWXET'  => 1341604800, // Volkswagen starting from 2012.07.06 20:00

    // Stocks - Hong Kong
    'E_0883HKG' => 1341781200, // CNOOC starting from 2012.07.08 21:00
    'E_0939HKG' => 1341784800, // China Construction Bank starting from 2012.07.08 22:00
    'E_0941HKG' => 1341781200, // China Mobile starting from 2012.07.08 21:00
    'E_1398HKG' => 1341781200, // ICBC starting from 2012.07.08 21:00
    'E_3988HKG' => 1341784800, // Bank Of China starting from 2012.07.08 22:00

    // Stocks - UK
    'E_BLTLON' => 1333101600, // BHP Billiton starting from 2012.03.30 10:00
    'E_BP'     => 1326988800, // BP starting from 2012.01.19 16:00
    'E_HSBA'   => 1326988800, // HSBC Holdings starting from 2012.01.19 16:00
    'E_RIOLON' => 1333101600, // Rio Tinto starting from 2012.03.30 10:00
    'E_VODLON' => 1333101600, // Vodafone starting from 2012.03.30 10:00

    // Stocks - Spain
    'E_BBVAMAC' => 1348149600, // BBVA starting from 2012.09.20 14:00
    'E_IBEMAC'  => 1348149600, // Iberdrola starting from 2012.09.20 14:00
    'E_REPMAC'  => 1348149600, // Repsol starting from 2012.09.20 14:00
    'E_SANMAC'  => 1348149600, // Banco Santander starting from 2012.09.20 14:00
    'E_TEFMAC'  => 1348149600, // Telefonica starting from 2012.09.20 14:00

    // Stocks - Italy
    'E_EN'     => 1348146000, // Enel starting from 2012.09.20 13:00
    'E_ENIMIL' => 1348146000, // Eni starting from 2012.09.20 13:00
    'E_FIA'    => 1348146000, // Fiat starting from 2012.09.20 13:00
    'E_GMIL'   => 1348146000, // Generali starting from 2012.09.20 13:00
    'E_ISPMIL' => 1348146000, // Intesa Sanpaolo starting from 2012.09.20 13:00
    'E_UCGMIL' => 1348146000, // Unicredit starting from 2012.09.20 13:00

    // Stocks - Denmark
    'E_CARL_BOMX'   => 1348149600, // Carlsberg starting from 2012.09.20 14:00
    'E_DANSKEOMX'   => 1348149600, // Danske Bank starting from 2012.09.20 14:00
    'E_MAERSK_BOMX' => 1348149600, // Moeller Maersk B starting from 2012.09.20 14:00
    'E_NOVO_BOMX'   => 1348149600, // Novo Nordisk starting from 2012.09.20 14:00
    'E_VWSOMX'      => 1348149600, // Vestas Wind starting from 2012.09.20 14:00

    // Stocks - Sweden
    'E_SHB_AOMX'  => 1348149600, // Svenska Handelsbanken starting from 2012.09.20 14:00
    'E_SWED_AOMX' => 1348149600, // Swedbank starting from 2012.09.20 14:00
    'E_TLSNOMX'   => 1348149600, // Teliasonera starting from 2012.09.20 14:00
    'E_VOLV_BOMX' => 1348149600, // Volvo B starting from 2012.09.20 14:00
    'E_NDAOMX'    => 1348149600, // Nordea Bank starting from 2012.09.20 14:00

    // Stocks - Norway
    'E_DNBOSL'  => 1348146000, // DNB starting from 2012.09.20 13:00
    'E_SDRLOSL' => 1348146000, // Seadrill starting from 2012.09.20 13:00
    'E_STLOSL'  => 1348146000, // StatoilHydro starting from 2012.09.20 13:00
    'E_TELOSL'  => 1348146000, // Telenor starting from 2012.09.20 13:00
    'E_YAROSL'  => 1348146000, // Yara starting from 2012.09.20 13:00

    // Stocks - Singapore
    'E_C07SES' => 1348149600, // Jardine Matheson starting from 2012.09.20 14:00
    'E_D05SES' => 1348149600, // DBS Group starting from 2012.09.20 14:00
    'E_O39SES' => 1348153200, // Oversea-Chinese Banking starting from 2012.09.20 15:00
    'E_U11SES' => 1348149600, // United Overseas Bank starting from 2012.09.20 14:00
    'E_Z74SES' => 1348149600, // Singapore Telecommunications starting from 2012.09.20 14:00

    // Stocks - Switzerland
    'E_CSGN'    => 1326988800, // Cs Group starting from 2012.01.19 16:00
    'E_NESN'    => 1326988800, // Nestle starting from 2012.01.19 16:00
    'E_NOVNSWX' => 1333101600, // Novartis starting from 2012.03.30 10:00
    'E_UBSN'    => 1326988800, // UBS starting from 2012.01.19 16:00

    // Stocks - Austria
    'E_ANDRVIE' => 1348149600, // Andritz starting from 2012.09.20 14:00
    'E_EBS'     => 1348149600, // Erste Group Bank starting from 2012.09.20 14:00
    'E_OMVVIE'  => 1348149600, // OMV starting from 2012.09.20 14:00
    'E_RBIVIE'  => 1348149600, // Raiffeisen Bank starting from 2012.09.20 14:00
    'E_VOE'     => 1348149600, // Voestalpine starting from 2012.09.20 14:00

    // Stocks - Poland
    'E_KGHWAR'    => 1348146000, // KGHM Polska Miedz starting from 2012.09.20 13:00
    'E_PEOWAR'    => 1348146000, // Bank Pekao starting from 2012.09.20 13:00
    'E_PKNWAR'    => 1348146000, // Polski Koncern Naftowy Orlen starting from 2012.09.20 13:00
    'E_PKOBL1WAR' => 1348146000, // Powszechna Kasa Oszczednosci Bank Polski starting from 2012.09.20 13:00
    'E_PZUWAR'    => 1348146000, // Powszechny Zaklad Ubezpieczen starting from 2012.09.20 13:00

    // Stocks - US
    'E_AAPL'  => 1333101600, // Apple starting from 2012.03.30 10:00
    'E_AMZN'  => 1324375200, // Amazon starting from 2011.12.20 10:00
    'E_AXP'   => 1326988800, // American Express starting from 2012.01.19 16:00
    'E_BAC'   => 1324375200, // Bank Of America starting from 2011.12.20 10:00
    'E_CL'    => 1333101600, // Colgate Palmolive starting from 2012.03.30 10:00
    'E_CSCO'  => 1324375200, // Cisco starting from 2011.12.20 10:00
    'E_DELL'  => 1326988800, // Dell starting from 2012.01.19 16:00
    'E_DIS'   => 1324375200, // Disney Walt starting from 2011.12.20 10:00
    'E_EBAY'  => 1326988800, // Ebay starting from 2012.01.19 16:00
    'E_GE'    => 1324375200, // General Electric starting from 2011.12.20 10:00
    'E_GM'    => 1324375200, // General Motors starting from 2011.12.20 10:00
    'E_GOOGL' => 1324375200, // Google starting from 2011.12.20 10:00
    'E_HD'    => 1326988800, // Home Depot starting from 2012.01.19 16:00
    'E_HPQ'   => 1324375200, // Hewlett Packard starting from 2011.12.20 10:00
    'E_IBM'   => 1324375200, // IBM starting from 2011.12.20 10:00
    'E_INTC'  => 1324375200, // Intel starting from 2011.12.20 10:00
    'E_JNJ'   => 1324375200, // Johnson & Johnson starting from 2011.12.20 10:00
    'E_JPM'   => 1324375200, // JPMorgan Chase starting from 2011.12.20 10:00
    'E_KO'    => 1324375200, // Coca Cola starting from 2011.12.20 10:00
    'E_MCD'   => 1324375200, // McDonalds starting from 2011.12.20 10:00
    'E_MMM'   => 1324375200, // 3M starting from 2011.12.20 10:00
    'E_MSFT'  => 1324375200, // Microsoft starting from 2011.12.20 10:00
    'E_ORCL'  => 1324375200, // Oracle starting from 2011.12.20 10:00
    'E_PG'    => 1324375200, // Procter & Gamble starting from 2011.12.20 10:00
    'E_PM'    => 1333105200, // Philip Morris starting from 2012.03.30 11:00
    'E_SBUX'  => 1326988800, // Starbucks starting from 2012.01.19 16:00
    'E_T'     => 1324378800, // AT&T starting from 2011.12.20 11:00
    'E_UPS'   => 1333105200, // UPS starting from 2012.03.30 11:00
    'E_VIXX'  => 1326988800, // Cboe Volatility Index starting from 2012.01.19 16:00
    'E_WMT'   => 1326988800, // Wal-Mart Stores starting from 2012.01.19 16:00
    'E_XOM'   => 1324375200, // Exxon Mobil starting from 2011.12.20 10:00
    'E_YHOO'  => 1326988800, // Yahoo starting from 2012.01.19 16:00

    // Forex majors
    'AUDUSD' => 1175270400, // starting from 2007.03.30 16:00
    'EURUSD' => 1175270400, // starting from 2007.03.30 16:00
    'GBPUSD' => 1175270400, // starting from 2007.03.30 16:00
    'USDCAD' => 1175270400, // starting from 2007.03.30 16:00
    'USDCHF' => 1175270400, // starting from 2007.03.30 16:00
    'USDJPY' => 1175270400, // starting from 2007.03.30 16:00

    // Forex minors
    'AUDCAD' => 1266318000, // starting from 2010.02.16 11:00
    'AUDCHF' => 1266318000, // starting from 2010.02.16 11:00
    'AUDJPY' => 1175270400, // starting from 2007.03.30 16:00
    'AUDNZD' => 1229961600, // starting from 2008.12.22 16:00
    'CADCHF' => 1266318000, // starting from 2010.02.16 11:00
    'CADJPY' => 1175270400, // starting from 2007.03.30 16:00
    'CHFJPY' => 1175270400, // starting from 2007.03.30 16:00
    'EURAUD' => 1175270400, // starting from 2007.03.30 16:00
    'EURCAD' => 1222167600, // starting from 2008.09.23 11:00
    'EURCHF' => 1175270400, // starting from 2007.03.30 16:00
    'EURGBP' => 1175270400, // starting from 2007.03.30 16:00
    'EURJPY' => 1175270400, // starting from 2007.03.30 16:00
    'EURSEK' => 1175270400, // starting from 2007.03.30 16:00
    'EURNOK' => 1175270400, // starting from 2007.03.30 16:00
    'EURNZD' => 1266318000, // starting from 2010.02.16 11:00
    'GBPAUD' => 1266318000, // starting from 2010.02.16 11:00
    'GBPCAD' => 1266318000, // starting from 2010.02.16 11:00
    'GBPCHF' => 1175270400, // starting from 2007.03.30 16:00
    'GBPJPY' => 1175270400, // starting from 2007.03.30 16:00
    'GBPNZD' => 1266318000, // starting from 2010.02.16 11:00
    'NZDCAD' => 1266318000, // starting from 2010.02.16 11:00
    'NZDCHF' => 1266318000, // starting from 2010.02.16 11:00
    'NZDJPY' => 1266318000, // starting from 2010.02.16 11:00
    'NZDUSD' => 1175270400, // starting from 2007.03.30 16:00
    'USDNOK' => 1222639200, // starting from 2008.09.28 22:00
    'USDSEK' => 1222642800, // starting from 2008.09.28 23:00
    'USDSGD' => 1222642800, // starting from 2008.09.28 23:00

    // Precious metals
    'XAGUSD' => 1289491200, // starting from 2010.11.11 16:00
    'XAUUSD' => 1305010800, // starting from 2011.05.10 07:00
];
