<?php

namespace App\Http\Controllers;

use App\Setting;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->global = Setting::first();
        App::setLocale('en');
        Carbon::setLocale('en');
        setlocale(LC_TIME,'en'.'_'.strtoupper('en'));

    }
}
