<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/orders' => [[['_route' => 'app_orders', '_controller' => 'App\\Controller\\OrdersController::index'], null, null, null, false, false, null]],
        '/product' => [
            [['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null],
            [['_route' => 'project_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['POST' => 0], null, false, false, null],
        ],
        '/user' => [[['_route' => 'app_user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/lucky/number' => [[['_route' => 'app_lucky_number', '_controller' => 'App\\Controller\\LuckyController::number'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/product/([^/]++)(?'
                    .'|(*:27)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:63)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [
            [['_route' => 'product_show', '_controller' => 'App\\Controller\\ProductController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        63 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
