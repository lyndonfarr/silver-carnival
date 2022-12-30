<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Find Events using a generic 'Search'.
     * Finds based on name, and description.
     * 
     * @param Builder $query The query passed in to perform the find on
     * @return Builder
     */
    public function scopeFindSearch(Builder $query): Builder
    {
        return $query->when(request('search'), function (Builder $query) {
            $search = str_replace(' ', '%', request('search'));

            return $query
                ->where('name', 'like', $search)
                ->orWhereRaw("REPLACE(description, ' ', '') LIKE '%" . $search . "%' ");
        });
    }
}
