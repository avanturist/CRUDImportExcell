<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title or 'Laravel' }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    </head>
    <body>

    <div class="container">

        <div class="form">
            <h3>Import data from Excell-file to the DB</h3>
            <form action="{{ route('import_file') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>

                @if(session('error'))
                    <p class="alert alert-danger">{!! session('error') !!}</p>
                @endif
                @if(session('status'))
                    <p class="alert alert-success">{!! session('status') !!}</p>
                @endif

                <div class="form-group">
                    <input type="submit" value="Import" class="btn btn-primary btn-xs">
                </div>

            </form>
        </div>
            <div id="app"></div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
