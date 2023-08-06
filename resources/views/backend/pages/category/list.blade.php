@extends('backend.master')
@section('content')
    <h1>Categories</h1>


    <a href="{{ route('category.form') }}" class="btn btn-success">Create </a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $key => $cat)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>{{ $cat->status }}</td>
                   
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a href="" class="btn btn-primary">Show</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
