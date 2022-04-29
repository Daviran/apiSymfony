<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/products' => [
            [['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::showAll'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'project_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/product/([^/]++)(?'
                    .'|(*:31)'
                    .'|(*:38)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:74)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'product_show', '_controller' => 'App\\Controller\\ProductController::show'], ['productId'], ['GET' => 0], null, false, true, null]],
        38 => [
            [['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        74 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
