<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'uuid'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    protected $casts = [''];


    /**
     * Get the products for a category.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }
}
