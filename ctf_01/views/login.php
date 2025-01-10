<?php require("../views/headers/header_login.php"); ?>

<div class="l_container">
      <h2>LOGIN</h2>
      <form class = "l_form">
        <label for="tt_id">Email-ID</label>
        <input type="text" id="t_id" required name = "E_ID">
          
        <label for="password">Password:</label>
        <input type="password" id="u_pass" required name = "user_pass">

        <input type = "hidden" value = "login" name = "command">

        <button id = "btn_login" type = "submit">Log in</button>
        <p id = "l_mess" style = 'text-align:center;'></p>
      </form>
      <div class = "btn_options">
        <button id = "btn_forgot">Forgot password</button>
        <button id = "btn_update">Update</button>
      </div>
      <div class="other_options">
          <h3>Haven't registered?</h3>
          <h3><a href = "event_controller.php?val=signup" class = "redirect_signup">Register</a></h3>          
      </div>
      
</div>

<div class = "hidden_forgot">
           <label>Enter the T-ID to get the reccovery link</label>
           <input  id = "e_id">
           <div class = 'm_buttons'>
           <button class = "btn_send">Send</button>
           <button class = "btn_cancel">Cancel</button>
           </div>
           <p id = 'se_resp' style = 'text-align: center; display:none;'></p>
           <div class = "e_hidden">
               <label>Enter the code</label>
               <input id = "e_code">
               <button id = "btn_check">Check</button>
           </div>
</div>

<div class = "hidden_update">
           <h4 style = "text-align:center">Choose what to update</h4>
           <div class = 'l_buttons'>
           <button class = "c_btn" >Username</button>
           <button class = "c_btn" >Email</button>
           <button class = "c_btn" >Password</button>
           <button class = "btn_abort">Cancel</button>
           </div>

           <div class = "hidden_u_form" >
            <label>Enter New Username</label>
            <input type = "text" required id = "n_username">
            <button id = "inner_u_submit">Change</button>
            <p id = "u_update" style = 'text-align:center;display:none'></p>
           </div>

           <div class = "hidden_e_form">
            <label>Enter New Email</label>
            <input  id = "n_email">
            <button id = "inner_e_submit">Change</button>
            <p id = 'e_update' style = 'text-align:center;display:none'></p>
           </div>

           <div class = "hidden_p_form">
            <label>Enter New Password</label>
            <input  id = "n_pass" type = 'password'>
            <button id = "inner_p_submit">Change</button>
            <p id = 'p_update' style = 'text-align:center;display:none'></p>
           </div>

           <div class = "hidden_pic_form" enctype="multipart/form-data">
            <label>Upload new picture</label>
            <input  name = "c_pic" id = "n_pass">
            <button id = "inner_p_submit">Change</button>
            <p id = 'pic_update' style = 'text-align:center;display:none'></p>
           </div>

</div>

<form id = "logout_form" action = "forum_controller.php" method = "post" style = 'display:none;'>
    <input type = "hidden" value = "logout" name = "command">
</form>

<?php require("../views/footer.php"); ?>