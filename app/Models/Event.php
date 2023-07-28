<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;
    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'Events';
    protected $fillable = [
        'Oid',
        'Code',
        'Name',
        'Date',
        'MaxNetTime',
        'OptimisticLockField',
    ];
    protected $casts = [
        'Oid'=> 'string'
    ];
    public function eventteams()
    {
        return $this->hasMany(EventTeam::class);
    }
    public function eventpenalties()
    {
        return $this->hasMany(EventPenalties::class);
    }
    public function eventtracks()
    {
        return $this->hasMany(EventTrack::class);
    }
}
