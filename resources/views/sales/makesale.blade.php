@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <div class="col-md-pull-9">

        <form action="{{url('sale/make')}}" method="post" role="form" class="form-horizontal" id="saleform">
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
                {!! Form::select('Products', (['0', 'Select a Product'] + $products),'', ['class'=>'form-control','id'=>'productdd']) !!}
            </div>
            <a href="#" class="btn btn-primary" id="prodbtn">Add Another Product</a>
            <div class="form-group"><b>Select User :</b>
            {!! Form::select('Users',(['0', 'Select a Product'] + $users),'', ['class'=>'form-control']) !!}
            </div>
        </form>

    </div>

@endsection
@section('js')
    $('#prodbtn').click(function(){
        $("<div class="form-group"><b>Select a Product  :</b>
        {!! Form::select('Products',(['0', 'Select a Product'] + $products),'', ['class'=>'form-control','id'=>'productdd']) !!}
    </div>").after('#prodbtn');
    })
@endsection
