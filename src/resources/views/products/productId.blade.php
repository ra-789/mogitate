@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }} の詳細ページ</h1>

    <div style="margin-bottom: 20px;">
        <strong>商品ID:</strong> {{ $product->id }}
    </div>

    <div style="margin-bottom: 20px;">
        <strong>価格:</strong> {{ number_format($product->price) }} 円
    </div>

    <div style="margin-bottom: 20px;">
        <strong>旬の季節:</strong> {{ $product->season }}
    </div>

    <div style="margin-bottom: 20px;">
        <strong>商品説明:</strong>
        <p>{{ $product->description ?? '説明はまだありません。' }}</p>
    </div>

    @if($product->image)
    <div style="margin-bottom: 20px;">
        <img src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            style="max-width:300px;">
    </div>
    @endif

    <a href="{{ route('products.index') }}">← 商品一覧に戻る</a>
</div>
@endsection