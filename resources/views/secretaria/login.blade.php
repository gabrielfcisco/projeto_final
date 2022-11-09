<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="main-login">
        <div class="left-login">
            <h1 style="color:#92e3a9">Secretaria</h1>
            <img src="/on-the-office-animate.svg" class="left-login-img" alt="people-working">
        </div>
        <div class="right-login">
            <div class="sec-card-login">
                <h3>Entre aqui</h3>
                @if ($errors->has('email'))
                <span class="textfield">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <form action="{{route('secretaria.login')}}" method="POST">
                    @csrf
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input style="background: #92E3A9" id="usuario" type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input style="background: #92E3A9" type="password" name="password" id="senha" placeholder="Senha" required>
                    </div>
                    <div class="textfield">
                        <input id="check" name="remember" type="checkbox" class="check sec-check" checked>
                        <label for="check"><span class="icon"></span> Mantenha-me conectado</label>
                    </div>
                    <button style="color: #519665;" class="btn-login" type="submit" nome="acao" value="Enviar">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>