<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTeams';
    protected $fillable = [
        'Oid',
        'EventOid',
        'Position',
        'TeamNumber',
        'Name',
        'ZipCode',
        'City',
        'Status',
        'Notes',
        'NetTime',
        'EndTime',
        'CompletedTracks',
        'TotalPenalties',
   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function eventteamtracks()
    {
        return $this->hasMany(EventTeamTrack::class);
    }
    public function bonusmalusbase()
    {
        return $this->belongsTo(BonusMalusBase::class);
    }
}
