<?php
/**
 * Created by PhpStorm.
 * User: Monika
 * Date: 6/7/2017
 * Time: 10:57 AM
 */

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

trait UuidTrait
{

    /**
     * Automatically generates and adds UUID to model
     */
    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }
}
