<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia{

    use SoftDeletes, HasMediaTrait;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'product';

    protected $fillable = [
          'product_title',
          'product_url',
          'product_specs'
    ];


    public static function boot()
    {
        parent::boot();

        Product::observe(new UserActionsObserver);
    }


    public function productblocks() {
        return $this->hasMany(ProductBlocks::class, 'belongs_to_field_id');
    }

}
