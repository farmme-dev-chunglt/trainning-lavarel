<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class GetController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $listProduct = Product::paginate(10);
    return response()->json([
      'data' => $listProduct->items(),
      'current_page' => $listProduct->currentPage(),
      'last_page' => $listProduct->lastPage(),
      'per_page' => $listProduct->perPage(),
      'total' => $listProduct->total(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
    ]);
    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }
    $newProduct = Product::create($request->all());
    return response()->json(
      (object) [
        'message' => 'we receive your request',
        'data' => $newProduct,
        201,
      ]
    );
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);
    if (is_null($product)) {
      return response()->json('error');
    }
    $product->update($request->all());
    return response()->json($product);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Product $product)
  {
    $product->delete();
    return response()->json('susccess');
  }
}
