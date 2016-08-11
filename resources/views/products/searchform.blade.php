<h1>Search product by date</h1>
{!! Form::open(['method'=>'GET','url'=>'products.;searchformresult','class'=>'navbar-form navbar-left','role'=>'search'])  !!}


<div class="input-group custom-search-form">
    Date from<input type="text" class="form-control" name="search" placeholder="Date begining...">
    Date ending<input type="text" class="form-control" name="search" placeholder="Date ending...">
    
        <input type="submit" name="Search">  
          
</div>
{!! Form::close() !!}

