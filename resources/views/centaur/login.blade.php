@extends('Centaur::dashlayout')

@section('content')
		<div class="row">
                        <form role="form" action="{{url('dologin')}}" method="post" class="form-horizontal">

                            <div class="form-group input-group col-md-5">
                                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                <input type="text" class="form-control"placeholder="Username">
                            </div>
                             <div class="form-group input-group col-md-5">
                                <span class="input-group-addon"><i class="fa fa-fw fa-asterisk"></i></span>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            
                                <label class="checkbox">
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
        </div>
                    
	@endsection


