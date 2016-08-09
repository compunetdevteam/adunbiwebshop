@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <h1>List of all Categories</h1>
    <table border="2">

        @foreach($category as $cat)
            <th><b>Category Name:</b> {{$cat['name']}} </th>
            <tr> <td><b>Categories Description:</b> {{$cat['description']}}</td></tr>
            @endforeach
            </ul>
    </table>
@endsection