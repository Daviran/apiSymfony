<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/orders' => [[['_route' => 'app_orders', '_controller' => 'App\\Controller\\OrdersController::index'], null, null, null, false, false, null]],
        '/api/products' => [[['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/api/product' => [[['_route' => 'project_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['POST' => 0], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/api/register' => [[['_route' => 'register_user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/api/user' => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], null, null, null, false, false, null]],
        '/lucky/number' => [[['_route' => 'app_lucky_number', '_controller' => 'App\\Controller\\LuckyController::number'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/products/([^/]++)(*:29)'
                .'|/product/([^/]++)(?'
                    .'|(*:56)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:92)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        29 => [[['_route' => 'product_show', '_controller' => 'App\\Controller\\ProductController::show'], ['productId'], ['GET' => 0], null, false, true, null]],
        56 => [
            [['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        92 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
