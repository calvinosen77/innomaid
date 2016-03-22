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
            <!-- Form -->
            <form action="{{ URL::route('user.user.dosignup') }}" method="post" onsubmit="myButton.disabled = true; return true;">
                <!-- Header -->
                <h3 class="white-text">
                    Registration
                </h3>

                <!--Show Alert -->
                <div class="row">
                    @if(isset($msg_duplication))
                        @if($msg_duplication != '')
                            <button class="btn waves-effect waves center darken-2" style="background-color: #EBCCD1; color: #A9445F; font-size: 8pt; font-weight: bold; border-radius: 10px;">
                                {{ $msg_duplication }}
                                <i class="material-icons left">info_outline</i>
                            </button>
                        @endif
                    @endif
                </div>
                <!--Company Name -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text">business</i>
                    <input style="width:80%" name="company_name" id="company_name" type="text" class="validate white-text epad" required>
                    <label for="company_name" class="white-text">Company Name</label>
                </div>
                <!--License No -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text">vpn_key</i>
                    <input style="width:80%" name="company_no" id="company_no" type="text" class="validate white-text epad">
                    <label for="company_no" class="white-text">License NO</label>
                </div>
                <!--Address -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text">assignment</i>
                    <input style="width:80%" name="address" id="address" type="text" class="validate white-text epad">
                    <label for="address" class="white-text">Address</label>
                </div>
                <!--Phone Number -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text">dialer_sip</i>
                    <input style="width:80%" name="phone_number" id="phone_number" type="tel" class="validate white-text epad">
                    <label for="phone_number" class="white-text">Tel:</label>
                </div>
                <!-- Email -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text active">email</i>
                    <input style="width:80%" name="email" id="email" type="email" class="validate white-text valid"  required>
                    <label for="username" class="white-text active">Email</label>
                </div>
                <!-- Password -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text active">lock_outline</i>
                    <input style="width:80%" title="Password must contain at least 6 characters, with one or more digits." type="password" name="password" id="password" class="validate white-text valid" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); if(this.checkValidity()) form.password_confirm.pattern = this.value; ">
                    <label for="password" class="white-text active">Password</label>
                </div>
                <!-- Confirm Password -->
                <div class="input-field col s6">
                    <i class="material-icons prefix white-text active">lock_open</i>
                    <input style="width:80%" title="Please enter the same password as above" type="password" name="password_confirm" id="password_confirm" class="validate white-text valid" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); ">
                    <label for="password_confirm" class="white-text active">Confirm Password</label>
                </div>
                <!-- Submit -->
                <div class="row">
                    <div class="input-field col-md-5">
                        <a href="{{ URL::route('user.user.index') }}" class="btn waves-effect waves green left darken-2">Back
                            <i class="material-icons white-text left">input</i>
                        </a>
                    </div>
                    <div class="input-field col-md-5">
                        <button class="btn waves-effect waves blue right darken-2" type="submit" name="submit">SignUp
                            <i class="material-icons white-text left">done</i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>

    <div class="push"></div>

    <!--  Scripts-->
    {{ HTML::script('/assets/frontend/js/jquery-2.1.1.min.js') }}
    {{ HTML::script('/assets/frontend/js/materialize.js') }}
    {{ HTML::script('/assets/frontend/js/init.js') }}

</body>
</html>