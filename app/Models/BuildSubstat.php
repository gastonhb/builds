<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Relations\Pivot;

class BuildSubstat extends Pivot
{
    /**
     * The build that belong to the build substat.
     */
    public function build()
    {
        return $this->hasOne(Build::class, 'id', 'build_id');
    }

    /**
     * The substat that belong to the build substat.
     */
    public function substat()
    {
        return $this->hasOne(Substat::class, 'id', 'substat_id');
    }
}
