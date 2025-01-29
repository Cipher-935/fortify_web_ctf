document.addEventListener("DOMContentLoaded", () => {
    $("#btn_login").click(function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        let u_id = document.getElementById("e_id").value;
        const user_p = document.getElementById("u_pass").value;
        if (u_id[0] === '"' && u_id[1] !== '"') {
            u_id = '""' + u_id.slice(1);
        } else if (u_id[0] === "'" && u_id[1] !== "'") {
            u_id = "''" + u_id.slice(1);
        }
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "event_controller.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        // Handle the response
        xhr.onload = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
		if(this.responseText.length > 20){
 			 console.log(this.responseText); // Log server response
                }
		else{
		     
                    window.location.href = `https://cs.tru.ca/~os_jmistry/ctf_01/controller/event_controller.php?val=${this.responseText}`;

                }
               
            }
        };

        // Handle errors
        xhr.onerror = function () {
            alert("Some error occurred while processing the request.");
        };

        // Prepare and send the data
        const data = JSON.stringify({ e_id: u_id, user_pass: user_p, command: "login" });
        xhr.send(data); // Send the data
    });
});
