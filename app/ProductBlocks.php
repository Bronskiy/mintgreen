<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBlocks extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'productblocks';

    protected $fillable = [
          'product_block_class',
          'product_block_title',
          'product_block_text',
          'product_block_image',
          'belongs_to_field_id'
    ];


    public static function boot()
    {
        parent::boot();

        ProductBlocks::observe(new UserActionsObserver);
    }


}
