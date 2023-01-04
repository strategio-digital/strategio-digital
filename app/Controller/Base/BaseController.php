<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Controller\Base;

use ContentioSdk\Component\AssetLoader;
use ContentioSdk\Component\StdTemplate;
use ContentioSdk\Component\Thumbnail\ThumbGen;
use ContentioSdk\Debugger\ApiDebugger;
use Latte\Engine;
use Strategio\Model\ContactDataset;
use Strategio\Model\ContentioDataset;
use Strategio\Model\PricingDataset;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

abstract class BaseController extends \ContentioSdk\Controller\Base\BaseController
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
    )
    {
    }
    
    public function startup(): void
    {
        if ($this->request->getHost() === 'strategio.digital') {
            $this->response->headers->set('Location', 'https://strategio.dev' . $this->request->getPathInfo());
            $this->sendResponse();
        }
        
        parent::startup();
        
        $this->template->contacts = $this->contactDataset;
        $this->template->pricing = $this->pricingDataset;
        $this->template->contentio = $this->contentioDataset;
    }
}