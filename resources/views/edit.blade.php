<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('update', ['memoId' => $memo->id])}}">
                        @csrf
                        <label>edit memo</label>
                        <input type="text" name="content" value="{{$memo->content}}"/>
                        <button type="submit">
                            update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

