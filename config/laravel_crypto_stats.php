<?php

/**
 * Config params for the LaravelCryptoStats library.
 */

return [

    /*
     * Default cryptocurrencies which user want to use in the application
     */
    'currencies' => [
        'BTC',
        'ETH',
        'LTC',
        'DOGE',
        'DASH',
        'ZEC',
    ],

    /*
     * API key for Etherscan connection
     */
    'etherscan_api_key' => env('ETHERSCAN_API_KEY'),
];
