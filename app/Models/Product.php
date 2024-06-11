<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'catalogue_id',
        'slug',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'user_manual',
        'views',
        'is_active',
        'is_hot_deal',
        'is_new',
        'is_good_deal',
        'is_show_home',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_hot_deal' => 'boolean',
        'is_new' => 'boolean',
        'is_good_deal' => 'boolean',
        'is_show_home' => 'boolean',
    ];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
