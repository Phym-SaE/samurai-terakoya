<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;

class WebController extends Controller
{
    //
    public function index(Product $product)
    {
        // カテゴリーと親カテゴリーを取得してビューに渡す
        $categories = Category::all();

        $major_categories = MajorCategory::all();

        // 新商品：アップロード日が新しいものを新しい順に4つ表示
        $recently_products = Product::orderBy('created_at', 'desc')->take(4)->get();

        // おすすめ商品：おすすめONになっている商品を3つ表示
        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();

        $review_scores = Product::with('reviews')->get();

        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products', 'review_scores'));
    }
}
