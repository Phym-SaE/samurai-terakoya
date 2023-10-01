<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\ProductRating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Product $product)
    {
        // カテゴリーの絞り込み
        // $requestで値を受け取る
        if ($request->category !== null) {
            // 値を受け取っている場合
            // 受け取った絞り込みたいカテゴリーIDを持つ商品データを取得（ページネーションにも対応）
            $products = Product::where('category_id', $request->category)->sortable()->paginate(15);
            // 当該カテゴリーの商品数を表示
            $total_count = Product::where('category_id', $request->category)->count();
            // カテゴリー名を取得
            $category = Category::find($request->category);
            $major_category = MajorCategory::find($category->major_category_id);
        } else {
            // 値を受け取っていない場合
            // 商品を表示（15件ずつページネーション）
            $products = Product::sortable()->paginate(15);
            $total_count = "";
            $category = null;
            $major_category = null;
        }
        // 全てのカテゴリーを取得
        $categories = Category::all();
        // 全カテゴリーのデータから「major_category_name」のカラムのみを取得（unique()：重複部分を削除）
        $major_categories = MajorCategory::all();

        // 商品の星評価を取得
        $review_scores = Product::with('reviews')->get();

        return view('products.index', compact('products', 'category', 'major_category', 'categories', 'major_categories', 'total_count', 'review_scores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 商品登録時にカテゴリのデータを表示
        $categories = Category::all();
        // 新しく作成する商品データを入力する入力フォームを表示
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // データを受け取り、新しいデータを保存する
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        // データを保存された後、リダイレクト
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // 商品についての全てのレビューを取得して$reviewsに保存
        $reviews = $product->reviews()->get();

        return view('products.show', compact('product', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // 編集する商品のデータをビューへ渡す
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 変更のデータを受け取る
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->update();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // リクエストを受け付けてデータを削除する
        $product->delete();

        return to_route('products.index');
    }

    // favoriteアクション
    public function favorite(Product $product)
    {
        Auth::user()->togglefavorite($product);

        return back();
    }
}
