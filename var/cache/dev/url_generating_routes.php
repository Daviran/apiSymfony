<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_orders' => [[], ['_controller' => 'App\\Controller\\OrdersController::index'], [], [['text', '/orders']], [], [], []],
    'app_product' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'project_new' => [[], ['_controller' => 'App\\Controller\\ProductController::new'], [], [['text', '/product']], [], [], []],
    'product_show' => [['id'], ['_controller' => 'App\\Controller\\ProductController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'product_edit' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'product_delete' => [['id'], ['_controller' => 'App\\Controller\\ProductController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'register_user' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/api/register']], [], [], []],
    'user_show' => [[], ['_controller' => 'App\\Controller\\UserController::show'], [], [['text', '/api/user']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app_lucky_number' => [[], ['_controller' => 'App\\Controller\\LuckyController::number'], [], [['text', '/lucky/number']], [], [], []],
];
