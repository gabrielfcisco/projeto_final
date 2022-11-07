<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Secretaria</title>
</head>
<body>
	<div class="container p-3 bg-light">
        <h3>Login</h3>
        <form method="POST">
            @csrf
            <label for="Login">Login</label>
            <input type="text" name="Login" id="Login" placeholder="Login">
            <br>
            <label for="Senha">Senha</label>
            <input type="text" name="Senha" id="Senha" placeholder="Senha">
            <button type="submit" class="btn btn-primary mb-3">Login</button>
        </form>
	</div>
</body>
</html>