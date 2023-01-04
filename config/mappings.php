<?php

use App\Event;

return [
    'recurrence_period_to_carbon' => [
        Event::RECURRENCE_TYPE_DAILY => 'day',
        Event::RECURRENCE_TYPE_MONTHLY => 'month',
        Event::RECURRENCE_TYPE_WEEKLY => 'week',
        Event::RECURRENCE_TYPE_YEARLY => 'year',
    ],
];