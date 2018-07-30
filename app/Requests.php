<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Requests extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'requests';
    
    protected $fillable = [
          'requests_first_name',
          'requests_last_name',
          'requests_email',
          'requests_phone',
          'requests_country',
          'requests_address_line_1',
          'requests_address_line_2',
          'requests_city',
          'requests_province',
          'requests_postal',
          'product_id',
          'requests_comment'
    ];
    

    public static function boot()
    {
        parent::boot();

        Requests::observe(new UserActionsObserver);
    }
    
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }


    
    
    
}