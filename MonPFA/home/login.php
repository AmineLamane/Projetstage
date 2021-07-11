<?php
session_start();


if(isset($_SESSION["professeur_mail"])){
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    
    <title>Login</title>
    
</head>
<body>
<?php require "include/nav.php"; ?>
<div class="container">


  <div class="form-group">
  <form action="include/loginM.php" method="post" id="sign_in_form">
    <label for="Email">Email</label>
    <input type="text" class="form-control" name="email"  id="email"  placeholder="Entrer votre email">
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="password">
  </div>

  

    

   


  <button type="submit" class="btn btn-primary" name="submit"  id="submit" >Entrer</button>
  </form>

</div>



 
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>

$(document).ready(function(){
    $('.infos').css('display','none');
    $('#submit').on('click',function(){
       
        var email = $('#email').val();
        var password = $('#password').val(); 
        
        
        
        
  if (password=='' || email== ''){
     alert("Il y'a un champ vide !!");    
  }
  else{
    $.ajax({
        url:'include/loginM.php',
        method:'post',
        data:{email:email,password:password},
        success:function(data)
        {
            $('.infos').css('display','block');
            if (data == "<b style='color:green;'>OK</b>")
            {
                
                $('.infos').html(data);
                
                    setTimeout("window.location.href='professeur/profile.php'",2000);
                
                
            }
            else
            {
                $('.infos').html(data);
            }
          

        }

      });
    }
    
    });

   
    
});



</script> -->
    
</body>
</html>