<?php
session_start();
if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==TRUE){
     header('Location: user_3.php?action='.$_SESSION['id_tel']);  
}elseif (isset ($_SESSION['zalogowany_adm']) && $_SESSION['zalogowany_adm']==TRUE) {
     header('Location: n_abonent.php');
    
} 
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Panel logowania</title>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

        
    </head>
    <body>

        <div class="container ">
            <div class="d-flex justify-content-center">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="img/logo1.png" class="brand_logo" alt="Logo">  
                        </div>
                    </div>
                        <div class="d-flex justify-content-center form_container">
                            <form method="POST" action="login.php">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>                               
                                    </div>
                                    <input type="text" name="email" class="form-control input_user" placeholder="email"  >

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="pass" class="form-control input_pass" value="" placeholder="password">
                                </div>
                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <input type="submit" name="submit" class="btn login_btn" value="Login"/>
				</div>
                            </form>
                            
                        </div>
                    
                    <div class="d-flex justify-content-center form-text">
                   <?php  if(isset($_SESSION['blad']))
                             echo $_SESSION['blad']; 
                            ?>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>


