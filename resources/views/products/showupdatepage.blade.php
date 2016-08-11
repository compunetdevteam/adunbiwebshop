@extends('Centaur::dashlayout')

@section('content')
<h2>Update Products</h2>
<hr/>
   <ul>
   {!! Form::open(array('url'=>'products/Updateproduct','method'=>'post')) !!}
   
 
 <div >
Product name:<input type="text" readonly name="id" value=" {{$result->id}} " class="form-control"/>
</div> 
<div >
Product name:<input type="text" name="productname" value=" {{$result->productname}} " class="form-control"/>
</div>

<div class="form-group">
Date of purchase:<input type="text" name="dateofpurchase" value="{{$result->dateofpurchase}}"  class="form-control">
</div>
<div class="form-group">
Batch number:<input type="text" name="batchnumber" value="{{$result->batchnumber}}"  class="form-control">
</div>
<div class="form-group">
Serial number:<input type="text" name="serialnumber" value="{{$result->serialnumber}}"  class="form-control">
</div>
<div class="form-group">
Cost price:<input type="text" name="costprice" value="{{$result->costprice}}" class="form-control">
</div>
<div class="form-group">
Selling price:<input type="text" name="sellingprice" value="{{$result->sellingprice}}"  class="form-control">
</div>
<div class="form-group">
Product description:<input type="text" name="description" value="{{$result->description}}" class="form-control">
</div>
<div class="form-group">
Weight:<input type="text" name="weight" value="{{$result->weight}}" class="form-control">
{{-- </div><div class="form-group">
Stock:<input type="text" name="stock"  class="form-control">
</div>
<div class="form-group">
Supplier:<input type="text" name="supplier"  class="form-control">
</div> --}}

{!!Form::submit('Save changes', array('class'=>'btn-primary'))  !!}
</ul>

    
{!! Form::close() !!}
@endsection