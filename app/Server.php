<?php

namespace App;

class Server extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'Server';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'server';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->lts );
    }
}
