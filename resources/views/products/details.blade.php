
@extends('Centaur::dashlayout')
@section('content')

<ul>
    @foreach($product as $p)
        <li>{{ $p->productname }}</li>
        <li>{{ $p->dateofpurchase }}</li>
        <li>{{ $p->batchnumber }}</li>
        <li>{{ $p->serialnumber}}</li>
        <li>{{ $p->sellingprice }}</li>
        <li>{{ $p->description }}</li>
        <li>Click <a href="action({{ $p->id }}">here</a> to Edit</li>
    @endforeach
</ul>