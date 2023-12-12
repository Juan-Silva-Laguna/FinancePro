<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinancePro</title>
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;	
            font-family: Raleway, sans-serif;
        }

        body {
            background: linear-gradient(90deg, #2f83c4, #2fadf1);		
        }

        .invalid-feedback{
            color: red;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
        }

        .screen {		
            background: linear-gradient(40deg, #1572e8, #06418e);	
            position: relative;	
            height: 600px;
            width: 360px;	
            box-shadow: 0px 0px 14px #5C5696;
        }

        .screen__content {
            z-index: 1;
            position: relative;	
            height: 100%;
        }

        .screen__background {		
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            -webkit-clip-path: inset(0 0 0 0);
            clip-path: inset(0 0 0 0);	
        }

        .screen__background__shape {
            transform: rotate(45deg);
            position: absolute;
        }

        .screen__background__shape1 {
            height: 520px;
            width: 520px;
            background: #FFF;	
            top: -50px;
            right: 120px;	
            border-radius: 0 72px 0 0;
        }

        .screen__background__shape2 {
            height: 220px;
            width: 220px;
            background: #1572e8;	
            top: -172px;
            right: 0;	
            border-radius: 32px;
        }

        .screen__background__shape3 {
            height: 540px;
            width: 190px;
            background: linear-gradient(270deg, #1572e8, #1F93E8);
            top: -24px;
            right: 0;	
            border-radius: 32px;
        }

        .screen__background__shape4 {
            height: 400px;
            width: 200px;
            background: #1F93E8;	
            top: 420px;
            right: 50px;	
            border-radius: 60px;
        }

        .login {
            width: 320px;
            padding: 30px;
            padding-top: 88px;
        }

        .login__field {
            padding: 20px 0px;	
            position: relative;	
        }

        .login__icon {
            position: absolute;
            top: 30px;
            color: #7875B5;
        }

        .login__input {
            border: none;
            border-bottom: 2px solid #D1D1D4;
            background: none;
            padding: 10px;
            padding-left: 24px;
            font-weight: 700;
            width: 75%;
            transition: .2s;
        }

        .login__input:active,
        .login__input:focus,
        .login__input:hover {
            outline: none;
            border-bottom-color: #6A679E;
        }

        .login__submit {
            background: #fff;
            font-size: 14px;
            margin-top: 30px;
            padding: 16px 20px;
            border-radius: 26px;
            border: 1px solid #D4D3E8;
            text-transform: uppercase;
            font-weight: 700;
            display: flex;
            align-items: center;
            width: 100%;
            color: #4C489D;
            box-shadow: 0px 2px 2px #5C5696;
            cursor: pointer;
            transition: .2s;
        }

        .login__submit:active,
        .login__submit:focus,
        .login__submit:hover {
            border-color: #6A679E;
            outline: none;
        }

        .button__icon {
            font-size: 24px;
            margin-left: auto;
            color: #7875B5;
        }

        .social-login {	
            position: absolute;
            height: 140px;
            width: 160px;
            text-align: center;
            bottom: -50px;
            right: 0px;
            color: #fff;
        }

        .social-icons {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-login__icon {
            padding: 20px 10px;
            color: #fff;
            text-decoration: none;	
            text-shadow: 0px 0px 8px #7875B5;
        }

        .social-login__icon:hover {
            transform: scale(1.5);	
        }

        .social-count__icon {
            padding: 20px 10px;
            color: #06418e;
            text-decoration: none;	
            text-shadow: 0px 0px 8px #fff;
            font-family: Raleway, sans-serif;
        }

        .social-count__icon:hover {
            transform: scale(1.2);	
        }

        .logo{
            z-index: 2;
            top: 2%;
            left: 5%;
            position: absolute;	
            height: 18%;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="screen">

           <img src="{{URL::asset('assets/img/grande_blanco.png')}}" alt="logo" class="logo">
           
            <div class="screen__content">
            <form method="POST" action="{{ route('register') }}" class="login">
                    @csrf
                    @if($lider)
                        <input  id="lider_id" type="hidden" name="lider_id" value="{{ $lider->id_lider }}" >
                        <input  id="codigo_registro" type="hidden" name="codigo_registro" value="{{ $codigo_registro }}" >
                    @endif
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input  id="name" type="text" class="login__input" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" placeholder="Nombre" autofocus>
                        @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-envelope"></i>
                        <input id="email" type="email" class="login__input" name="email" value="{{ old('email') }}" placeholder="Correo" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input  id="password" type="password" class="login__input" name="password" placeholder="Contraseña" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input  id="password-confirm" type="password" class="login__input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Registrarme</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <h3>Siguenos</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>   
    <div style="display: flex; align-items: center; justify-content: center;">
        <a href="{{ route('login') }}" class="social-count__icon fa"> <i class="fa fa-check"></i> Ya tengo cuenta, Ingresar!</a> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script>
    @if(!$lider)
        Swal.fire({
            icon: 'error',
            title: 'Oops...', 
            toast: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation: false,
            text: 'El codigo de registro, no es valido!',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonColor: "#a266cb",
            cancelButtonColor: "#1736b2",
            confirmButtonText: "Registrarme Con La Empresa",
            cancelButtonText: "Ver El Top Lideres ",
            allowFullScreen: true,
            // grow: 'fullscreen'
        }).then((result) => {
            if (result.value) {
                window.location.href = "{{ route('register') }}";
            }
        });
    @else
    Swal.fire({
            html: `
                <br><br><br>
                <img src="{{URL::asset($lider->img)}}" width="180"> 
                <br><br><br>
                <h2>Te invita {{$lider->nombres}}! <br> <br> 
                Quien ya se encuentra ganando con en el nivel de {{$lider->nombre}} <br> <br>
                Da el primer paso, registrate para iniciar a ganar.</h2>
            `, 
            toast: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation: false,
            showConfirmButton: true,
            confirmButtonColor: "#a266cb",
            confirmButtonText: "Registrarme Ya Mismo",
            allowFullScreen: true,
            grow: 'fullscreen'
        }).then((result) => {
            // if (result.value) {
            //     window.location.href = "{{ route('register') }}";
            // }
        });
    @endif
    </script>
</body>
</html>



