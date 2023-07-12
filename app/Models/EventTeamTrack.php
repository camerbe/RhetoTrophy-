<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeamTrack extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTeamTracks';
    protected $fillable = [
        'Oid',
        'TeamOid',
        'TrackOid',
        'Start',
        'Finish',
        'Completed',
        'RawTime',
        'DwnTime',
        'NetTime',
        'EndTime',
        'TotBonus',
        'TotMalus',
        'DeltaBonusMalus',
        'TotalPenalties',

   ];
   protected $casts = [
    'Oid'=> 'string'
    ];

    public function eventteam()
    {
        return $this->belongsTo(EventTeam::class);
    }
    public function eventtrack()
    {
        return $this->belongsTo(EventTrack::class);
    }
    public function eventteamtrackworkshops()
    {
        return $this->hasMany(EventTeamTrackWorkshop::class);
    }
    public function bonusmalusbase()
    {
        return $this->belongsTo(BonusMalusBase::class);
    }
}
