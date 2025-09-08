@extends('layouts.app')

@section('content')
<div class="product-page">
    <h2 class="page-title">
        @if(request('search'))
        “{{ request('search') }}”の商品一覧
        @else
        商品一覧
        @endif
    </h2>

    <div class="product-layout">
        <aside class="sidebar">
            <form action="{{ route('products.search') }}" method="get">
                <div class="search-box">
                    <input type="text" name="search" placeholder="商品名で検索" value="{{ request('search') }}">
                    <button type="submit">検索</button>
                </div>
            </form>


            <form action="{{ route('products.index') }}" method="get">
                <div class="sort-box">
                    <label for="sort_price">価格順で表示</label>
                    <select name="sort_price" id="sort_price" onchange="this.form.submit()">
                        <option value="">選択してください</option>
                        <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>価格が高い順</option>
                        <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>価格が安い順</option>
                    </select>
                </div>
            </form>

            <div class="actions">
                <a href="{{ route('products.register') }}" class="button add-product">＋商品を追加</a>
            </div>
        </aside>


        <div class="product-list">
            @forelse ($products as $product)
            <div class="product-card">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>¥{{ number_format($product->price) }}</p>
            </div>
            @empty
            <p>商品が見つかりませんでした。</p>
            @endforelse
        </div>

        <div class="pagination">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection