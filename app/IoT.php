<?php

namespace App;

class IoT extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'IoT';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->broad );
    }
}
