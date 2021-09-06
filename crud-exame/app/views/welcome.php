<?php
use app\controllers\BaseController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$data['title']?></title>

    <?=BaseController::link_css('bootstrap.min')?>

</head>
<body>
    
    <div class="container">

        <br><br><br><br><br>
        <a href="http://localhost/crud-exame/home/user/1">link</a>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="post">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                      <label for="passwordc">Confirm Password</label>
                      <input type="password" name="passwordc" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar-se</button>
                    
                </form>
            </div>
        </div>
        
    </div>

    <?=BaseController::link_js('jquery')?>
    <?=BaseController::link_js('bootstrap.min')?>
</body>
</html>