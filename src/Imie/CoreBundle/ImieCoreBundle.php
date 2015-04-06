<?php

namespace Imie\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImieCoreBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}
