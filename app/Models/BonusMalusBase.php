<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusMalusBase extends Model
{
    use HasFactory;

    protected $primaryKey = 'Oid';
    public $timestamps = false;
    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'BonusMalusBase';
    protected $fillable = [
        'Oid',
        'OptimisticLockField',
        'ObjectType',

    ];
    protected $casts = [
        'Oid'=> 'string'
    ];
    public function eventteam()
    {
        return $this->belongsTo(EventTeam::class);
    }
    public function eventteamtrack()
    {
        return $this->belongsTo(EventTeamTrack::class);
    }
    public function eventteamtrackworkshop()
    {
        return $this->belongsTo(EventTeamTrackWorkshop::class);
    }
    public function basepenalty()
    {
        return $this->hasMany(BasePenalty::class);
    }
}
