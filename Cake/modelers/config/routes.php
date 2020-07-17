<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    $builder->applyMiddleware('csrf');
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $builder->connect('/pages/contact', ['controller' => 'Pages', 'action' => 'display', 'contact']);
    $builder->connect('/pages/feature', ['controller' => "Pages", 'action' => 'display', 'feature']);
    $builder->connect('/pages/review', ['controller' => 'Pages', 'action' => 'display', 'review']);
    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $builder->connect('/submissions', ['controller' => 'Submissions', 'action' => 'index']);
    $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);
    $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
