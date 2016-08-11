@extends('Centaur::dashlayout')
@section('sidebar')
 @include('centaur.adminside')
@endsection


@section('content')
<h2>List of all Suppliers</h2>
<ul>
@foreach($allsuppliers as $supplier)
<li>Supplier Name: {{ $supplier->suppliername  }}</li><br>
 Supplier Address: {{$supplier->supplieraddress}}
<div>
 <a href="suppliers/{{ $supplier->id }}" class="btn btn-primary">Update </a>
  <a href="suppliers/delete/{{$supplier->id}}" class="btn btn-primary">Delete</a>
 </div>
<hr/>
@endforeach
</ul>
@endsection