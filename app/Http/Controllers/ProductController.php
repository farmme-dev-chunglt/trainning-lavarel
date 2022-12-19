<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $product = Product::paginate(5);
    return view('product.index', [
      'product' => $product,
    ]);
  }
  public function softDestroy($slug)
  {
    $product = Product::where('slug', $slug)->first();
    if (is_null($product)) {
      $message_err = 'err';
      return redirect()->route('product.index', $message_err);
    }
    $product->delete();
    return redirect()->route('product.index');
  }
  public function trash()
  {
    $product = Product::withTrashed()
      ->whereNotNull('deleted_at')
      ->paginate(5);
    return view('product.trash', [
      'product' => $product,
    ]);
  }
  public function restore($id)
  {
    Product::withTrashed()
      ->where('id', $id)
      ->restore();
    return redirect()->route('product.trash');
  }
  public function deleteTrasher($id)
  {
    Product::withTrashed()
      ->where('id', $id)
      ->forceDelete();
    return redirect()->route('product.trash');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreProductRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    Product::create($request->only(['name', 'description', 'price', 'discount', 'imgUrl']));
    return redirect()->route('product.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('product.create', [
      'product' => $product,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateProductRequest  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(StoreRequest $request, $slug)
  {
    $product = Product::where('slug', $slug)->first();
    if (is_null($product)) {
      $message_err = 'err';
      return redirect()->route('product.index', $message_err);
    }
    $product->update($request->only(['name', 'description', 'price', 'discount', 'imgUrl']));
    return redirect()->route('product.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($slug)
  {
    $product = Product::where('slug', $slug)->first();
    if (is_null($product)) {
      $message_err = 'can not find product';
      return redirect()->route('product.index', $message_err);
    }
    $product->forceDelete();
    return redirect()->route('product.index');
  }
}
