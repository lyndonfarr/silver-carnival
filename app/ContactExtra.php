<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactExtra extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'contact_id',
        'current',
        'type',
        'value',
    ];

    const TYPE_PHONE = 'phone';

    /**
     * a ContactExtra belongsTo a Contact
     * 
     * @return BelongsTo
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
