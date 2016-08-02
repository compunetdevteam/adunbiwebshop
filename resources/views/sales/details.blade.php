@if(Sentinel::check())
    $user = Sentinel::getUser();
    @if($user->permissions === 'admin')
        @extends('Centaur::dashlayout')
   @else
        @extends('Centaur::userlayout')
@endif

@section('content')

<ul>
    @foreach($sale as $s)
        <li>{{ $s->productname }}</li>
        <li>{{ $s->productdescription }}</li>
        <li>{{ $s->customername  }}</li>
        <li>{{ $s->total }}</li>
        <li>Click <a href="action({{ $s->id }}">here</a> to Edit</li>
    @endforeach
</ul>