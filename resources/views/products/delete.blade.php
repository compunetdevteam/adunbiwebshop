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
        <form action="{{url('products/doDelete')}}" method="post" class="form-horizontal">
            @foreach($product as $p)
            <div class="form-control">
                <label for="" class="label-control"><input type="text" readonly value="{{$p->id}}"></label>
            </div>
            <div class="form-control">
                <label for="" class="label-control"><input type="text"></label>
            </div>
            <div class="form-control">
                <label for="" class="label-control"><input type="text"></label>
                </div>
            <div class="form-control">
                <label for="" class="label-control"><input type="text"></label>
                </div>
            <div class="form-control">
                <label for="" class="label-control"><input type="text"></label>
                </div>
            </div>
            @endforeach
        </form>
    </div>
@endsection