document.addEventListener("DOMContentLoaded", () => {
    const check_register = function(u,e,p,i_val,p_val){
        if(u.trim() != "" && e.trim() != "" && p.trim() != "" && i_val.trim() != ""){
            let mail = false;
            let file = false;
            if(e.includes("@gmail.com") || e.includes("@yahoo.com") || e.includes("@outlook.com") || e.includes("@hotmail.com")){
                 mail = true;
            }
            else{
                alert("Please enter a valid email (gmail, yahoo, hotmail, outlook)");
                mail = false;
            }
            if(p_val.files.length > 0){
                let fileName = p_val.files[0].name;
                let ext = fileName.split(".").pop().toLowerCase();
                if(ext == "png" || ext == "jpg"){
                    file = true;
                }
                else{
                    alert("Only png or jpg files allowed");
                    file = false;
                }
            }
            else{
                alert("Profile picture is required");
                file = false;
            }
            if(mail && file){
                return true;
            }
            else{
               return false;
            }
        }
        else{
            alert('One of the input fields is missing');
            return false;
        }
    }

    $("#btn_sign").click(async function(e){
        e.preventDefault();
        const user = document.getElementById('username').value;
        const u_email = document.getElementById('email').value;
        const pass = document.getElementById('password').value;
        const id = document.getElementById('student_id').value;
        const profile_pic = document.getElementById('picture');
        const d_pan = document.getElementById("r_mess");
        const r_val = check_register(user, u_email, pass, id, profile_pic);
        if(r_val){
            const q_obj = new FormData();
            q_obj.append("username", user);
            q_obj.append("email", u_email);
            q_obj.append("password", pass);
            q_obj.append("student_id", id);
            q_obj.append("pic", profile_pic.files[0]);
            q_obj.append("command", "signup");
            const q_send = await fetch("forum_controller.php", {method: "POST", body: q_obj});
            if(q_send.status === 200){
                const s_resp = await q_send.text();
                d_pan.textContent = s_resp;
                d_pan.style.display = "block";
                setTimeout(function(){d_pan.textContent = "";d_pan.style.display = "none";}, 3000);
            }
        }
    });
    
    $("#btn_unregister").click(function(e){
         e.preventDefault();
         $(".s_container").css("opacity", "0.3");        
         $(".hidden_unregister").css("display", "flex");
    });
 
    $("#btn_cancel").click(function(e){
        e.preventDefault();
        $(".s_container").css("opacity", "1");
        $(".hidden_unregister").css("display", "none");
    });
    
    $("#inner_submit").click(function(e){
        e.preventDefault();
        const user_id = document.getElementById("u_id").value;
        const user_pass = document.getElementById("u_pass").value;
        const user_email = document.getElementById("u_email").value;
        if(user_id.trim() != "" && user_pass.trim() != "" && user_email.trim() != "" && user_email.includes("@gmail.com")){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "event_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    $("#sh_resp").html(this.responseText);
                    $("#sh_resp").css("display", "block");
                    setTimeout(function(){$("#sh_resp").html(""); $("#sh_resp").css("display", "none");}, 3000);
                }
            }
            xhr.onerror = function(){
                alert("Could not proceed your request");
            }
            const data = JSON.stringify( {u_id: user_id, u_pass: user_pass, u_email: user_email, command: "unregister"});
            xhr.send(data);
        }
        else{
            alert("Input is missing or is not in the right format");
        }
    });
});