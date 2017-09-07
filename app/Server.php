<?php

namespace App;

class Server extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'Server';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return (bool) !isset($this->lts);
    }
}
