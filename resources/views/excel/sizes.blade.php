<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Oz</th>
            <th>Ml</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sizes as $size)
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