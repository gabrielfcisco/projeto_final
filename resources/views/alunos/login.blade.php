<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Login Do Aluno</title>
</head>

<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Área do Aluno</h1>
            <img src="Library-rafiki.svg" class="left-login-img" alt="people-working">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h3>Entre aqui</h3>
                @if ($errors->has('email'))
                <span class="textfield">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <form action="{{route('aluno.login')}}" method="POST">
                    @csrf
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input id="Usuário" type="text" name="RA" placeholder="RA" required>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="password" id="senha" placeholder="Senha" required>
                    </div>
                    <div class="textfield">
                        <input id="check" name="remember" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Mantenha-me conectado</label>
                    </div>
                    <button class="btn-login" type="submit" nome="acao" value="Enviar">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>