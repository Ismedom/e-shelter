<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_type',
        'title',
        'content_data',
        'slug',
        'meta_title',
        'meta_description',
        'is_active',
        'order'
    ];

    protected $casts = [
        'content_data' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    const TYPE_BENEFITS = 'benefits';
    const TYPE_FAQ = 'faq';
    const TYPE_FEATURES = 'features';
    const TYPE_HERO = 'hero';
    const TYPE_HOST = 'host';
    const TYPE_PROVINCE = 'province';
    const TYPE_TABS = 'tabs';

    public static function getContentTypes()
    {
        return [
            self::TYPE_BENEFITS,
            self::TYPE_FAQ,
            self::TYPE_FEATURES,
            self::TYPE_HERO,
            self::TYPE_HOST,
            self::TYPE_PROVINCE,
            self::TYPE_TABS
        ];
    }
}