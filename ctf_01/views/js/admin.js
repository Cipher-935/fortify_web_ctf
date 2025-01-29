document.addEventListener("DOMContentLoaded", () => {
    
    const overviewElement = document.getElementById("overview");
    const alertsList = document.getElementById("alerts-list");

    const btn_brod = document.getElementById("btn_broad");

    btn_brod.addEventListener('click', function(e){
        e.preventDefault(); 

        const a_msg = document.getElementById("txt_mess").value;
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
        const data = JSON.stringify({ msg: a_msg, command: "broadcast" });
        xhr.send(data); // Send the data
    });

    function generateRandomIP() {
        return `${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}`;
    }

    function generateThreatLevel() {
        const levels = ["Canada", "Russia", "India", "America"];
        return levels[Math.floor(Math.random() * levels.length)];
    }

    function generateRandomAlert() {
        const alerts = [
            `Attacking ${Math.floor(Math.random() * 20 + 1)}.${Math.floor(Math.random() * 40 + 1)}.${Math.floor(Math.random() * 60 + 1)}.${Math.floor(Math.random() * 80 + 1)}`,
            "New Infection!",
	    "FTW{p0weR}",
	    `Received $${Math.floor(Math.random() * 150 + 1)}`
              ];
        return alerts[Math.floor(Math.random() * alerts.length)];
    }

    function updateOverview() {
        overviewElement.innerHTML = `
            <strong>Active Bots:</strong> ${Math.floor(Math.random() * 5000 + 1)}<br>
            <strong>Fast Flux IP:</strong> ${generateRandomIP()}<br>
            <strong>Infected Regions:</strong> ${generateThreatLevel()}
            <strong>Operation: Ransomware</strong>
        `;
    }

    function updateAlerts() {
        const alertItem = document.createElement("li");
        alertItem.textContent = generateRandomAlert();
        alertsList.appendChild(alertItem);

        // Removing older alerts to keep the list manageable (to give it that nice "scroll" effect idk man, I'm tired)
        if (alertsList.children.length > 6) {
            alertsList.removeChild(alertsList.firstChild);
        }
    }

    function startRandomUpdates() {
        function scheduleUpdate() {
            updateOverview();
            updateAlerts();
            const nextUpdate = Math.random() * 4000 + 1000;
            setTimeout(scheduleUpdate, nextUpdate);
        }
        scheduleUpdate();
    }
    startRandomUpdates();
});