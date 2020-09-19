<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Index</div>
                <div class="card-body">
                    <form method="POST" action="{{route('create')}}">
                        @csrf
                        <label>new memo</label>
                        <input type="text" name="content" />
                        <button type="submit">
                            create
                        </button>
                    </form>
                    <table>
                        @if($memos->isNotEmpty())
                            @foreach($memos as $memo)
                                <tr>
                                    <td>{{$memo->content}}</td>
                                    <td>
                                        <button><a href="{{route('show', ['memoId' => $memo->id])}}">show</a></button>
                                    </td>
                                    <td>
                                        <button><a href="{{route('edit', ['memoId' => $memo->id])}}">edit</a></button>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('delete', ['memoId' => $memo->id])}}">
                                            <button type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>

