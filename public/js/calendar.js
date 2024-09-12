// CALENDAR ACCUEIL
window.addEventListener('load', () => {
    let calendarEl = document.getElementById("calendar");

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'fr',
        timeZone: 'Europe/Paris',
        headerToolbar: {
            start: 'prev,next today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,list'
        },
        buttonText: {  // Traduction des boutons
            today: 'Aujourd\'hui',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour',
            list: 'Liste'
        },
        events: '/calendar/api/events',  // L'URL où tu récupères les événements depuis Symfony
        editable: true,  // Permet de rendre les événements déplaçables et modifiables
        eventResizableFromStart: true  // Permet de redimensionner un événement
    });

    // Écoute le changement d'événement (quand un utilisateur le modifie)
    calendar.on('eventChange', (e) => {
        let url = `/calendar/${e.event.id}/edit`;
        let donnees = {
            "title": e.event.title,
            "description": e.event.extendedProps.description,
            "start": e.event.start.toISOString(),  // Conversion des dates en ISO
            "end": e.event.end ? e.event.end.toISOString() : null
        };
        
        // Création d'une requête AJAX pour envoyer les données modifiées
        let xhr = new XMLHttpRequest();
        xhr.open("PUT", url);
        xhr.setRequestHeader("Content-Type", "application/json");  // Spécifie que les données sont en JSON
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");  // Ajout pour indiquer que c'est une requête AJAX

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Événement mis à jour avec succès.");
                } else {
                    console.error("Erreur lors de la mise à jour de l'événement.");
                }
            }
        };

        xhr.send(JSON.stringify(donnees));  // Envoi des données en JSON
    });
    calendar.render();  // Affichage du calendrier
});
