<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class TeamCategory extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'teamcategory';
    
    protected $fillable = [
          'team_category_title',
          'team_category_url',
          'team_category_description'
    ];
    

    public static function boot()
    {
        parent::boot();

        TeamCategory::observe(new UserActionsObserver);
    }
    
    
    
    
}