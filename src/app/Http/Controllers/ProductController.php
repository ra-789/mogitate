<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request) //一覧
    {
        $query = Product::query();

        if ($request->filled('sort_price')) {
            $query->orderBy('price', $request->sort_price);
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products'));
    }

    public function search(Request $request) //検索
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort_price')) {
            $query->orderBy('price', $request->sort_price);
        }

        $products = $query->paginate(6);

        return view('products.search', compact('products'))
            ->with([
                'search' => $request->search,
                'sort_price' => $request->sort_price,
            ]);
    }
    public function register()
    {
        return view('products.register');
    }

    public function store(RegisterRequest $request) //登録
    {
        $validated = $request->validated();

        $path = $request->file('image')->store('fruits-img', 'public'); //画像

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $path,
            'season' => implode(',', $validated['season']),
            'description' => $validated['description'],
        ]);

        return redirect()->route('products.index')->with('success', '');
    }

    public function show($productId) //詳細
    {
        $product = Product::findOrFail($productId);
        return view('products.edit', compact('product'));
    }

    //更新
    public function update(RegisterRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $data = $request->validated();

        // 画像がアップロードされた場合のみ更新
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $data['image'] = basename($path);
        } else {
            $data['image'] = $product->image; // 画像未選択なら既存を維持
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', '商品情報を更新しました！');
    }
}
