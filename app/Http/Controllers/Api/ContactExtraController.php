<?php

namespace App\Http\Controllers\Api;

use App\ContactExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactExtraController extends Controller
{
    /**
     * @param Request $request the Request object
     * @param int $id the id of the ContactExtra to destroy
     * @return int
     */
    public function destroy(Request $request, int $id): int
    {
        return ContactExtra::destroy($id);
    }
}
