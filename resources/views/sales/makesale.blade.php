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
        <h1 class="text-center">Make A Sale</h1>
        <hr>
        <form action="{{url('sale/make')}}" method="post" class="form-horizontal" id="saleform">
            <div class="form-group"><b>Customer Name :</b>
            <input type="text" placeholder="CustomerName" class="form-control">
            </div>
            <div class="form-group"><b>Customer Address :</b>
                <input type="text" placeholder="Customer Address" class="form-control">
            </div>
            <div class="form-group"><b>Phone Number :</b>
                <input type="text" placeholder="Phone Number..080xxxxxxxx" class="form-control">
            </div>
            <div class="form-group"><b>Email Address :</b>
                {!! Form::email('emailaddress','', ['placeholder'=>'user@user.com', 'class'=>'form-control']) !!}
            </div>
            <div class="form-group"><b>Select a Product  :</b>
                {!! Form::select('Products', $products,'', ['class'=>'form-control','id'=>'productdd']) !!}
            </div>
            <a href="#" class="btn btn-primary" id="prodbtn">Add Another Product</a>
            <div class="form-group"><b>Select User :</b>
            {!! Form::select('Users',$users,'', ['class'=>'form-control']) !!}
            </div>
        </form>
    </div>

@endsection
@section('js')
    $('#prodbtn').click(function(){
    })
@endsection
