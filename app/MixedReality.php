<?php

namespace App;

class MixedReality extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'Mixed Reality';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'mixed';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->lts );
    }
}
