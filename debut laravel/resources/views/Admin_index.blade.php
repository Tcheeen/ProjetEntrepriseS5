
<html>
    <head>
        <title>Connexion administrateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo asset('assets/Login/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/Login/fonts/fontawesome-all.min.css')?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="<?php echo asset('assets/Login/css/Ludens-Users---2-Register.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/Login/css/styles.css')?>">
    </head>
<body>

<section class="register-photo" style="background-color: transparent;">
        <div class="form-container">
            <div class="image-holder" style="background: url(&quot;<?php echo asset('assets/Login/img/RH.jpg');?>&quot;);"></div>
            <form action="{{url('/log_admin')}}" method="POST" style="height: 525px;">
            {{ csrf_field() }}
                <h2 class="text-center" style="margin-top: 25%;"><strong>Bienvenue</strong></h2>
                <div class="form-group mb-3"><input class="form-control" type="email" name="mail" required placeholder="Email"></div><script>
    // Submit button made with javascript
    function changePassword() {
        var password = document.querySelector("#password").value;
        var confirmPassword = document.querySelector("#confirmPassword").value;

        if(password.length >= 8) {
            if(password === confirmPassword)
            {
                var btn = $('#submitButton').removeAttr("disabled");
                document.querySelector('#passwordsError').style.display = 'none';
                console.log("enabling")
            }
            else {
                var btn = $('#submitButton').attr("disabled", "true");
                document.querySelector('#passwordsError').style.display = 'block';
                document.querySelector('#errorMessage').innerHTML = 'The passwords do not match';
                console.log("disabling")
            }
        }
        else {
            var btn = $('#submitButton').attr("disabled", "true");
            document.querySelector('#passwordsError').style.display = 'block';
            document.querySelector('#errorMessage').innerHTML = 'The password must be at least 8 characters long';
            console.log("disabling")
        }
    }
</script>
                <div class="form-group mb-3"><input class="form-control" type="password" id="password" name="mdp" placeholder="Mot de passe" onchange="changePassword()"></div>

                <div id="passwordsError" style="display: none;margin-bottom: 16.5px;"><span id="errorMessage" class="text-danger" style="font-size:13px;"></span></div>
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" id="submitButton" type="submit" style="color: rgb(255,255,255);background: var(--bs-gray);font-weight: bold;">SE CONNECTER</button></div>
                @IF (isset($erreur))
                <div class="alert alert-success flash animated" role="alert" style="background: rgb(255,255,255);text-align: center;border-style:none;"><span style="color: var(--bs-red);"><i class="fas fa-exclamation"></i><strong>&nbsp;</strong>{{$erreur}}</span></div>
                @ENDIF
            </form>
        </div>
    </section>
    <script src="<?php echo asset('assets/Login/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/Login/js/bs-init.js');?>"></script>

</body>
</html>
