<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeamTrackWorkshop extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTeamTrackWorkshops';
    protected $fillable = [
        'Oid',
        'TeamTrackOid',
        'EventTrackWorkshopOid',
        'Value',
        'Start',
        'Finish',
        'BonusMalus',
        'Comment',
        'TotalPenalties',

   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function eventteamtrack()
    {
        return $this->belongsTo(EventTeamTrack::class);

    }

}
