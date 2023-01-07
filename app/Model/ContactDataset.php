<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Model;

class ContactDataset
{
    /**
     * @param string $key
     * @return string
     */
    public function get(string $key): string
    {
        $data = [
            'email' => 'get@strategio.dev',
            'phone' => '+420 606 091 125'
        ];
        
        return $data[$key];
    }
}