@extends('Centaur::dashlayout')
@section('content')
<h2>List of all Suppliers</h2>
<ol>
@foreach($allsuppliers as $supplier)
<li>Supplier Name: {{ $supplier->suppliername  }}</li><br>
 Supplier Address: {{$supplier->supplieraddress}}

 <p><a href="supplier/showupdatepage/{{ $supplier->id }}">Update Recored</a></p>
  <p><a href="supplier/delete/{{ $supplier->id }}">Delete Recored</a></p>
<hr/>
@endforeach
</ol>
@endsection