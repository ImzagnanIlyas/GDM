<!DOCTYPE html>
<html lang="en">
<head>
	<title>Authentification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href=""/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/fontawesome-all.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
<div class="context">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('img/auth/medecin.svg') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('medecin.login') }}" aria-label="{{ __('Login') }}">
					@csrf
					<span class="login100-form-title">
						Médecin - Authentification
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Invalide">
						<input class="input100" type="text" id="inpe" name="inpe" placeholder="INPE" value="{{ old('inpe') }}" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fas fa-user-md" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if ($errors->has('inpe'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('inpe') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

					<div class="wrap-input100 validate-input" data-validate = "Invalide">
						<input class="input100" type="password" id="password" name="password" placeholder="Mot de passe" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    @if ($errors->has('password'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('password') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                        <div class="custom-control custom-checkbox small">
                            <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label class="form-check-label custom-control-label" for="remember">Se souvenir de moi</label></div>
                        </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Connexion
						</button>
					</div>

					<div class="text-center p-t-12">
						<!-- <a class="txt2" href="#">
							Mot de passe oublié ?
						</a> -->
					</div>

					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</div >

<!--===============================================================================================-->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/auth/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/auth/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/auth/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('js/auth/main.js') }}"></script>

</body>
</html>
