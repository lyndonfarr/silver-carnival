<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
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

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(PhoneNumber::class);
    }
}
