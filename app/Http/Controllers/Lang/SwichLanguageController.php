<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SwichLanguageController extends Controller
{
    public function switchLang(Request $request)
    {
        $request->validate([
            'lang' => 'required|in:en,km',
        ]);
        if(count($request->all()) > 2){
            return redirect()->back()->withErrors("Not Allow");
        }
        $lang = $request->input('lang');     
        if (in_array($lang, ['en', 'km'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
}
