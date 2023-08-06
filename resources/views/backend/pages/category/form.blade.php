@extends('backend.master')


@section('content')


    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{$err}}</p>
        @endforeach
        @endif

        <div class="form-group">
            <label for="">name</label>
            <input name="name" type="text" class="form-control" id="" placeholder="Enter category name">
        </div>

  
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
             </div>

    
        <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" placeholder="upload image" class="form-control">

        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
