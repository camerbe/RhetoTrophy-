<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPenalties extends Model
{
    use HasFactory;

    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'EventPenalties';
    protected $fillable = [
        'Oid',
        'EventOid',
        'Name',
        'Scope',
        'Value',
        'OptimisticLockField',


   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function basepenalty()
    {
        return $this->hasMany(BasePenalty::class);
    }
}
