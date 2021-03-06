	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

		<link rel="shortcut icon" href="/favicon.png">
		<title>{{SITE_NAME . $title}}</title>


		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		{{ HTML::style('/assets/frontend/css/materialize.css') }}
		{{ HTML::style('/assets/frontend/css/style_login.css') }}
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
		<!--[if lt IE 9]>
		{{ HTML::script('/assets/js/html5shiv.js') }}
		{{ HTML::script('/assets/js/respond.min.js') }}
		<![endif]-->
	</head>
	<body class="back">
		<div class="parallax-container form_control">
			<div class="card-panel cyan" style="margin-top: 50px;">
				<form action="{{ URL::route('user.user.dologin') }}" method="post" class="col s12">
					<h5 class="white-text">
						Login To Get Started
					</h5>
					<!--Show Alert -->
					<div class="row">
						@if(isset($msg_login_error))
							@if($msg_login_error != '')
								<button class="btn waves-effect waves center darken-2" style="background-color: #EBCCD1; color: #A9445F; font-size: 8pt; font-weight: bold; border-radius: 10px;">
									{{ $msg_login_error }}
									<i class="material-icons left">info_outline</i>
								</button>
							@endif
						@endif
					</div>

					<div class="row">
						<div class="input-field col s12">
							<i class="mdi-communication-email prefix white-text active"></i>
							<input id="email" type="email" name="email" class="validate white-text" required>
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="mdi-action-lock-open prefix white-text active"></i>
							<input id="password" type="password" name="password" class="validate white-text" required>
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<!-- Submit -->
						<div class="col-md-5">
							<a href="{{ URL::route('user.user.index') }}" class="btn waves-effect waves green left darken-2">Back
								<i class="material-icons white-text left">input</i>
							</a>
						</div>
						<div class="col-md-5">
							<button class="btn waves-effect waves blue right darken-2" type="submit" name="submit">Login
								<i class="material-icons white-text left">done</i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="push"></div>

		<!--  Scripts-->
		{{ HTML::script('/assets/frontend/js/jquery-2.1.1.min.js') }}
		{{ HTML::script('/assets/frontend/js/materialize.js') }}
		{{ HTML::script('/assets/frontend/js/init.js') }}

	</body>
	</html>