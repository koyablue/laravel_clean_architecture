@extends('layouts.base_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Index</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('create')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">new memo</span>
                                </div>
                                <input type="text" class="form-control" name="content">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    create
                                </button>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <tbody>
                                @if(!empty($MemoIndexViewModel->memos))
                                    @foreach($MemoIndexViewModel->memos as $memo)
                                        <tr>
                                            <td>{{$memo->content}}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary">
                                                    <a href="{{route('show', ['memoId' => $memo->id])}}">show</a>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary">
                                                    <a href="{{route('edit', ['memoId' => $memo->id])}}">edit</a>
                                                </button>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('delete', ['memoId' => $memo->id])}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
