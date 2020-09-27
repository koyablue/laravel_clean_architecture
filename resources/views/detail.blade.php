@extends('layouts.base_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CONTENT</th>
                                <th>CREATED AT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$memo->id}}</td>
                                <td>{{$memo->content}}</td>
                                <td>{{$memo->createdAt}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{route('index')}}">Back</a>
                </button>
            </div>
        </div>
    </div>








@endsection
