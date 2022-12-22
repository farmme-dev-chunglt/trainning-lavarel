@extends('product.layout')
@section('content')
    <div class="content">
        <h1>Dashboard</h1>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter">
                    <label>Search: <input type="search" class="form-control form-control-sm" placeholder=""
                            aria-controls="example1">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                    aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Id</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Price</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending">Discount</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="3"
                                aria-label="CSS grade: activate to sort column ascending">Btn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->name }}</th>
                                <th>{{ $item->description }}</th>
                                <th>{{ $item->price }}</th>
                                <th>{{ $item->discount }}</th>
                                <th>
                                    <a class='btn btn-info btn-block btn-flat'
                                        href="{{ route('product.edit', $item) }}">Edit</a>
                                </th>
                                <th>
                                    <form action="{{ route('product.destroy', $item->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class='btn btn-block btn-danger'>Delete</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="{{ route('product.softDestroy', $item->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class='btn btn-block btn-warning'>softDestroy</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    {{ $product->links('components.paginate') }}
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')

@stop
