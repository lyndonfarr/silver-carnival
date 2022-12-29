<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
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
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'city',
        'country',
        'line_1',
        'line_2',
        'post_code',
        'state',
    ];

    /**
     * an Address BelongsToMany Contacts
     * 
     * @return BelongsToMany
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }

    //=======
    //<ACCESSORS>
    //=======
    /**
     * Concat line_1, line_2, city, state, post_code, and country column into one string
     * 
     * @return string
     */
    public function getFullStringAttribute(): string
    {
        return collect([$this->line_1, $this->line_2, $this->city, $this->state, $this->post_code, $this->country])
            ->filter()
            ->implode(', ');
    }
    //=======
    //</ACCESSORS>
    //=======
}
