<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class MainMenu extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'mainmenu';
    
    protected $fillable = [
          'main_menu_name',
          'main_menu_link',
          'main_menu_order'
    ];
    

    public static function boot()
    {
        parent::boot();

        MainMenu::observe(new UserActionsObserver);
    }
    
    
    
    
}