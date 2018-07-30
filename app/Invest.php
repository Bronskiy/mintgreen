<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Invest extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'invest';
    
    protected $fillable = [
          'invest_title',
          'invest_header_image',
          'invest_body'
    ];
    

    public static function boot()
    {
        parent::boot();

        Invest::observe(new UserActionsObserver);
    }
    
    
    
    
}