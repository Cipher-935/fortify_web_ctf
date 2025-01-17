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
    })
});