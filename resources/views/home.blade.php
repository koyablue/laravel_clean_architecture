<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Index</div>
                <div class="card-body">
                    <form>
                        <label>new memo</label>
                        <input type="text" />
                        <button type="submit">
                            create
                        </button>
                    </form>
                    <table>
                        <tr>
                            <td>memomemo</td>
                            <td>
                                <button>edit</button>
                            </td>
                            <td>
                                <button>delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>memomemo</td>
                            <td>
                                <button>edit</button>
                            </td>
                            <td>
                                <button>delete</button>
                            </td>
                        </tr>
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

