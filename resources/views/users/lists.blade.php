<h2> Users list </h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        @forelse($users as $user)
            <tr>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
            </tr>
        @empty
            <tr> <td colspan="2"> Data not available </td> </tr>
        @endforelse
    </tbody>
</table>
