<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

            <style type="text/css">
                .errorMessage{
                    color: red;
                    text-align: center;
                    display: none;
                }
               
                .noterrorMessage{
                    color: blue;
                    display: none;
                    text-align: center;
                }
                 .block{
                    display: block;
                }
            </style>
</head>
<body>
<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Sign Up
    </button>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form id="register" class="modal-content" action="login.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sign up fo free</h4>
                </div>
                <div class="modal-body">
                    <div class="form-wrapper">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-group" id="emailGroup">
                                    <span class="input-group-addon " id="sizing-addon2">@</span>
                                    <input id="email" type="email" name="login" class="form-control" placeholder="Enter your email" aria-describedby="sizing-addon2">
                                    
                                </div>
                                <div class="errorMessage">Имя уже занято</div>
                                <div class="noterrorMessage">Имя свободно</div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon " id="sizing-addon3"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></span>
                                    <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon " id="sizing-addon4"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></span>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Enter your name" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon " id="sizing-addon5"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></span>
                                    <input type="text" name="age" class="form-control" placeholder="Enter your age" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn-login" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        
        $(document).ready(function () {
            var time;
            $('input[name=login]').keyup(function(e){
                clearTimeout(time);
                var login = $(this).val();
                time = setTimeout(function(){
                    validateLogin(login);},2000);
                });


                function validateLogin(login){
                var values = $(this).serialize();


                $.ajax({
                    url: "validate.php",
                    type: "post",
                    data: {'login':login} ,
                    success: function (response) {
                        if(response != 0){
                            $('.noterrorMessage').removeClass("block");
                            $('.errorMessage').addClass("block");
                            $('#email').css({'background-color': 'rgba(255, 0, 0, 0.25)'}
                                );
                            $('#sizing-addon2').css({'background-color': 'rgba(255, 0, 0, 0.25)'}
                                );
                            $('#emailGroup').css({'border':'3px solid red','border-radius': '6px'});

                        }
                        if(response == 0){
                            $('.errorMessage').removeClass("block");
                            $('.noterrorMessage').addClass("block");
                            $('#email').css({'background-color': 'rgba(0, 128, 255, 0.13)'}
                                );
                            $('#sizing-addon2').css({'background-color': 'rgba(0, 128, 255, 0.13)'}
                                );
                            $('#emailGroup').css({'border':'3px solid blue','border-radius': '6px'});
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });

            }
        });
    </script>


</div>
</body>
</html>