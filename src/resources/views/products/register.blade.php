@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-page">
    <h2>商品登録</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">商品名 <span class="required">必須</span></label>
            <input class="contact-form__input" type="text" name="name" id="name"
                value="{{ old('name') }}" placeholder="商品名を入力">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="price">値段 <span class="required">必須</span></label>
            <input class="contact-form__input" type="number" name="price" id="price"
                value="{{ old('price') }}" placeholder="値段を入力" min="0">
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">商品画像 <span class="badge-required">必須</span></label>

            <label for="image" class="custom-file-upload">
                ファイルを選択
            </label>
            <input type="file" name="image" id="image" accept="image/*" hidden>
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>季節 <span class="required">必須</span>複数選択可</label><br>
            <label><input type="checkbox" name="season[]" value="春" {{ in_array('春', old('season', [])) ? 'checked' : '' }}>春</label>
            <label><input type="checkbox" name="season[]" value="夏" {{ in_array('夏', old('season', [])) ? 'checked' : '' }}>夏</label>
            <label><input type="checkbox" name="season[]" value="秋" {{ in_array('秋', old('season', [])) ? 'checked' : '' }}>秋</label>
            <label><input type="checkbox" name="season[]" value="冬" {{ in_array('冬', old('season', [])) ? 'checked' : '' }}>冬</label>
            @error('season')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">商品説明 <span class="required">必須</span></label>
            <textarea name="description" id="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="actions">
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection