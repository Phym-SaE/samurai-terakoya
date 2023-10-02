@extends('layouts.app')

@section('content')
    <div class="row mx-0">
        <div class="col-2">
            @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
            @endcomponent
        </div>
        <div class="col-9">
            <div class="container">
                @if ($category !== null)
                    <a href="{{ route('products.index') }}">トップ</a> > <a href="#">{{ $major_category->name }}</a> >
                    {{ $category->name }}
                    <!-- 絞り込んだカテゴリー名と絞り込んだ商品の数を表示 -->
                    <h1>{{ $category->name }}の商品一覧{{ $total_count }}件</h1>
                @endif
            </div>
            <div>
                Sort By
                @sortablelink('id', 'ID')
                @sortablelink('price', 'Price')
                @sortablelink('average_score', 'Review')
            </div>
            <div class="container mt-4">
                <div class="row w-100">
                    @foreach ($products as $product)
                        <div class="col-3">
                            <a href="{{ route('products.show', $product) }}">
                                @if ($product->image !== '')
                                    <img src="{{ asset($product->image) }}" class="img-thumbnail" />
                                @else
                                    <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail" />
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-11">
                                    <p class="samuraimart-product-label mt-2">
                                        {{ $product->name }}<br>
                                        <label>￥{{ $product->price }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    @if ($product->reviews->count() > 0)
                                        @php
                                            $avg_score = $product->reviews->avg('score');
                                            $round_score = round($avg_score * 2) / 2;
                                        @endphp
                                        <div class="d-flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $avg_score)
                                                    <i class="fa-solid fa-star" style="color: #0fbe9f;"></i>
                                                @else
                                                    @if ($i - 0.5 <= $round_score)
                                                        <i class="fa-regular fa-star-half-stroke"
                                                            style="color: #0fbe9f;"></i>
                                                    @else
                                                        <i class="fa-regular fa-star" style="color: #0fbe9f;"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                            <p class="ms-2 small">{{ $product->reviews->count() }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- カテゴリーで絞り込んだ条件を保持してページングする -->
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
