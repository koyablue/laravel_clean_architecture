@extends('layouts.base_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('update', ['memoId' => $memo->id])}}">
                            @csrf
                            <div class="form-group">
                                <input name="content" type="text" class="form-control" id="exampleInputEmail1" value="{{$memo->content}}">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
