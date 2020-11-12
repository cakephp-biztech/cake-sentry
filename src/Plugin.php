<?php

namespace Biztech\CakeSentry;

use Biztech\CakeSentry\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Core\BasePlugin;
use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;

class Plugin extends BasePlugin
{
    /**
     * {@inheritDoc}
     */
    public function middleware($middleware)
    {
        $middleware = parent::middleware($middleware);
        $middleware->insertAfter(
            CakeErrorHandlerMiddleware::class,
            new ErrorHandlerMiddleware()
        );

        return $middleware;
    }
}
