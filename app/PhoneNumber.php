<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneNumber extends Model
{
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
