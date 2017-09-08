<?php

namespace App;

class Team extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatform( $notation = 'default' )
    {
        return 'Team';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->broad );
    }
}
