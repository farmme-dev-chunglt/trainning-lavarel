@extends('product.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    @include('product.ajaxProduct')
    <div class="content">
        <h1>Dashboard</h1>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-2">
                <button type="button" id="createNewProduct" class="btn btn-block btn-info" data-toggle="modal"
                    data-target="#form">
                    Add
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Img</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal " id="form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="bookForm" name="bookForm" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Title" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter Title" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">price</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Enter Title" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">discount</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="discount" name="discount"
                                    placeholder="Enter Title" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">imgUrl</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="imgUrl" name="imgUrl"
                                    placeholder="Enter Title" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop


