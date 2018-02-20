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
    
    /**
     * @return void
     */
    public function promoteNow()
    {
        if ( ( bool ) !isset( $build->skip ) )
            $build->skip = Carbon::now();
        else if ( ( bool ) !isset( $build->fast ) )
            $build->fast = Carbon::now();
        else if ( ( bool ) !isset( $build->slow ) )
            $build->slow = Carbon::now();
        else if ( ( bool ) !isset( $build->preview ) )
            $build->preview = Carbon::now();
        else if ( ( bool ) !isset( $build->targeted ) )
            $build->targeted = Carbon::now();
        else if ( ( bool ) !isset( $build->broad ) )
            $build->broad = Carbon::now();
        else if ( ( bool ) !isset( $build->lts ) )
            $build->lts = Carbon::now();
    }
}
