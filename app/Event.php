<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'deleted_at',
        'date',
        'updated_at',
    ];
    
    /** 
     * The editable model attributes
     * 
     * @var array
     */
    protected $fillable = [
        'date',
        'description',
        'name',
    ];
}
