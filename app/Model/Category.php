<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany('App\Model\Article');
    }

    /**
     * [select categorys table id].
     *
     * @param [Builder] $query [categorys table Builder]
     * @param [string]  $name  [categorys table name]
     *
     * @return [array] [categorys table id]
     */
    public function scopeGetCategoryId($query, $name)
    {
        return $query->where('name', $name)->get()->mode('id');
    }
}
