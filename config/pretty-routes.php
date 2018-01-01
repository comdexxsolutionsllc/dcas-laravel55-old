<?php

return [

    /**
     * The endpoint to access the routes.
     */
    'url' => 'routes',

    /**
     * The middleware(s) to apply before attempting to access routes page.
     */
    'middlewares' => [],

    /**
     * Indicates whether to enable pretty routes only when debug is enabled (APP_DEBUG).
     */
    'debug_only' => true,

    /**
     * The methods to hide.
     */
    'hide_methods' => [
        'HEAD',
    ],

    /**
     * The routes to hide with regular expression
     */
    'hide_matching' => [
        '#^_debugbar#', // Remove DebugBar
        '#^_dusk#', // Remove Dusk Test
        '#^login#', // Remove Login
        '#^logout#', // Remove Logout
        '#^oauth#', // Remove oAuth
        '#^password#', // Remove Password
        '#^register#', // Remove Register
        '#^routes$#', // Remove Route
        '#^testing#', // Remove Testing
    ],

];
