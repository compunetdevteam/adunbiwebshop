@extends('Centaur::dashlayout')
@section('sidebar')
    @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
        @include('centaur.userside')
    @else
        @include('centaur.adminside')
    @endif
@endsection
@section('content')
    <div class="row">
        <h1 class="text-center">Confirm Product Deletion</h1>
        <hr>
        <form action="{{url('products/doDelete')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <label for="Id" class="label-control col-xs-2"><b>Product Id:</b></label>
                <div class="col-xs-3"><input name="id" type="text" readonly value="{{$product->id}}" class="form-control"></div>
            </div>
                <div class="form-group">
                    <label for="Id" class="label-control col-xs-2"><b>Product Name:</b></label>
                    <div class="col-xs-6"><input type="text" readonly value="{{$product->productname}}" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label for="Id" class="label-control col-xs-2"><b>Product Selling Price:</b></label>
                    <div class="col-xs-6"><input type="text" readonly value="{{$product->sellingprice}}" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label for="Id" class="label-control col-xs-2"><b>Product Cost Price:</b></label>
                    <div class="col-xs-6"><input type="text" readonly value="{{$product->costprice}}" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label for="Id" class="label-control col-xs-2"><b>Product Weight:</b></label>
                    <div class="col-xs-6"><input type="text" readonly value="{{$product->weight}}" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label for="Id" class="label-control col-xs-2"><b>Product Supplier:</b></label>
                    <div class="col-xs-6"><input type="text" readonly value="{{$product->supplier->suppliername}}" class="form-control"></div>
                </div>
                <div class="col-md-offset-6">
                    <input type="submit" value="Delete" class="btn btn-danger"/> <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                </div>
                <p>
                @if(Session::has('status'))
                    <p class="alert-warning -warning">{{Session::get('status',5)}}</p>
                    @endif
                    </p>
            </div>

        </form>
    </div>
@endsection