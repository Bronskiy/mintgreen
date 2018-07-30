<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMembers extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'teammembers';
    
    protected $fillable = [
          'team_member_name',
          'team_member_position',
          'team_member_linkedin',
          'team_member_photo',
          'teamcategory_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        TeamMembers::observe(new UserActionsObserver);
    }
    
    public function teamcategory()
    {
        return $this->hasOne('App\TeamCategory', 'id', 'teamcategory_id');
    }


    
    
    
}