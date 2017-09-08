<?php

namespace App;

class Mobile extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'Mobile';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->broad );
    }
}
