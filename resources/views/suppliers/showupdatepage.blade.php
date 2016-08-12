@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')
    <h2>List of all Suppliers</h2>
    <ul>
    @foreach($updated as $update)
       {!! Form::open(array('url'=>'suppliers/UpdateSupplier','method'=>'post')) !!}
            <input type="text" value="{{$update->id}}" readonly class="form-control" name="id"/>



            Supplier Name: <input type="name" name="name" value ="{{ $update->suppliername  }}"
                                               class="form-control">
       Supplier Address:<input type="address" name="address" value ="{{$update->supplieraddress}}" class="form-control" col="10" row="7">
        <br/>
            {!!Form::submit('Save changes', array('class'=>'btn-primary'))  !!}
            {!! Form::close() !!}


            <hr/>
        @endforeach
    </ul>
@endsection