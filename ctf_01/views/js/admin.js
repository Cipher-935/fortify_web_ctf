document.addEventListener("DOMContentLoaded", () => {
    const log_btn = document.querySelector('.view_logs');

    log_btn.addEventListener('click', (e) => {
        e.preventDefault();
        const xobj = new XMLHttpRequest();
     
        xobj.open('POST', 'event_controller.php', true);
        xobj.setRequestHeader("Content-Type", "application/json");
    
        xobj.onload = function(){
            if(xobj.readyState == 4 && xobj.status == 200){
                console.log(xobj.responseText);
            }
        }
        xobj.onerror = function(){
            alert('Some error occured on the backend');
        }
        const data = JSON.stringify({f_name: "logs.txt", command: "view"});
        xobj.send(data);
    });

    const overviewElement = document.getElementById("overview");
    const alertsList = document.getElementById("alerts-list");

    function generateRandomIP() {
        return `${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}.${Math.floor(Math.random() * 256)}`;
    }

    function generateThreatLevel() {
        const levels = ["Low", "Medium", "High", "Critical"];
        return levels[Math.floor(Math.random() * levels.length)];
    }

    function generateRandomAlert() {
        const alerts = [
            "DDoS attack launched",
            "Unauthorized access gained",
            "New message recieved in chat room",
            "Botnets deployed",
            "Botnet activity increased",
        ];
        return alerts[Math.floor(Math.random() * alerts.length)];
    }

    function updateOverview() {
        overviewElement.innerHTML = `
            <strong>Active Bots:</strong> ${Math.floor(Math.random() * 5000 + 1)}<br>
            <strong>Botnet Leader:</strong> ${generateRandomIP()}<br>
            <strong>Threat Level:</strong> ${generateThreatLevel()}
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