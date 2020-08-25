<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <!-- ['user' => $user->id] parametro q vai receber -->
    <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="POST">
        @csrf
        <!-- como o form so suporta post/get, usa o helper method-->
        @method('PUT')
        <label for="">Nome do Usuário: </label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label for="">Email do Usuário: </label>
        <input type="email" name="email" value="{{ $user->email }}">

        <label for="">Senha do Usuário: </label>
        <input type="password" name="password" value="">

        <input type="submit" value="Editar Usuário">
    </form>
</body>
</html>