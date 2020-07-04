<html>

    <head>
        <link rel="stylesheet" href="{{ public_path().'/css/bootstrap.min.css'}}" type="text/css"></link>
    </head>

    <img src="{{ public_path().'/assets/img/Logo.png'}}" alt="" style="width: 80px;">

    <div>
        <h4 class="text-center">Tipos</h4>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Type::all() as $type)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td>
                        {{ $type->name }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</html>