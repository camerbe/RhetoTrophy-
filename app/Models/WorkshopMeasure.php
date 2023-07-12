<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopMeasure extends Model
{
    use HasFactory;

    protected $primaryKey = 'Oid';
    public $timestamps = false;

    public $incrementing = false;
    protected $table = 'WorkshopMeasures';
    protected $fillable = [
        'Oid',
        'Name',
        'ShortName',
        'OptimisticLockField',
   ];
   protected $casts = [
    'Oid'=> 'string'
    ];
}
