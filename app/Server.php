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
    
    /**
     * @return void
     */
    public function promoteNow()
    {
        if ( ( bool ) !isset( $build->slow ) )
            $build->slow = Carbon::now();
        else if ( ( bool ) !isset( $build->broad ) )
            $build->broad = Carbon::now();
        else if ( ( bool ) !isset( $build->lts ) )
            $build->lts = Carbon::now();
    }
}
