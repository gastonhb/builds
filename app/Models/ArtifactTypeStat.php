<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Relations\Pivot;
 
class ArtifactTypeStat extends Pivot
{
    /**
     * The artifact type that belong to the artifact type stat.
     */
    public function artifactType()
    {
        return $this->hasOne(ArtifactType::class, 'id', 'artifact_type_id');
    }

    /**
     * The stat type that belong to the artifact type stat.
     */
    public function stat()
    {
        return $this->hasOne(Stat::class, 'id', 'stat_id');
    }
}