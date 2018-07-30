<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'specialization';
    
    protected $fillable = [
          'specialization_icon',
          'specialization_title',
          'specialization_description',
          'specialization_order'
    ];
    

    public static function boot()
    {
        parent::boot();

        Specialization::observe(new UserActionsObserver);
    }
    
    
    
    
}