@extends('master')
@section('main_content')
    <form action="{{route('form_many')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Post</label>
            <input type="text" name="post" class="form-control" >
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="sel1">Select Category:</label>
            <select class="form-control" name="category">
                 @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label name="tag">Select Tag:</label>
            <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-secondary btn-block">
    </form>
@endsection
