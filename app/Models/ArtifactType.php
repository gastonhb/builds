<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtifactType extends Model
{
    use HasFactory;

    /**
     * The stats that belong to the artifactType.
     */
    public function stats()
    {
        return $this->belongsToMany(Stat::class)->withPivot('id')->withTimestamps();
    }
}
