<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
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