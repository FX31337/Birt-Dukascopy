<?php

// Symbols available (there are some more, PR if you want to add new ones)
$symbols = [
    // Commodities - Energy
    'E_Light', // Light starting from 2011.12.20 10:00
    'E_Brent', // Brent starting from 2012.01.19 16:00

    // Commodities - Metals
    'E_Copper',    // Copper starting from 2012.01.19 16:00
    'E_Palladium', // Palladium starting from 2012.01.19 16:00
    'E_Platinum',  // Platinum starting from 2012.01.19 16:00
    
    // Indices - Europe
    'E_DJE50XX',   // Europe 50 starting from 2012.01.19 16:00
    'E_CAAC40',    // France 40 starting from 2012.01.19 16:00
    'E_Futsee100', // UK 100 starting from 2012.01.19 16:00
    'DEUIDXEUR',   // Germany 30 starting from 2012.01.19 16:00
    'E_SWMI',      // Switzerland 20 starting from 2012.01.19 16:00
    'ESPIDXEUR',   // Spain 35 starting from 2012.01.02 08:00

    // Indices - Americas
    'E_NQcomp',     // US Tech Composite starting from 2012.01.19 16:00
    'E_Nysseecomp', // US Composite starting from 2012.01.19 16:00
    'E_DJInd',      // US 30 starting from 2012.01.19 16:00
    'E_NQ100',      // US 100 Tech starting from 2012.01.19 16:00
    'E_SandP500',   // US 500 starting from 2012.01.19 16:00
    'E_AMMEKS',     // US Average starting from 2012.01.19 16:00

    // Indices - Asia / Pacific
    'E_HKong',   // Hong Kong 40 starting from 2012.02.05 21:00
    'E_SCKorea', // Korea 200 starting from 2012.01.19 16:00
    'E_N225Jap', // Japan 225 starting from 2012.02.06 00:00

    // Stocks - Australia
    'E_ANZASX', // Australia & Nz Banking starting from 2012.09.20 13:00
    'E_BHPASX', // Bhp Billiton starting from 2012.09.20 16:00
    'E_CBAASX', // Commonwealth Bank Of Australia starting from 2012.09.20 16:00
    'E_NABASX', // National Australia Bank starting from 2012.09.20 16:00
    'E_WBCASX', // Westpac Banking starting from 2012.09.20 16:00

    // Stocks - Hungary
    'E_EGISBUD',     // Egis Nyrt starting from 2012.09.20 13:00
    'E_MOLBUD',      // Mol Hungarian Oil & Gas Nyrt starting from 2012.09.20 13:00
    'E_MTELEKOMBUD', // Magyar Telekom Telecommunications starting from 2012.09.20 13:00
    'E_OTPBUD',      // Ot Bank Nyrt starting from 2012.09.20 13:00
    'E_RICHTERBUD',  // Richter Gedeon Nyrt starting from 2012.09.20 13:00

    // Stocks - France
    'E_BNPEEB', // BNP Paribas starting from 2012.07.06 17:00
    'E_FPEEB',  // Total starting from 2012.07.06 17:00
    'E_FTEEEB', // France Telecom starting from 2012.07.06 17:00
    'E_MCEEB',  // LVMH Moet Hennessy Louis Vuitton starting from 2012.07.06 17:00
    'E_SANEEB', // Sanofi starting from 2012.07.06 17:00

    // Stocks - Netherlands
    'E_MTEEB',   // ArcelorMittal starting from 2012.03.30 10:00
    'E_PHIA',    // Koninklijke Philips Electronics starting from 2012.07.04 13:00
    'E_RDSAEEB', // Royal Dutch Shell starting from 2012.03.30 10:00
    'E_UNAEEB',  // Unilever starting from 2012.03.30 10:00

    // Stocks - Germany
    'E_BAY',     // Bayer starting from 2012.03.05 12:00
    'E_BMWXET',  // BMW starting from 2012.03.30 10:00
    'E_EOANXET', // E.On starting from 2012.03.30 10:00
    'E_SIEXET',  // Siemens starting from 2012.07.06 20:00
    'E_VOWXET',  // Volkswagen starting from 2012.07.06 20:00

    // Stocks - Hong Kong
    'E_0883HKG', // CNOOC starting from 2012.07.08 21:00
    'E_0939HKG', // China Construction Bank starting from 2012.07.08 22:00
    'E_0941HKG', // China Mobile starting from 2012.07.08 21:00
    'E_1398HKG', // ICBC starting from 2012.07.08 21:00
    'E_3988HKG', // Bank Of China starting from 2012.07.08 22:00

    // Stocks - UK
    'E_BLTLON', // BHP Billiton starting from 2012.03.30 10:00
    'E_BP',     // BP starting from 2012.01.19 16:00
    'E_HSBA',   // HSBC Holdings starting from 2012.01.19 16:00
    'E_RIOLON', // Rio Tinto starting from 2012.03.30 10:00
    'E_VODLON', // Vodafone starting from 2012.03.30 10:00

    // Stocks - Spain
    'E_BBVAMAC', // BBVA starting from 2012.09.20 14:00
    'E_IBEMAC',  // Iberdrola starting from 2012.09.20 14:00
    'E_REPMAC',  // Repsol starting from 2012.09.20 14:00
    'E_SANMAC',  // Banco Santander starting from 2012.09.20 14:00
    'E_TEFMAC',  // Telefonica starting from 2012.09.20 14:00

    // Stocks - Italy
    'E_EN',     // Enel starting from 2012.09.20 13:00
    'E_ENIMIL', // Eni starting from 2012.09.20 13:00
    'E_FIA',    // Fiat starting from 2012.09.20 13:00
    'E_GMIL',   // Generali starting from 2012.09.20 13:00
    'E_ISPMIL', // Intesa Sanpaolo starting from 2012.09.20 13:00
    'E_UCGMIL', // Unicredit starting from 2012.09.20 13:00

    // Stocks - Denmark
    'E_CARL_BOMX',   // Carlsberg starting from 2012.09.20 14:00
    'E_DANSKEOMX',   // Danske Bank starting from 2012.09.20 14:00
    'E_MAERSK_BOMX', // Moeller Maersk B starting from 2012.09.20 14:00
    'E_NOVO_BOMX',   // Novo Nordisk starting from 2012.09.20 14:00
    'E_VWSOMX',      // Vestas Wind starting from 2012.09.20 14:00

    // Stocks - Sweden
    'E_SHB_AOMX',  // Svenska Handelsbanken starting from 2012.09.20 14:00
    'E_SWED_AOMX', // Swedbank starting from 2012.09.20 14:00
    'E_TLSNOMX',   // Teliasonera starting from 2012.09.20 14:00
    'E_VOLV_BOMX', // Volvo B starting from 2012.09.20 14:00
    'E_NDAOMX',    // Nordea Bank starting from 2012.09.20 14:00

    // Stocks - Norway
    'E_DNBOSL',  // DNB starting from 2012.09.20 13:00
    'E_SDRLOSL', // Seadrill starting from 2012.09.20 13:00
    'E_STLOSL',  // StatoilHydro starting from 2012.09.20 13:00
    'E_TELOSL',  // Telenor starting from 2012.09.20 13:00
    'E_YAROSL',  // Yara starting from 2012.09.20 13:00

    // Stocks - Singapore
    'E_C07SES', // Jardine Matheson starting from 2012.09.20 14:00
    'E_D05SES', // DBS Group starting from 2012.09.20 14:00
    'E_O39SES', // Oversea-Chinese Banking starting from 2012.09.20 15:00
    'E_U11SES', // United Overseas Bank starting from 2012.09.20 14:00
    'E_Z74SES', // Singapore Telecommunications starting from 2012.09.20 14:00

    // Stocks - Switzerland
    'E_CSGN',    // Cs Group starting from 2012.01.19 16:00
    'E_NESN',    // Nestle starting from 2012.01.19 16:00
    'E_NOVNSWX', // Novartis starting from 2012.03.30 10:00
    'E_UBSN',    // UBS starting from 2012.01.19 16:00

    // Stocks - Austria
    'E_ANDRVIE', // Andritz starting from 2012.09.20 14:00
    'E_EBS',     // Erste Group Bank starting from 2012.09.20 14:00
    'E_OMVVIE',  // OMV starting from 2012.09.20 14:00
    'E_RBIVIE',  // Raiffeisen Bank starting from 2012.09.20 14:00
    'E_VOE',     // Voestalpine starting from 2012.09.20 14:00

    // Stocks - Poland
    'E_KGHWAR',    // KGHM Polska Miedz starting from 2012.09.20 13:00
    'E_PEOWAR',    // Bank Pekao starting from 2012.09.20 13:00
    'E_PKNWAR',    // Polski Koncern Naftowy Orlen starting from 2012.09.20 13:00
    'E_PKOBL1WAR', // Powszechna Kasa Oszczednosci Bank Polski starting from 2012.09.20 13:00
    'E_PZUWAR',    // Powszechny Zaklad Ubezpieczen starting from 2012.09.20 13:00

    // Stocks - US
    'E_AAPL',  // Apple starting from 2012.03.30 10:00
    'E_AMZN',  // Amazon starting from 2011.12.20 10:00
    'E_AXP',   // American Express starting from 2012.01.19 16:00
    'E_BAC',   // Bank Of America starting from 2011.12.20 10:00
    'E_CL',    // Colgate Palmolive starting from 2012.03.30 10:00
    'E_CSCO',  // Cisco starting from 2011.12.20 10:00
    'E_DELL',  // Dell starting from 2012.01.19 16:00
    'E_DIS',   // Disney Walt starting from 2011.12.20 10:00
    'E_EBAY',  // Ebay starting from 2012.01.19 16:00
    'E_GE',    // General Electric starting from 2011.12.20 10:00
    'E_GM',    // General Motors starting from 2011.12.20 10:00
    'E_GOOGL', // Google starting from 2011.12.20 10:00
    'E_HD',    // Home Depot starting from 2012.01.19 16:00
    'E_HPQ',   // Hewlett Packard starting from 2011.12.20 10:00
    'E_IBM',   // IBM starting from 2011.12.20 10:00
    'E_INTC',  // Intel starting from 2011.12.20 10:00
    'E_JNJ',   // Johnson & Johnson starting from 2011.12.20 10:00
    'E_JPM',   // JPMorgan Chase starting from 2011.12.20 10:00
    'E_KO',    // Coca Cola starting from 2011.12.20 10:00
    'E_MCD',   // McDonalds starting from 2011.12.20 10:00
    'E_MMM',   // 3M starting from 2011.12.20 10:00
    'E_MSFT',  // Microsoft starting from 2011.12.20 10:00
    'E_ORCL',  // Oracle starting from 2011.12.20 10:00
    'E_PG',    // Procter & Gamble starting from 2011.12.20 10:00
    'E_PM',    // Philip Morris starting from 2012.03.30 11:00
    'E_SBUX',  // Starbucks starting from 2012.01.19 16:00
    'E_T',     // AT&T starting from 2011.12.20 11:00
    'E_UPS',   // UPS starting from 2012.03.30 11:00
    'E_VIXX',  // Cboe Volatility Index starting from 2012.01.19 16:00
    'E_WMT',   // Wal-Mart Stores starting from 2012.01.19 16:00
    'E_XOM',   // Exxon Mobil starting from 2011.12.20 10:00
    'E_YHOO',  // Yahoo starting from 2012.01.19 16:00

    // Forex majors
    'AUDUSD', // starting from 2007.03.30 16:00
    'EURUSD', // starting from 2007.03.30 16:00
    'GBPUSD', // starting from 2007.03.30 16:00
    'USDCAD', // starting from 2007.03.30 16:00
    'USDCHF', // starting from 2007.03.30 16:00
    'USDJPY', // starting from 2007.03.30 16:00

    // Forex minors
    'AUDCAD', // starting from 2010.02.16 11:00
    'AUDCHF', // starting from 2010.02.16 11:00
    'AUDJPY', // starting from 2007.03.30 16:00
    'AUDNZD', // starting from 2008.12.22 16:00
    'CADCHF', // starting from 2010.02.16 11:00
    'CADJPY', // starting from 2007.03.30 16:00
    'CHFJPY', // starting from 2007.03.30 16:00
    'EURAUD', // starting from 2007.03.30 16:00
    'EURCAD', // starting from 2008.09.23 11:00
    'EURCHF', // starting from 2007.03.30 16:00
    'EURGBP', // starting from 2007.03.30 16:00
    'EURJPY', // starting from 2007.03.30 16:00
    'EURSEK', // starting from 2007.03.30 16:00
    'EURNOK', // starting from 2007.03.30 16:00
    'EURNZD', // starting from 2010.02.16 11:00
    'GBPAUD', // starting from 2010.02.16 11:00
    'GBPCAD', // starting from 2010.02.16 11:00
    'GBPCHF', // starting from 2007.03.30 16:00
    'GBPJPY', // starting from 2007.03.30 16:00
    'GBPNZD', // starting from 2010.02.16 11:00
    'NZDCAD', // starting from 2010.02.16 11:00
    'NZDCHF', // starting from 2010.02.16 11:00
    'NZDJPY', // starting from 2010.02.16 11:00
    'NZDUSD', // starting from 2007.03.30 16:00
    'USDNOK', // starting from 2008.09.28 22:00
    'USDSEK', // starting from 2008.09.28 23:00
    'USDSGD', // starting from 2008.09.28 23:00

    // Precious metals
    'XAGUSD', // starting from 2010.11.11 16:00
    'XAUUSD', // starting from 2011.05.10 07:00
];
