<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressContactController extends Controller
{
    /**
     * @param Request $request the Request object
     * @param int $addressId the id of the Address to destroy
     * @param int $contactId the id of the Contact
     * @return int
     */
    public function destroy(Request $request, int $addressId, int $contactId): int
    {
        return Contact::findOrFail($contactId)->addresses()->detach($addressId);
    }
}
