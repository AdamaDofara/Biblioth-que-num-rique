<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rénitialiser mot de passe</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="frontend/login/vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.12.10/dist/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="fontend/login/fonts/iconic/css/material-design-iconic-font.min.css">
</head>
<body>
 <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="card-body">
                <div class="col"></div>
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Mot de passe oublié ??</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form" id="email_check" method="POST" action="{{URL::to('/verifier_email')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputPasswordOld">Votre adresse email</label>
                                    <input type="email" class="form-control" id="email" required="" name="email">
                                    <li class="badge bg-danger mt-2" id="error"></li>
                                    <button class="form-control btn btn-primary mt-4">Vérifier</button>
                                </div>
                            </form>
                            <form class="form" role="form" autocomplete="off" id="password_reset" action="{{URL::to('/modifier_password')}}" method="POST">
                                <div class="form-group">
                                    <!-- @if (count($errors)>0)
                                        <ul class="alert alert-danger">
                                             @foreach ($errors->all() as $error)
                                                 <li>{{$error}}</li>
                                             @endforeach
                                         </ul>
                                    @endif -->
                                     <p class="alert alert-success" id="success"></p>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputPasswordNew">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="password"  name="password">
                                    <input type="hidden" id="id" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Confirmer mot de passe</label>
                                    <input type="password" class="form-control" id="password_verify"  name="password_verify">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card change password -->

                </div>
                <div class="col"></div>
            </div>
            <!--/row-->

        <br><br><br><br>

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    
</div>
<!--/container-->
<script>
    $(document).ready(function(){
        $("#password_reset").hide();
        $("#error").hide();
        var frm = $("#email_check");
        var fr = $("#password_reset");
        frm.submit(function(e){
            e.preventDefault();
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    $("#id").val(data["id"]);
                    frm.hide();
                    fr.show();
                    $("#success").text("Procéder maintenant à la modification de votre mot de passe.")
                },
                error: function (data) {
                    $("#error").show();
                    $("#error").text("Ce email n'est associé à aucun compte...");
            },
        });
  });


    fr.validate({
        rules: {
            password:{required: true,},
            password_verify:{
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password:{
                required:"Champ obligatoire",
            },
            password_verify: {
                required:"Champ obligatoire",
                equalTo:"Mot de passes non identiques!!!",
            }
        },

        errorPlacement: function(error, element) {
            error.insertAfter(element);
            error.addClass("text-danger");
            element.addClass("text-danger");
        },

        submitHandler: function(form){
            $.ajax({
                type: form.method,
                url: form.action,
                data: $(form).serialize(),
                success: function (data) {
                    frm.hide();
                    fr.hide();
                    console.log("password updated");
                    console.log($("#id"));
                    $("card-body").hide();
                            Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Mot de passe modifié avec succès, vous serez redirigé sur la page de connexion.',
                              showConfirmButton: false,
                              timer: 2000
                            })
                            location.href = '/authentification';
                },
                error: function (data) {
                    console.log(error);
            },
        });
        },
    })
  //   fr.submit(function(e){
  //           e.preventDefault();
  //           $.ajax({
  //               type: fr.attr('method'),
  //               url: fr.attr('action'),
  //               data: fr.serialize(),
  //               success: function (data) {
  //                   frm.hide();
  //                   fr.hide();
  //                   console.log("password updated");
  //                   console.log($("#id"));
  //                   $("card-body").hide();
  //                           Swal.fire({
  //                             position: 'center',
  //                             icon: 'success',
  //                             title: 'Mot de passe modifié avec succès, vous serez redirigé sur la page de connexion.',
  //                             showConfirmButton: false,
  //                             timer: 1700
  //                           })
  //                           location.href = '/authentification';
  //               },
  //               error: function (data) {
  //                   console.log(error);
  //           },
  //       });
  // });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html> 