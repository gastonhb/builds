<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentBuild extends Model
{
    use HasFactory;

    /**
     * The character that belong to the current build.
     */
    public function character()
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }

    /**
     * The set that belong to the current build.
     */
    public function set()
    {
        return $this->hasOne(Set::class, 'id', 'set_id');
    }

    /**
     * The flower that belong to the current build.
     */
    public function flower()
    {
        return $this->hasOne(ArtifactTypeStat::class, 'id', 'flower_id')
            ->with('artifactType')
            ->with('stat');
    }

    /**
     * The plume that belong to the current build.
     */
    public function plume()
    {
        return $this->hasOne(ArtifactTypeStat::class, 'id', 'plume_id')
            ->with('artifactType')
            ->with('stat');
    }

    /**
     * The sands that belong to the current build.
     */
    public function sands()
    {
        return $this->hasOne(ArtifactTypeStat::class, 'id', 'sands_id')
            ->with('artifactType')
            ->with('stat');
    }

    /**
     * The goblet that belong to the current build.
     */
    public function goblet()
    {
        return $this->hasOne(ArtifactTypeStat::class, 'id', 'goblet_id')
            ->with('artifactType')
            ->with('stat');
    }

    /**
     * The circlet that belong to the current build.
     */
    public function circlet()
    {
        return $this->hasOne(ArtifactTypeStat::class, 'id', 'circlet_id')
            ->with('artifactType')
            ->with('stat');
    }
}
