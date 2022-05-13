<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Router;

use ContentioSdk\Router\BaseRouter;
use Strategio\Controller\ContentioController;
use Strategio\Controller\HomeController;
use Strategio\Controller\ArticleController;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class RouterFactory extends BaseRouter
{
    public function createRoutes(): UrlMatcher
    {
        $routes = parent::createRoutes();
        
        $this->add('home', '/', [HomeController::class, 'index']);
        $this->add('article_detail', '/article/{slug}', [ArticleController::class, 'index']);
        $this->add('contentio', '/contentio', [ContentioController::class, 'index']);
        
        return $routes;
    }
}