<?php

namespace App;

use App\Observers\EstimateObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estimate extends Model
{
    use Notifiable;

    protected $dates = ['valid_till'];
    protected $appends = ['total_amount', 'valid_date'];

    protected static function boot()
    {
        parent::boot();

        static::observe(EstimateObserver::class);

        $company = company();

        static::addGlobalScope('company', function (Builder $builder) use($company) {
            if ($company) {
                $builder->where('estimates.company_id', '=', $company->id);
            }
        });
    }

    public function items() {
        return $this->hasMany(EstimateItem::class, 'estimate_id');
    }

    public function client(){
        return $this->belongsTo(User::class, 'client_id')->withoutGlobalScopes(['active']);
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getTotalAmountAttribute(){

        if(!is_null($this->total) && !is_null($this->currency_symbol)){
            return $this->currency_symbol . $this->total;
        }

        return "";
    }

    public function getValidDateAttribute(){
        if(!is_null($this->valid_till)){
            return Carbon::parse($this->valid_till)->format('d F, Y');
        }
        return "";
    }
}
