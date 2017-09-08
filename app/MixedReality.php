<?php

namespace App;

class MixedReality extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'Mixed Reality';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return (bool) !isset($this->lts);
    }
}
