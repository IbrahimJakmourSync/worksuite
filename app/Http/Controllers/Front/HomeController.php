<?php

namespace App\Http\Controllers\Front;

use App\Feature;
use App\Helper\Reply;
use App\Http\Requests\Front\ContactUs\ContactUsRequest;
use App\Notifications\ContactUsMail;
use App\Package;
use App\User;
use Illuminate\Support\Facades\Notification;

class HomeController extends FrontBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->pageTitle = 'Home';
        $this->packages = Package::where('default', 'no')->get();

        $features = Feature::all();
        $this->featureWithImages = $features->filter(function ($value, $key) {
            return $value->type == 'image';
        });

        $this->featureWithIcons = $features->filter(function ($value, $key) {
            return $value->type == 'icon';
        });

        return view('front.home', $this->data);
    }

    public function contactUs(ContactUsRequest $request) {

        $this->pageTitle = 'Contact Us';
        $superAdmins = User::where('super_admin', '1')->get();

        $this->table = '<table><tbody style="color:#0000009c;">
        <tr>
            <td><p>Name : </p></td>
            <td><p>'.ucwords($request->name).'</p></td>
        </tr>
        <tr>
            <td style="font-family: Avenir, Helvetica, sans-serif;box-sizing: border-box;min-width: 98px;vertical-align: super;"><p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Message : </p></td>
            <td><p>'.$request->message.'</p></td>
        </tr>
</tbody>
        
</table><br>';

        Notification::route('mail', $this->detail->email)
            ->notify(new ContactUsMail($this->data, $request->email));


        return Reply::success('Thanks for contacting us. We will catch you soon.');
    }
}

