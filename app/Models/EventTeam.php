<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;
    
    const EventOid = 'EventOid';

    protected $primaryKey = 'oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTeams';
    protected $fillable = [
        'oid',
        'eventoid',
        'Position',
        'teamnumber',
        'name',
        'zipcode',
        'city',
        'status',
        'notes',
        'nettime',
        'EndTime',
        'completedtracks',
        'totalpenalties',
   ];
   protected $casts = [
    'Oid'=> 'string',
    'oid'=> 'string',
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
