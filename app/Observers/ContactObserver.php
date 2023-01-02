<?php

namespace App\Observers;

use App\Event;
use App\Contact;
use Carbon\Carbon;

class ContactObserver
{
    /**
     * Handle the Contact 'saved' event
     * 
     * @param Contact $contact The Contact that has been saved.
     * @return void
     */
    public function saved(Contact $contact): void
    {
        if ($contact->getOriginal('dob') !== null && $contact->getOriginal('dob') !== $contact->dob) {
            $birthdayEventIdsForContact = Event::query()
                ->where('birthday_contact_id', $contact->id)
                ->pluck('id');

            Event::destroy($birthdayEventIdsForContact);
        }

        if (isset($contact->dob)) {
            $startOfToday = Carbon::now()->set(['hour' => 0, 'minute' => 0, 'second' => 0]);

            $currentYear = $startOfToday->year;
            $year = $contact->dob->addYears($contact->age) > $startOfToday
                ? $currentYear + 1
                : $currentYear;

            $birthdays = [];

            while ($year <= Event::FINAL_YEAR_FOR_BIRTHDAYS) {
                $age = $year - $contact->dob->year;
                $birthdays[] = [
                    'birthday_contact_id' => $contact->id,
                    'date' => Carbon::create($year, $contact->dob->month, $contact->dob->day),
                    'name' => "Birthday! {$contact->full_name} turns {$age} today.",
                ];

                $year ++;
            }

            $contact->birthdays()->insert($birthdays);
        }

        if ($contact->getOriginal('dod') !== null && $contact->getOriginal('dod') !== $contact->dod) {
            $rememberanceEventIdsForContact = Event::query()
                ->where('remembered_contact_id', $contact->id)
                ->pluck('id');

            Event::destroy($rememberanceEventIdsForContact);
        }

        if (isset($contact->dod)) {
            $startOfToday = Carbon::now()->set(['hour' => 0, 'minute' => 0, 'second' => 0]);

            $currentYear = $startOfToday->year;
            $year = $contact->dod->addYears($contact->age) > $startOfToday
                ? $currentYear + 1
                : $currentYear;

            $rememberanceDays = [];

            while ($year <= Event::FINAL_YEAR_FOR_BIRTHDAYS) {
                $age = $year - $contact->dod->year;
                $rememberanceDays[] = [
                    'remembered_contact_id' => $contact->id,
                    'date' => Carbon::create($year, $contact->dod->month, $contact->dod->day),
                    'name' => "Remember {$contact->full_name} today.",
                ];

                $year ++;
            }

            $contact->rememberanceDays()->insert($rememberanceDays);
        }
    }
}