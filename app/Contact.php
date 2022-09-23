<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    /** 
     * @var array
     */
    protected $fillable = [
        'description',
        'dob',
        'first_name',
        'last_name',
        'middle_names',
        'nationality',
        'nickname',
        'notes',
    ];

    /**
     * a Contact belongsToMany Addresses
     * 
     * @return BelongsToMany
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class);
    }

    /**
     * a Contact hasMany ContactExtras
     * 
     * @return HasMany
     */
    public function contactExtras(): HasMany
    {
        return $this->hasMany(ContactExtra::class);
    }

    /**
     * a Contact hasOne primaryPhoneNumber
     * 
     * @return HasOne
     */
    public function primaryPhoneNumber(): HasOne
    {
        return $this->hasOne(ContactExtra::class)->where([
            'current' => true,
            'type' => 'phone',
        ]);
    }
}
