<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
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
}
