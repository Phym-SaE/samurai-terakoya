<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Productと紐付けする
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // userと紐付けする
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($review) {
            $product = $review->product;
            $average_score = $product->reviews()->avg('score');
            $product->average_score = round($average_score, 2);
            $product->save();
        });
    }
}
