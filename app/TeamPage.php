<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class TeamPage extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'teampage';

    protected $fillable = [
          'team_page_title',
          'team_page_header_image',
          'seo_title',
          'seo_keywords',
          'seo_description'
    ];


    public static function boot()
    {
        parent::boot();

        TeamPage::observe(new UserActionsObserver);
    }




}
