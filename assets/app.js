import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


window.onload = function () {
    let buttons = document.getElementsByClassName("modalon");
    for (let i = 0; i < buttons.length; i++) {
        let btn1 = buttons[i];
        btn1.addEventListener("click", function(e){
            let id = e.target.getAttribute('data-id');     
            let modalMockup = document.getElementById("modalMockup" + id);
            console.log(modalMockup);
            
            if(modalMockup.style.display === "flex") {
                modalMockup.style.display = "none";
            } else {
                modalMockup.style.display = "flex";
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    if (calendar !== undefined) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    }
  });