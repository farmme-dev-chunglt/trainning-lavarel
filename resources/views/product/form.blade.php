@extends('product.layout')
@section('content')
    <div class="modal fade" id="modal-form" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Quick Example <small>jQuery Validation</small>
                                        </h3>
                                    </div>
                                    <form id="quickForm" novalidate="novalidate"
                                        @if (isset($product)) action="{{ route('product.update', $product->slug) }}" 
                            @else
                                action="{{ route('product.store') }}" @endif
                                        method="post">
                                        @csrf
                                        @if (isset($product))
                                            @method('PUT')
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter email"
                                                aria-describedby="exampleInputEmail1-error" aria-invalid="true"
                                                value="{{ isset($product) ? $product->name : '' }}">
                                            @if ($errors->has('name'))
                                                <span id="exampleInputEmail1-error" class="error">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <input type="text" name="description" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter email"
                                                aria-describedby="exampleInputEmail1-error" aria-invalid="true"
                                                value="{{ isset($product) ? $product->description : '' }}">
                                            @if ($errors->has('description'))
                                                <span id="exampleInputEmail1-error" class="error">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="number" name="price" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter email"
                                                aria-describedby="exampleInputEmail1-error" aria-invalid="true"
                                                value="{{ isset($product) ? $product->price : '' }}">
                                            @if ($errors->has('price'))
                                                <span id="exampleInputEmail1-error" class="error">
                                                    {{ $errors->first('price') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Discount</label>
                                            <input type="text" name="discount" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter email"
                                                aria-describedby="exampleInputEmail1-error" aria-invalid="true"
                                                value="{{ isset($product) ? $product->discount : '' }}">
                                            @if ($errors->has('discount'))
                                                <span id="exampleInputEmail1-error" class="error">
                                                    {{ $errors->first('discount') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Img</label>
                                            <input type="text" name="imgUrl" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter email"
                                                aria-describedby="exampleInputEmail1-error" aria-invalid="true"
                                                value="{{ isset($product) ? $product->imgUrl : '' }}">
                                            @if ($errors->has('imgUrl'))
                                                <span id="exampleInputEmail1-error" class="error">
                                                    {{ $errors->first('imgUrl') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
<style>
    .error {
        margin-top: 15px;
        color: red !important;
    }
</style>
