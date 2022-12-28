<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends BaseController
{
    public function index()
    {
        $listProduct = Product::paginate(5);
        $result = [
            'data' => $listProduct->items(),
            'current_page' => $listProduct->currentPage(),
            'last_page' => $listProduct->lastPage(),
            'per_page' => $listProduct->perPage(),
            'total' => $listProduct->total(),
        ];
        return $this->sendResponse($result,'success');
    }


    public function store(Request $request)
    {
        $data = $request->only(['name', 'description', 'price', 'discount', 'imgUrl']);
        $validator = Product::validate($data);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
            // response()->json(['message' => 'we receive your request']);
        }
        Product::create($data);
        return $this->sendResponse([],'we receive your request');

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $slug)
    {
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return $this->sendError('not found.');
        }
        $data = $request->only(['name', 'description', 'price', 'discount', 'imgUrl']);
        $validator = Product::validate($data);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $product->update($data);
        return $this->sendResponse([],'success');

    }

    public function softDestroy(Request $request, $slug)
    {
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return $this->sendError('not found.');
        }
        $product->delete();
        return $this->sendResponse([] ,'success');
    }

    public function trash()
    {
        $product = Product::withTrashed()
            ->whereNotNull('deleted_at')
            ->paginate(5);
        $result = [
            'data' => $product->items(),
            'current_page' => $product->currentPage(),
            'last_page' => $product->lastPage(),
            'per_page' => $product->perPage(),
            'total' => $product->total(),
        ];
        return $this->sendResponse($result,'success');
    }

    public function restore($slug)
    {
        if (Product::findTrashedBySlug($slug)->restore()) {
            return $this->sendError('not found.');
        } else {
            return $this->sendResponse([],'success');
        }

    }

    public function deleteTrasher($slug)
    {
        if (Product::findTrashedBySlug($slug)->forceDelete()) {
            return $this->sendError('not found.');
        } else {
            return $this->sendResponse([],'success');
        }

    }
}
