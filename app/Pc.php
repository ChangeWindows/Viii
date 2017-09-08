<?php

namespace App;

class Pc extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'PC';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'pc';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->lts );
    }
}
