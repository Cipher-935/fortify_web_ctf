<?php require("../views/headers/header_signup.php"); ?>

<div class= "s_container">

<h2>Signup</h2>
<form class = "s_form" enctype="multipart/form-data">
  <label for='fullname'>Username:</label>
  <input  id='username'>
  
  <label for='email'>Email:</label>
  <input  id='email' >

  <label for='password'>Password:</label>
  <input id='password' type = 'password'>
  
  <label for='password'>Profile Picture (cropped):</label>
  <input type = "file"  id = 'picture' >

  <p id = "r_mess" style = 'text-align:center;display:none;'></p>
  
  <div class = "in_options">
  <button  id='btn_sign'>Register</button>
  <button id='btn_unregister'>Unregister</button>  
  </div>

  <div class = "options">
     <h3>Already registered? </h3>
     <h3><a href = "event_controller.php?val=login" class = "redirect_login">Log in</a></h3>
  </div>
</form>

</div>

<form  class = 'hidden_unregister'>
    <label>Enter your T-ID</label>
    <input type = "text" id = "u_id">
    <label>Enter your password</label>
    <input type = "password" id = "u_pass">
    <label>Enter your registered email</label>
    <input type = "email" id = "u_email">
 
    <div class = "inner_options">
    <button id = "inner_submit">Proceed</button>
    <button id = "btn_cancel">Abort</button> 
  </div>
  <p id= 'sh_resp' style = 'text-align:center; display:none;'></p>
</form>

<form id = "logout_form" action = "forum_controller.php" method = "post" style = 'display:none'>
    <input type = "hidden" value = "logout" name = "command">
</form>
<?php require("../views/footer.php"); ?>



