<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CommonData extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'commondata';

    protected $fillable = [
          'common_logo',
          'common_email',
          'common_phone',
          'common_address',
          'common_linked_in',
          'common_twitter',
          'common_facebook',
          'common_instagram'
    ];


    public static function boot()
    {
        parent::boot();

        CommonData::observe(new UserActionsObserver);
    }




}
