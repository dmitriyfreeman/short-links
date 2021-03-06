<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сокращенные ссылки</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Создайте сокращенную ссылку!</h1>

<div class="card">
    <div class="card-header">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="link" class="form-control" placeholder="URL">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Сократить ссылку</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Сокращенная ссылка</th>
                    <th>Ссылка</th>
                    <th>Переходов</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shortLinks as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>
                            <a href="{{ route('shorten.link', $link->code) }}" target="_blank">
                                {{ route('shorten.link', $link->code) }}
                            </a>
                        </td>
                        <td>{{ $link->link }}</td>
                        <td>{{ $link->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

</body>
</html>
