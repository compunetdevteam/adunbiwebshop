@extends('Centaur::dashlayout')
@section('content')
<h2>List of all Suppliers</h2>
<ul>
@foreach($allsuppliers as $supplier)
<li>Supplier Name: {{ $supplier->suppliername  }}</li><br>
 Supplier Address: {{$supplier->supplieraddress}}

 <p><a href="suppliers/{{ $supplier->id }}">Update Recored</a></p>
  <p><a href="suppliers/delete/{{$supplier->id}}">Delete Recorded</a></p>
<hr/>
@endforeach
</ul>
@endsection