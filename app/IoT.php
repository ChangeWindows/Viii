<?php

namespace App;

class IoT extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'IoT';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'iot';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->broad );
    }
}
