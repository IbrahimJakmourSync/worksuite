<?php
/**
 * Created by PhpStorm.
 * User: DEXTER
 * Date: 23/11/17
 * Time: 6:07 PM
 */

namespace App\Traits;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

trait AppBoot{


    public function isLegal(){
		return true;
    }

}