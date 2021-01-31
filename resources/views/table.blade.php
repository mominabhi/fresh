@extends('master')
@section('main_content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->password}}</td>
            <td>
                <a href="{{route('edit_data',[$data->id])}}"><button type="button" name="edit" class="btn btn-warning">Edit</button></a>
                <a href="{{URL::to('/delete_data/'.$data->id)}}"><button type="button" name="delete" class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
