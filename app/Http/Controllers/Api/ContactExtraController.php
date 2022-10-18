<?php

namespace App\Http\Controllers\Api;

use App\ContactExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactExtraController extends Controller
{
    /**
     * 
     */
    public function destroy(Request $request, int $id)
    {
        return ContactExtra::destroy($id);
    }
}
