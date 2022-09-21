<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactExtra extends Model
{
    protected $fillable = [
        'contact_id',
        'current',
        'type',
        'value',
    ];

    const TYPE_PHONE = 'phone';

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
