<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
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
        'dob',
        'updated_at',
    ];
    
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
    protected $appends = [
        'age',
        'full_name',
    ];

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
    public function primaryPhoneNumber(): HasOne
    {
        return $this->hasOne(ContactExtra::class)->where([
            'primary' => true,
            'type' => ContactExtra::TYPE_PHONE,
        ]);
    }

    /**
     * a Contact hasOne primaryInstagram
     * 
     * @return HasOne
     */
    public function primaryInstagram(): HasOne
    {
        return $this->hasOne(ContactExtra::class)->where([
            'primary' => true,
            'type' => ContactExtra::TYPE_INSTAGRAM,
        ]);
    }
    //=======
    //</RELATIONSHIPS>
    //=======

    //=======
    //<MUTATORS>
    //=======
    // public function setFullNameAttribute($full_name): void
    // {
    //     $full_name = trim($full_name);
    //     $full_name = explode(' ', $full_name);
        
    //     $this->attributes['first_name'] = array_shift($full_name);

    //     if (count($full_name)) {
    //         $this->attributes['last_name'] = array_pop($full_name);
    //     }

    //     if (count($full_name)) {
    //         $this->attributes['middle_names'] = join($full_name, ' ');
    //     }
    // }
    //=======
    //</MUTATORS>
    //=======

    //=======
    //<ACCESSORS>
    //=======
    /**
     * Derive a Contacts age from their dob
     * 
     * @return null|int
     */
    public function getAgeAttribute(): ?int
    {
        return isset($this->dob)
            ? Carbon::parse($this->dob)->diffInYears()
            : null;
    }
    
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
