<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários Cadastrados</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Nome:</td>
            <td>Email:</td>
            <td>Ações:</td>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.list', ['user' => $user->id]) }}">Ver Usuário</a>
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <!-- form spoofing (falsifica a verbalização) -->
                    @method('delete')
                    <input type="hidden" name="user" value="{{ $user->id }}">
                    <input type="submit" value="Remover">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>