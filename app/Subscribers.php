<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribers extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'subscribers';
    
    protected $fillable = ['subscriber_email'];
    

    public static function boot()
    {
        parent::boot();

        Subscribers::observe(new UserActionsObserver);
    }
    
    
    
    
}