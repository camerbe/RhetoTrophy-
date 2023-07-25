<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTrackWorkshop extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTrackWorkshops';
    protected $fillable = [
        'Oid',
        'EventTrackOid',
        'Seq',
        'Code',
        'Name',
        'MeasureOid',
        'TypeOid',
        'ScaleTypeOid',
        'IsDowntime',
        'IsRaceTime',
        'IgnoreZero',
        'IgnoreResult',
        'PrintOnReport',
        'ValueFromTime',
        'MinValue',
        'AvgValue',
        'MaxValue',
        'MinPenalty',
        'MaxPenalty',
        'OptimisticLockField',
        'BonusFromStats',
        'InitValue',

   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function eventteamtrackworkshops()
    {
        return $this->hasMany(EvenTeamTrackWorkshop::class);
    }
    public function eventtrackworkshopbonusmalus()
    {
        return $this->hasMany(EvenTrackWorkshopBonusMalus::class);
    }
    public function eventtrack()
    {
        return $this->belongsTo(EventTrack::class);

    }
    public function workshopmeasure()
    {
        return $this->belongsTo(WorkshopMeasure::class);

    }
}
