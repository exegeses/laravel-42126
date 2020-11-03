<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <h1>Estructuras Blade</h1>

        @if( $nombre == 'marcos' )
            bienvenido {{ $nombre }}
        @else
            usuario desconocido
        @endif

        <ul class="list-group">
        @for( $i = 0; $i < 13; $i++ )
            <li class="list-group-item">item de lista {{ $i }}</li>
        @endfor
        </ul>

    </main>
</body>
</html>
