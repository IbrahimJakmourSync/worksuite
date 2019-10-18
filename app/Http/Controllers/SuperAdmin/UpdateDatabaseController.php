<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helper\Reply;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class UpdateDatabaseController extends SuperAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'app.menu.updates';
        $this->pageIcon = 'ti-reload';
    }

    public function index(){
        // show new update notice
//        $lastVersion = file_get_contents(config('laraupdater.update_baseurl').'/laraupdater.json');
        $client = new Client();
        $res = $client->request('GET', config('laraupdater.update_baseurl').'/laraupdater.json', ['verify' => false]);
        $lastVersion = $res->getBody();
        $lastVersion = json_decode($lastVersion, true);

        if ( $lastVersion['version'] > File::get(public_path().'/version.txt') ){
            $this->lastVersion = $lastVersion['version'];
            $this->updateInfo = $lastVersion['description'];
        }
        $this->updateInfo = $lastVersion['description'];

        $this->worksuiteVersion = File::get(public_path().'/version.txt');
        $laravel = app();
        $this->laravelVersion = $laravel::VERSION;
        return view('super-admin.update-database.index', $this->data);
    }

    public function store(){
//        Artisan::call('migrate', array('--force' => true));

//        return Reply::success(__('messages.databaseUpdated'));
    }
}
