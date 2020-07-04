<html>

    <head>
        <link rel="stylesheet" href="{{ public_path().'/css/bootstrap.min.css'}}" type="text/css"></link>
    </head>

    <img src="{{ public_path().'/assets/img/Logo.png'}}" alt="" style="width: 80px;">

    <div>
        <h4 class="text-center">Tamaños</h4>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Oz</th>
                <th>Ml</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Size::all() as $size)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td>
                        {{ $size->name }}
                    </td>
                    <td>
                        {{ $size->ml }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</html>