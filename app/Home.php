<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'home';
    
    protected $fillable = [
          'home_header_image',
          'home_image_block_1',
          'home_text_block_1',
          'home_image_block_2',
          'home_text_block_2',
          'home_image_block_3',
          'home_text_block_3',
          'home_image_block_4',
          'home_text_block_4',
          'home_image_block_5',
          'home_text_block_5'
    ];
    

    public static function boot()
    {
        parent::boot();

        Home::observe(new UserActionsObserver);
    }
    
    
    
    
}