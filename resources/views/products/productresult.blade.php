@extends('Centaur::dashlayout')

@section('content')
<div>
<h1>Product search result</h1>
<ul>
@foreach($results as $result)
<li><b>Name of Product:</b>{{$result['productname']}}</li>
<li><b>Name of description</b>{{$result['description']}}</li>
@endforeach
</ul>
</div>
@endsection