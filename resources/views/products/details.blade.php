@extends('Centaur::dashlayout')
@section('sidebar')
    @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
        @include('centaur.userside')
    @else
        @include('centaur.adminside')
    @endif
@endsection
@section('content')

<div class="col-md-7">
    <h2>Product Details</h2>
    <ul>
        @foreach($products as $product)
            <li><b>Product Name :</b>{{ $product->productname }}</li>
            <li><b>Date Of Purchase :</b>{{ $product->dateofpurchase }}</li>
            <li><b>Batch Number :</b>{{ $product->batchnumber }}</li>
            <li><b>Serial Number :</b>{{ $product->serialnumber}}</li>
            <li><b>Price :</b>{{ $product->sellingprice }}</li>
            <li><b>Description of Product :</b>{{ $product->description }}</li>
            <p><li>Click <a href="{{url('products/showupdatepage/'.$product->id)}}">here</a> to Edit or <a href="{{url()->previous()}}">back</a> to return to the last Page.</li></p>
            
        @endforeach
    </ul>
</div>
@endsection