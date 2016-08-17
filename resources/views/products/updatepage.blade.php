@extends('Centaur::dashlayout')
@section('sidebar')
    @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
        @include('centaur.userside')
    @else
        @include('centaur.adminside')
    @endif
@endsection
@section('content')
<h2 class="text-center">Update Products</h2>
<hr/>

   {!! Form::open(array('url'=>'products/Updateproduct','method'=>'post','class'=>'form-horizontal')) !!}
   
                @foreach($products as $product)
                 <div class="form-group">
                     <label for="Product Id" class="label-control col-xs-3">Product Id:</label>
                     <div class="col-xs-3"><input type="text" readonly name="id" value=" {{$product->id}} " class="form-control"/></div>
                </div>
                <div class="form-group">
                    <label for="Product Name" class="label-control col-xs-3">Product Name :</label>
                    <div class="col-xs-3"><input type="text" name="productname" value=" {{$product->productname}} " class="form-control"/>
                        </div>
                </div>

                <div class="form-group">
                    <label for="Date Of Purchase" class="label-control col-xs-3">Date Of Purchase :</label>
                    <div class="col-xs-3">
                        <input type="text" name="dateofpurchase" value="{{$product->dateofpurchase}}"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Batch Number" class="label-control col-xs-3">Batch Number :</label>
                    <div class="col-xs-3"><input type="text" name="batchnumber" value="{{$product->batchnumber}}"  class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <label for="Serial Number" class="label-control col-xs-3">Serial Number :</label>
                    <div class="col-xs-3"><input type="text" name="serialnumber" value="{{$product->serialnumber}}"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Cost Price" class="label-control col-xs-3">Cost Price :</label>
                    <div class="col-xs-3">
                        <input type="text" name="costprice" value="{{$product->costprice}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Selling Price" class="label-control col-xs-3">Selling Price :</label>
                    <div class="col-xs-3">
                        <input type="text" name="sellingprice" value="{{$product->sellingprice}}"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Description" class="label-control col-xs-3">Product Description :</label>
                    <div class="col-xs-3">
                        <textarea cols="10" rows="7" name="description" class="form-control">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Product Weight" class="label-control col-xs-3">Product Weight :</label>
                    <div class="col-xs-3">
                        <input type="text" name="weight" value="{{$product->weight}}" class="form-control">
                    </div>
                </div>
                 @endforeach

                {!!Form::submit('Save changes', array('class'=>'btn-primary'))  !!}
{!! Form::close() !!}
    @if(Session::has('status'))
        <p class="alert-warning">{{Session::get('status')}}</p>
    @endif
@endsection