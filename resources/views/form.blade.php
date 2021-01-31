@extends('master')
@section('main_content')
    @if(isset($data))
        <form method="post" action="{{route('form_update')}}">
            @else
                <form method="post" action="{{route('form_submit')}}">
                    @endif
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{isset($data)?$data->id:""}}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="enter the name..."
                               value="{{isset($data)?$data->name:""}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter the mail address..."
                               value="{{isset($data)?$data->email:""}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter the password"
                               value="{{isset($data)?$data->password:""}}">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Submit">
                </form>
@endsection
