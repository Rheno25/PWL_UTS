@extends('layout.template')

@section('table')

@if ($errors -> any())
    <div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
    </div>
@endif

<form action='{{url('main')}}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">code_stock</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='stock_code' id="stock_code">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">name_stock</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='stock_name' id="stock_name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">category_stock</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='stock_category' id="stock_category">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='price' id="price">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">quantity</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='qty' id="qty">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Save</button></div>
    </div>
</div>
</form>
@endsection