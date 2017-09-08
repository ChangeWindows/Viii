<?php

namespace App;

class Pc extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'PC';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->lts );
    }
}
