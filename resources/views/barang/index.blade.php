@extends('layout.template')
<!-- START DATA -->
@section('table')

        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('main')}}" method="get">
                      <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" 
                      placeholder="Enter Keyword" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='main/create' class="btn btn-primary">+ Add Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">id_stock</th>
                            <th class="col-md-1">stock_code</th>
                            <th class="col-md-3">stock_name</th>
                            <th class="col-md-2">stock_category</th>
                            <th class="col-md-2">price</th>
                            <th class="col-md-1">qty</th>
                            <th class="col-md-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id_stock}}</td>
                                <td>{{$item->stock_code}}</td>
                                <td>{{$item->stock_name}}</td>
                                <td>{{$item->stock_category}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>
                                    <a href='{{url('main/'.$item->id_stock.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                    <form class='d-inline' action="{{url('main/'.$item->id_stock) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               {{$data->links()}}
          </div>
          <!-- AKHIR DATA -->
          @endsection