<?php

namespace App;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class Company extends Model
{
    protected $table = 'companies';
    protected $dates = ['trial_ends_at','licence_expire_on','created_at','updated_at'];
    use Notifiable, Billable;

    public static function boot() {

        static::observe(CompanyObserver::class);

        // Add global scope for active
        /*static::addGlobalScope(
            'active',
            function(Builder $builder) {
                $builder->where('status', '=', 'active');
            }
        );*/
    }

    public function currency () {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function package () {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function employees () {
        return $this->hasMany(User::class)
            ->join('employee_details','employee_details.user_id', 'users.id');
    }

    public function logo() {
        if($this->logo != null) {
            return asset('user-uploads/app-logo/'.$this->logo);
        }
        else {
            return 'https://placeholdit.imgix.net/~text?txtsize=25&txt=Upload your logo&w=200&h=150';
        }
    }

}
