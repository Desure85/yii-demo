<?php
namespace Yiisoft\Yii\Demo\Factory;

use Psr\Container\ContainerInterface;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Web\MiddlewareDispatcher;

class MiddlewareDispatcherFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(UrlMatcherInterface::class);

        return new MiddlewareDispatcher([
            new Router($router),
        ], $container);
    }

    public static function __set_state(array $state): self
    {
        return new self();
    }
}
