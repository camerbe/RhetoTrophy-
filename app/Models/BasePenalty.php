<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BasePenalty extends Model
{
    use HasFactory;

    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $table = 'BasePenalty';
    protected $fillable = [
        'Oid',
        'EventOid',
        'EventPenaltyOid',
        'Comment',
        'OptimisticLockField',


   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
    public function eventpenalties()
    {
        return $this->belongsTo(EventPenalties::class);
    }
    public function basepenalty()
    {
        return $this->belongsTo(BasePenalty::class);
    }
    protected static function boot(){
        parent::boot();
        Categorie::created(function($model){
            Cache::forget('basepenalty-list');
        });
        Categorie::deleted(function($model){
            Cache::forget('basepenalty-list');
        });
        Categorie::updated(function($model){
            Cache::forget('basepenalty-list');
        });
    }
}
