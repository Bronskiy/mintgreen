<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ThankYou extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'thankyou';
    
    protected $fillable = [
          'thank_you_title',
          'thank_you_header_image',
          'thank_you_body'
    ];
    

    public static function boot()
    {
        parent::boot();

        ThankYou::observe(new UserActionsObserver);
    }
    
    
    
    
}