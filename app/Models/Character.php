<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['name','photo'];

    /**
     * The set that belong to the character.
     */
    public function set()
    {
        return $this->hasOne(Set::class, 'id', 'set_id')
            ->with('artifactType')
            ->with('stat');
    }

    /**
     * The currentBuild that belong to the character.
     */
    public function currentBuild()
    {
        return $this->hasMany(CurrentBuild::class, 'character_id', 'id')
            ->with('set')
            ->with('flower')
            ->with('plume')
            ->with('sands')
            ->with('goblet')
            ->with('circlet');

    }
}
