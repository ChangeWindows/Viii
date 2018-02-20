<?php

namespace App;

class Xbox extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'Xbox';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'xbox';
    }

    /**
     * @return bool
     */
    public function canPromote()
    {
        return ( bool ) !isset( $this->targeted );
    }
    
    /**
     * @return void
     */
    public function promoteNow()
    {
        if ( ( bool ) !isset( $build->fast ) )
            $build->fast = Carbon::now();
        else if ( ( bool ) !isset( $build->slow ) )
            $build->slow = Carbon::now();
        else if ( ( bool ) !isset( $build->preview ) )
            $build->preview = Carbon::now();
        else if ( ( bool ) !isset( $build->release ) )
            $build->release = Carbon::now();
        else if ( ( bool ) !isset( $build->targeted ) )
            $build->targeted = Carbon::now();
    }
}
