<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/carts/validate' => [[['_route' => 'app_product_validate', '_controller' => 'App\\Controller\\CartController::validate'], null, ['PUT' => 0], null, false, false, null]],
        '/api/carts' => [[['_route' => 'app_product_show', '_controller' => 'App\\Controller\\CartController::showCart'], null, ['GET' => 0], null, false, false, null]],
        '/api/products' => [
            [['_route' => 'app_product_all', '_controller' => 'App\\Controller\\ProductController::showAll'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_product_create', '_controller' => 'App\\Controller\\ProductController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\UserController::register'], null, ['POST' => 0], null, false, false, null]],
        '/api/users' => [
            [['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_user_update', '_controller' => 'App\\Controller\\UserController::update'], null, ['PUT' => 0], null, false, false, null],
        ],
        '/api/login' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|carts/([^/]++)(?'
                        .'|(*:32)'
                    .')'
                    .'|products/([^/]++)(?'
                        .'|(*:60)'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:97)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        32 => [
            [['_route' => 'app_product_add', '_controller' => 'App\\Controller\\CartController::AddOrDeleteToCart'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_product_del', '_controller' => 'App\\Controller\\CartController::deleteFromCart'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        60 => [
            [['_route' => 'app_product_one', '_controller' => 'App\\Controller\\ProductController::showOne'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_product_update', '_controller' => 'App\\Controller\\ProductController::update'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        97 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
