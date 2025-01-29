document.addEventListener("DOMContentLoaded", () => {

    const xobj = new XMLHttpRequest();
 
    xobj.open('POST', 'event_controller.php', true);
    xobj.setRequestHeader("Content-Type", "application/json");

    xobj.onload = function(){
        if(xobj.readyState == 4 && xobj.status == 200){
            let j_dat = JSON.parse(xobj.responseText);
            let ul_list = document.querySelector(".m_list");
            j_dat.forEach(element => {
                if(element != ''){
		   
                    let doc = document.createElement('li');
                    doc.innerHTML =  element;
                    ul_list.appendChild(doc);
                }
            });
        }
    }
    xobj.onerror = function(){
        alert('Some error occured on the backend');
    }
    const data = JSON.stringify({command: "get_mess"});
    xobj.send(data);

});