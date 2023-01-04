<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use SoftDeletes;

    const FINAL_YEAR_FOR_BIRTHDAYS = 2146;

    const RECURRENCE_TYPE_DAILY = 'daily';
    const RECURRENCE_TYPE_MONTHLY = 'monthly';
    const RECURRENCE_TYPE_WEEKLY = 'weekly';
    const RECURRENCE_TYPE_YEARLY = 'yearly';
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'deleted_at',
        'date',
        'updated_at',
    ];
    
    /** 
     * The editable model attributes
     * 
     * @var array
     */
    protected $fillable = [
        'date',
        'description',
        'name',
    ];
    
    //=======
    //<RELATIONSHIPS>
    //=======
    /**
     * An Event BelongsTo a BirthdayContact
     * 
     * @return BelongsTo
     */
    public function birthdayContact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * An Event BelongsTo an InitialEvent
     * 
     * @return BelongsTo
     */
    public function initialEvent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    /**
     * An Event HasMany RecurredEvents
     * 
     * @return HasMany
     */
    public function recurredEvents(): HasMany
    {
        return $this->HasMany(self::class, 'recurred_event_id');
    }
    
    /**
     * An Event BelongsTo a RememberedContact
     * 
     * @return BelongsTo
     */
    public function rememberedContact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
    //=======
    //</RELATIONSHIPS>
    //=======

    /**
     * Find Events using a generic 'Search'.
     * Finds based on name, and description.
     * 
     * @param Builder $query The query passed in to perform the find on
     * @return Builder
     */
    public function scopeFindSearch(Builder $query): Builder
    {
        return $query->when(request('search'), function (Builder $query) {
            $search = str_replace(' ', '%', request('search'));

            return $query
                ->where('name', 'like', $search)
                ->orWhereRaw("REPLACE(description, ' ', '') LIKE '%" . $search . "%' ");
        });
    }

    /**
     * Get the next date for a recurring event, which the date provided may be in the past i.e. DoB for a Contact
     * 
     * @todo where to move this method to. Does not belong in Event model as it has nothing to do with Events.
     * 
     * @param Carbon $date The date Event first took place.
     * @param string $recurrence The period to recur the Event at.
     * @return Carbon
     */
    public static function getNextDateForRecurrence(Carbon $date, string $recurrence): Carbon
    {
        if (!$date->isPast()) {
            return $date;
        }

        $now = Carbon::now();
        $secondsSinceMidnight = $now->secondsSinceMidnight();
        $startOfToday = $now->subSeconds($secondsSinceMidnight);//If the first Event is today, even if it was earlier in the day, store it in DB.

        if ($recurrence === self::RECURRENCE_TYPE_YEARLY) {
            $diffYears = $date->diffInYears($startOfToday);
            return $date->addYears($diffYears + 1);
        }

        if ($recurrence === self::RECURRENCE_TYPE_MONTHLY) {
            $diffMonths = $date->diffInMonths($startOfToday);
            return $date->addMonths($diffMonths + 1);
        }

        if ($recurrence === self::RECURRENCE_TYPE_WEEKLY) {
            $diffWeeks = $date->diffInWeeks($startOfToday);
            return $date->addWeeks($diffWeeks + 1);
        }

        if ($recurrence === self::RECURRENCE_TYPE_DAILY) {
            $diffDays = $date->diffInDays($startOfToday);
            return $date->addDays($diffDays + 1);
        }

        /**
         * @todo throw an exception, log an error.
         */
        return $date;
    }

    /**
     * Create a recurring Event
     * 
     * @param array $eventData The initial Event data.
     * @param string $recurrence How regularly the Event will recur.
     * @param Carbon $untilDate When to stop recurring the Event.
     * @return bool
     */
    public static function createRecurring(array $eventData, string $recurrence, Carbon $untilDate): bool
    {
        $initialEvent = self::create($eventData);
        $eventData['recurred_event_id'] = $initialEvent->id;

        $events = [];
        $date = $initialEvent->date->copy();
        
        while ($date <= $untilDate) {
            $date->add(1 . ' ' . config("mappings.recurrence_period_to_carbon.{$recurrence}"));
            $eventData['date'] = $date;
            $events[] = $eventData;
            $date = $date->copy();
        }

        return self::insert($events);
    }
}
