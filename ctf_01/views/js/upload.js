document.addEventListener("DOMContentLoaded", () => {
    btn_sned = document.getElementById('send_btn');
    btn_sned.click(function (e) {
        e.preventDefault(); // Prevent default form submission behavior
        const f_in = document.getElementById("fileSub");
        if (f_in.files.length === 0) {
            alert("Please select a file before submitting.");
            return;
        }
        const file = f_in.files[0]; // Access the first file (if multiple files are allowed)
        const formData = new FormData();
        formData.append("file", file); // Add the file to the FormData object

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "event_controller.php?val=upload", true);

        // Handle the response
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(this.responseText); // Log server response
            } else {
                alert(`Upload failed. Status: ${xhr.status}`);
            }
        };
        // Handle errors
        xhr.onerror = function () {
            alert("Some error occurred while processing the request.");
        };

        // Send the data
        xhr.send(formData);
    });
});
