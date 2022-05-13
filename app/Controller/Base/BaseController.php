<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Controller\Base;

abstract class BaseController extends \ContentioSdk\Controller\Base\BaseController
{
    public function startup(): void
    {
        parent::startup();
        
        $this->template->contacts = $this->getContacts();
        $this->template->pricing = $this->getPricing();
    }
    
    protected function getContacts(): array
    {
        return [
            [
                'email' => 'get@strategio.digital',
                'phone' => '+420 606 091 125'
            ]
        ];
    }
    
    protected function getPricing(): array
    {
        return [
            'currency' => 'CZK',
            'value' => 1200,
            'discountValue' => 900,
            'discountPercentage' => 25,
        ];
    }
}