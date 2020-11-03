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
        <h1>Proceso de dato enviado por un form</h1>

        <div class="alert bg-light shadow-sm p-4">
            La frase enviada es: <br>
            <span class="lead">
                {{ $frase }}
            </span>
            <br>
            <a href="/formulario" class="btn btn-outline-secondary">
                volver al form
            </a>
        </div>

    </main>

</body>
</html>
