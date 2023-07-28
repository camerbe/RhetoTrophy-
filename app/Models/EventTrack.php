<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class EventTrack extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    protected $table = 'EventTracks';
    public static $snakeAttributes = false;
    protected $fillable = [
        'Oid',
        'EventOid',
        'Code',
        'Seq',
        'Color',
        'Name',
        'MultiplyTimeFactor',
        'OptimisticLockField',

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
    public function eventrackworkshops()
    {
        return $this->hasMany(EventTrackWorkshop::class);
    }
    protected static function boot(){
        parent::boot();
        EventTrack::created(function($model){
            Cache::forget('eventtrack-list');
        });
        EventTrack::deleted(function($model){
            Cache::forget('eventtrack-list');
        });
        EventTrack::updated(function($model){
            Cache::forget('eventtrack-list');
        });
    }
}
