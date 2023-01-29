<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    /**
     * The artifactTypes that belong to the stat.
     */
    public function artifactTypes()
    {
        return $this->belongsToMany(ArtifactType::class)->withPivot('id')->withTimestamps();
    }
}
