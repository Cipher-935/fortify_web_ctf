document.addEventListener("DOMContentLoaded", () => {
    console.log("This is login");
    const c_btns = document.querySelectorAll(".c_btn"); 
    $("#inner_u_submit").click(function(e){
          e.preventDefault();
          const m_val = document.getElementById('n_username').value;
          if(m_val.trim() != ""){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "forum_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#u_update").html(this.responseText);
                    $("#u_update").css("display", "block");
                    setTimeout(function(){
                        $("#u_update").html("");
                    $("#u_update").css("display", "none");
                    }, 2000);
                }
            }
            xhr.onerror = function(){
                alert("some error processing the request");
            }
            const data = JSON.stringify({c_name: m_val, command: "change"});
            xhr.send(data);
          }
          else{
            alert("Enter the name to change");
          }
    });

    $("#inner_e_submit").click(function(e){
        e.preventDefault();
        const e_val = document.getElementById('n_email').value;
        if(e_val.trim() != "" && e_val.includes("@gmail.com")){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "forum_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#e_update").html(this.responseText);
                    $("#e_update").css("display", "block");
                    setTimeout(function(){
                        $("e_update").html("");
                    $("#e_update").css("display", "none");
                    }, 2000);
                }
            }
            xhr.onerror = function(){
                alert("some error processing the request");
            }
            const data = JSON.stringify({c_email: e_val, command: "change"});
            xhr.send(data);
        }
        else{
            alert("Please enter a valid email");
        }
    });

    $("#inner_p_submit").click(function(e){
        e.preventDefault();
        const p_val = document.getElementById('n_pass').value;
        if(p_val.trim() != ""){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "forum_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#p_update").html(this.responseText);
                    $("#p_update").css("display", "flex");
                    setTimeout(function(){
                        $("#p_update").html("");
                    $("#p_update").css("display", "none");
                    }, 2000);
                }
            }
            xhr.onerror = function(){
                alert("some error processing the request");
            }
            const data = JSON.stringify({c_pass: p_val, command: "change"});
            xhr.send(data);
        }
        else{
            alert("Password cannnot be empty");
        }
    });
    
    $("#btn_login").click(function(e){
        e.preventDefault();
        const u_id = document.getElementById("t_id").value;
        const user_p = document.getElementById("u_pass").value;
        if(u_id.trim() != "" && user_p.trim() != ""){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "forum_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#l_mess").html(this.responseText);
                    $("#l_mess").css("display", "block");
                    setTimeout(function(){
                        $("#l_mess").html("");
                    $("#l_mess").css("display", "none");
                    }, 2000);
                }
            }
            xhr.onerror = function(){
                alert("some error processing the request");
            }
            const data = JSON.stringify({T_ID: u_id, user_pass: user_p, command: "login"});
            xhr.send(data);
        }
        else{
            alert("One of the input fields is missing");
        }
    });
   
$(".btn_send").click(function(e){
    e.preventDefault();
    const user_e = document.getElementById("e_id").value;
    const e_hidden = document.getElementById("e_hidden");
    const xhr = new XMLHttpRequest();
            xhr.open("POST", "forum_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#se_resp").html(this.responseText);
                    $("#se_resp").css("display", "block");
                    setTimeout(function(){
                        $("#se_resp").html("");
                    $("#se_resp").css("display", "none");
                    }, 2000);
                }
            }
            xhr.onerror = function(){
                alert("some error processing the request");
            }
            const data = JSON.stringify({user_email: user_e, command: "reset"});
            xhr.send(data);
});
   

$("#btn_update").click(function(e){
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "forum_controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(this.responseText == "display"){
               $(".l_container").css("opacity", "0.3");
               $(".hidden_update").css("display", "flex");
            }
            else{
               $("#l_mess").html(this.responseText);
               $("#l_mess").css("display", "block");
               setTimeout(function(){
                 $("#l_mess").html("");
                 $("#l_mess").css("display", "none");
               }, 2000);
            }
        }
    }
    xhr.onerror = function(){
       alert("Error processing the request");
    }
    const data = JSON.stringify({command: "check_login"});
    xhr.send(data);
});
 
   c_btns.forEach(btn => {
       btn.addEventListener("click", async (e) => {
           e.preventDefault();
           if(btn.textContent === "Username"){
            $(".hidden_e_form").css("display", "none");
            $(".hidden_p_form").css("display", "none");
            $(".hidden_u_form").css("display", "flex");
           }
           else if(btn.textContent === "Email"){
            $(".hidden_u_form").css("display", "none");
            $(".hidden_p_form").css("display", "none");
            $(".hidden_e_form").css("display", "flex");
           }
           else if(btn.textContent === "Password"){
            $(".hidden_u_form").css("display", "none");
            $(".hidden_e_form").css("display", "none");
            $(".hidden_p_form").css("display", "flex");
           }
       });
       });
       
    $(".btn_cancel").click(function(e){
        e.preventDefault();
        $(".l_container").css("opacity", "1");
        $(".hidden_forgot").css("display", "none");
    });

    $(".btn_abort").click(function(e){
        e.preventDefault();
        $(".l_container").css("opacity", "1");
        $(".hidden_u_form").css("display", "none");
        $(".hidden_e_form").css("display", "none");
        $(".hidden_p_form").css("display", "none");
        $(".hidden_update").css("display", "none");
    });
  
    $("#btn_forgot").click(function(e){
        e.preventDefault();
        $(".l_container").css("opacity", "0.3");
        $(".hidden_forgot").css("display", "flex");
        alert("Note, forgot password won't work from this server")
    });

   });
