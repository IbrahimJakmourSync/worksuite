<?php

if (!function_exists('superAdmin')) {
    function superAdmin()
    {
        return auth()->user();
    }
}
if (!function_exists('company')) {
    function company()
    {
        if(auth()->user()) {
            $company = \App\Company::find(auth()->user()->company_id);
            return $company;
        }

        return false;
    }
}