<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request , $locale)
    {
        $selectedLocale = $request->input('locale');

        App::setLocale($selectedLocale);
        Session::put('locale', $selectedLocale); // Check if the correct locale is set

        return redirect()->back();
    }

}

