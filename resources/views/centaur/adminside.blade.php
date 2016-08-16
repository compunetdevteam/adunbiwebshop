<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="settings.php"><i class="fa fa-fw fa-wrench"></i> Settings</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-user"></i> Staff <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo3" class="collapse">
                <li>
                    <a href="{{url('register')}}">Create Staff</a>
                </li>
                <li>
                    <a href="{{url('users')}}">View Staff</a>
                </li>
                <li>
                    <a href="{{url('roles')}}">Assign Staff Role</a>
                </li>
            </ul>

        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-table"></i> Customer <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo4" class="collapse">
                <li>
                    <a href="{{url('sales/viewcustomers')}}">View Customers</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-list-alt"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo5" class="collapse">
                <li>
                    <a href="{{url('products/create')}}">Create Products</a>
                </li>
                <li>
                    <a href="{{url('products')}}">View Products</a>
                </li>
                <li><a href="{{url('products/edit')}}">Update Product</a></li>
            </ul>

        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa fa-fw fa-shopping-cart"></i> Sales <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo6" class="collapse">
                <li>
                    <a href="{{url('sales')}}">View Sales</a>
                </li>
                <li>
                    <a href="{{url('sales/create')}}">Make A Sale</a>
                </li>

                <li>
                    <a href="{{url('sales/setdiscount')}}">Set Discount</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa fa-fw fa-briefcase"></i> Stocks<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo7" class="collapse">
                <li>
                    <a href="{{url('stock/viewstock')}}">View Stocks</a>
                </li>
                <li>
                    <a href="{{url('stock/newarrivals')}}">New Arrivals</a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo8"><i class="fa fa-user"></i> Suppliers <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo8" class="collapse">
                <li>
                    <a href="{{url('suppliers')}}">View Suppliers</a>
                </li>
                <li>
                    <a href="{{url('suppliers/create')}}">Create Suppliers</a>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo9"><i class="fa fa-user"></i> Category <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo9" class="collapse">
                <li>
                    <a href="{{url('categories')}}">View Category</a>
                </li>
                <li>
                    <a href="{{url('categories/createpage')}}">Create categories</a>
                </li>

            </ul>
        </li>


    </ul>
</div>