<?php

namespace Guard\Common\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuardCommonUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
