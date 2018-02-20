<?php

namespace App;

class MixedReality extends Build
{
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformName()
    {
        return 'Mixed Reality';
    }
    /**
     * @param string $notation
     * @return string
     */
    public function getPlatformClass()
    {
        return 'mixed';
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
        if ( ( bool ) !isset( $build->targeted ) )
            $build->targeted = Carbon::now();
        else if ( ( bool ) !isset( $build->broad ) )
            $build->broad = Carbon::now();
        else if ( ( bool ) !isset( $build->lts ) )
            $build->lts = Carbon::now();
    }
}
