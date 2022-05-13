<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use ContentioSdk\Attribute\Template;
use ContentioSdk\Component\AssetLoader;
use ContentioSdk\Component\StdTemplate;
use ContentioSdk\Component\Thumbnail\ThumbGen;
use ContentioSdk\Debugger\ApiDebugger;
use Latte\Engine;
use Strategio\Controller\Base\BaseController;
use Strategio\Model\ContactDataset;
use Strategio\Model\ContentioDataset;
use Strategio\Model\HomepageDataset;
use Strategio\Model\PricingDataset;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

class HomeController extends BaseController
{
    public function __construct(
        protected Engine           $latte,
        protected ApiDebugger      $apiDebugger,
        protected Response         $response,
        protected AssetLoader      $assetLoader,
        protected ThumbGen         $thumbGen,
        protected UrlGenerator     $urlGenerator,
        protected StdTemplate      $template,
        public Request             $request,
        
        protected ContactDataset   $contactDataset,
        protected PricingDataset   $pricingDataset,
        protected ContentioDataset $contentioDataset,
        protected HomepageDataset  $homepageDataset,
    )
    {
    }
    
    #[Template(path: __DIR__ . '/../../view/controller/home.latte')]
    public function index(): void
    {
        $this->template->homepage = $this->homepageDataset;
    }
}