<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactExtra extends Model
{
    const TYPE_INSTAGRAM = 'instagram';
    const TYPE_PHONE = 'phone';

    /**
     * @var array
     */
    protected $fillable = [
        'contact_id',
        'current',
        'type',
        'value',
    ];

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
