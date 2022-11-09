<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudar Senha</title>
</head>

<body>
    <h1>Mudar Senha</h1>
    <"{{ route('update-password') }}">
        <div>
            <label>Senha Anterior</label>
            <input type="password" placeholder="Senha Anterior" name="old_password">
        </div>
        <div>
            <label>Senha Nova</label>
            <input type="password" placeholder="Senha Anterior" name="new_password">
        </div>
        <button>Enviar</button>
    </form>
</body>

</html>

change-password.blade.php
