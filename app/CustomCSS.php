<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CustomCSS extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'customcss';
    
    protected $fillable = ['custom_css_code'];
    

    public static function boot()
    {
        parent::boot();

        CustomCSS::observe(new UserActionsObserver);
    }
    
    
    
    
}