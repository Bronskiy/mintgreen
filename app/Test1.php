<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Test1 extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'test1';
    
    protected $fillable = ['test1'];
    

    public static function boot()
    {
        parent::boot();

        Test1::observe(new UserActionsObserver);
    }
    
    
    
    
}