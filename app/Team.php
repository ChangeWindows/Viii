<?php

namespace App;

class Team extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'Team';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'team';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->broad );
    }
}
