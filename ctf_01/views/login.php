<?php require("../views/headers/header_login.php"); ?>

<p style='color:green'>FTW{getting_close_i_C}</p>
<div class="l_container">
      <h2>LOGIN</h2>
      <form class = "l_form">
        <label for="tt_id">Email-ID</label>
        <input type="text" id="e_id" required name = "E_ID">
          
        <label for="password">Password:</label>
        <input type="password" id="u_pass" required name = "user_pass">

        <button id = "btn_login" type = "submit">Log in</button>
      </form>
</div>