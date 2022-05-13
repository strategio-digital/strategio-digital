<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Model;

class PricingDataset
{
    /**
     * @param string $key
     * @return string|int
     */
    public function get(string $key): string|int
    {
        $data = [
            'currency' => 'CZK',
            'value' => 1200,
            'discountValue' => 900,
            'discountPercentage' => 25,
        ];
        
        return $data[$key];
    }
}