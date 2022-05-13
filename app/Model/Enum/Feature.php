<?php
/**
 * Copyright (c) 2021 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Model\Enum;

enum Feature
{
    case TODO;
    case IN_PROGRESS;
    case DONE;
}