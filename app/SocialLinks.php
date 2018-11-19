<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLinks extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'sociallinks';
    
    protected $fillable = [
          'social_links_title',
          'social_links_icon',
          'social_links_link',
          'social_links_order'
    ];
    

    public static function boot()
    {
        parent::boot();

        SocialLinks::observe(new UserActionsObserver);
    }
    
    
    
    
}