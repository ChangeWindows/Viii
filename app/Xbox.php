<?php

namespace App;

class Xbox extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'Xbox';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return (bool) !isset($this->pilot);
    }
}
