<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    /** 
     * The editable model attributes
     * 
     * @var array
     */
    protected $fillable = [
        'description',
        'dob',
        'first_name',
        'full_name',
        'last_name',
        'middle_names',
        'nationality',
        'nickname',
        'notes',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    //=======
    //<RELATIONSHIPS>
    //=======
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
     * a Contact hasOne currentPhoneNumber
     * 
     * @return HasOne
     */
    public function currentPhoneNumber(): HasOne
    {
        return $this->hasOne(ContactExtra::class)->where([
            'current' => true,
            'type' => 'phone',
        ]);
    }
    //=======
    //</RELATIONSHIPS>
    //=======

    //=======
    //<MUTATORS>
    //=======
    public function setFullNameAttribute($full_name): void
    {
        $full_name = trim($full_name);
        $full_name = explode(' ', $full_name);
        
        $this->attributes['first_name'] = array_shift($full_name);

        if (count($full_name)) {
            $this->attributes['last_name'] = array_pop($full_name);
        }

        if (count($full_name)) {
            $this->attributes['middle_names'] = join($full_name, ' ');
        }
    }
    //=======
    //</MUTATORS>
    //=======

    //=======
    //<ACCESSORS>
    //=======
    /**
     * Concat first_name, middle_names, and last_name column into one string
     * 
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return collect([$this->first_name, $this->middle_names, $this->last_name])
            ->filter()
            ->implode(' ');
    }
    //=======
    //</ACCESSORS>
    //=======
}
