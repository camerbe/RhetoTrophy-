<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTrackWorkshopBonusMalus extends Model
{
    
    use HasFactory;
    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventTrackWorkshopBonusMalus';
    protected $fillable = [
        'Oid',
        'EventTrackWorkshopOid',
        'RangeLower',
        'RangeUpper',
        'Value',
        'OptimisticLockField',
        

   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function eventrackworkshop()
    {
        return $this->belongsTo(EventTrackWorkshop::class);
    }
}
