<?php

namespace Inz\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class InzUserBundle extends Bundle
{
    public function getParent() 
    {
        return 'FOSUserBundle';
    }
}
