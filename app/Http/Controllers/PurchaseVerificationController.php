<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PurchaseVerificationController extends Controller
{
    public function verifyPurchase(){
        return view('vendor.verify-purchase.index');
    }

    public function purchaseVerified(Request $request){
        $domain = $request->domain;
        $purchaseCode = $request->purchaseCode;

        File::put(storage_path().'/legal',$domain.'**'.$purchaseCode);
        return 'success';
    }
}
