document.addEventListener("DOMContentLoaded", () => {
    $("#btn_login").click(function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        const u_id = document.getElementById("e_id").value;
        const user_p = document.getElementById("u_pass").value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "event_controller.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        // Handle the response
        xhr.onload = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.responseText); // Log server response
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
