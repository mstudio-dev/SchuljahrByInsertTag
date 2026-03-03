<?php

declare(strict_types=1);

namespace MstudioDev\SchuljahrByInsertTag;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SchuljahrByInsertTagBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
