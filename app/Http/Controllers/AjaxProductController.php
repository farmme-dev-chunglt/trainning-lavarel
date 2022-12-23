<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;

class AjaxProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::paginate(5);
        if ($request->ajax()) {
            $data = Book::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('book',compact('books'));
    }
    public function softDestroy($slug)
    {
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return redirect()->route('product.index', 'err');
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
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return redirect()->route('product.index', 'err');
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
        $product = Product::findProductBySlug($slug);
        if (empty($product)) {
            return redirect()->route('product.index', 'can not find product');
        }

        $product->forceDelete();
        return redirect()->route('product.index');
    }
}
