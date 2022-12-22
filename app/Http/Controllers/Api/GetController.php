<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class GetController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProduct = Product::paginate(5);
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
        $data = $request->only(['name', 'description', 'price', 'discount', 'imgUrl']);
        $validator = Product::validate($data);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
            // response()->json(['message' => 'we receive your request']);
        }
        Product::create($data);
        return response()->json(['message' => 'we receive your request', 201]
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

    public function update(Request $request, $slug)
    {
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return response()->json('not found');
        }
        $data = $request->only(['name', 'description', 'price', 'discount', 'imgUrl']);
        $validator = Product::validate($data);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product->update($data);
        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function softDestroy(Request $request, $slug)
    {
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return response()->json('not found');
        }
        $product->delete();
        return response()->json('success');
    }

    public function trash()
    {
        $product = Product::withTrashed()
            ->whereNotNull('deleted_at')
            ->paginate(5);
        return response()->json([
            'data' => $product->items(),
            'current_page' => $product->currentPage(),
            'last_page' => $product->lastPage(),
            'per_page' => $product->perPage(),
            'total' => $product->total(),
        ]);
    }

    public function restore($slug)
    {
        if (Product::findTrashedBySlug($slug)->restore()) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'err']);
        }

    }

    public function deleteTrasher($slug)
    {
        if (Product::findTrashedBySlug($slug)->forceDelete()) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'err']);
        }

    }
}
