// MODAL ASSO
window.onload = function () {
    let buttons = document.getElementsByClassName("modalon");
    for (let i = 0; i < buttons.length; i++) {
        let btn1 = buttons[i];
        btn1.addEventListener("click", function(e){
            let id = e.target.getAttribute('data-id');     
            let modalMockup = document.getElementById("modalMockup" + id);  
            if(modalMockup.style.display === "flex") {
                modalMockup.style.display = "none";
            } else {
                modalMockup.style.display = "flex";
            }
        });
    }
};