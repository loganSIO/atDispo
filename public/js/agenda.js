      document.addEventListener('DOMContentLoaded', function() {

        let formulaire = document.querySelector("#formulaireEvent");

        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          // Options du calendrier

          initialView: 'timeGridWeek',
          weekends:true,
          locale: "fr",
          displayEventTime:true,
          allDaySlot: true,
          nowIndicator: true,
          timeZone: 'Europe/Paris',

          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,dayGridMonth,listWeek',
          },

        //  events: baseURL + "/calendrier/afficher",
        eventSources: {
          url: baseURL + "/calendrier/afficher",
          method:"POST",
          extraParams: {
            _token: formulaire._token.value,
          }
        },

        // Création des évènements jours fériés

        events: [

          {
            title: 'Week-end',
            daysOfWeek: [0, 6],
            color: 'grey',
            allDay: false,
            startTime: '00:00',
            endTime:'23:59',
          },

          {
            title  : 'Jour de l\'an',
            start  : '2022-01-01',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Lundi de Pâques',
            start  : '2022-04-18',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Fête du travail',
            start  : '2022-05-01',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : '8 mai 1945',
            start  : '2022-05-08',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Jeudi de l’Ascension',
            start  : '2022-05-26',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Lundi de Pentecôte',
            start  : '2022-06-06',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Fête nationale',
            start  : '2022-07-14',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Assomption',
            start  : '2022-08-15',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'La Toussaints',
            start  : '2022-11-01',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Armistice',
            start  : '2022-11-11',
            allDay : true,
            color  : 'orange'
          },

          {
            title  : 'Noël',
            start  : '2022-12-25',
            allDay : true,
            color  : 'orange'
          },

        ],

        // Apparition du modal (présent dans la vue calendrier) lorsqu'on clique sur une case du calendrier

          dateClick:function(info){
            formulaire.reset();

            formulaire.start.value=info.dateStr;
            formulaire.end.value=info.dateStr;

            $('#event').modal("show");

          },

          // Modification d'un évènement dans le calendrier

          eventClick:function(info){
            var event=info.event;
            console.log(event);

            axios.post(baseURL + "/calendrier/modifier/"+info.event.id).
            then(
              (reponse) => {

                formulaire.id.value=reponse.data.id;
                formulaire.title.value=reponse.data.title;

                formulaire.description.value=reponse.data.description;
                formulaire.statutCreneau.value=reponse.data.statutCreneau;
                formulaire.color.value=reponse.data.color;

                formulaire.start.value=reponse.data.start;
                formulaire.end.value=reponse.data.end;


                $("#event").modal("show");
              }
            ).catch(
              error=>{
                if(error.response){
                  console.log(error.response.data);
                }
              }

            )
          }

        });

        calendar.render();

        /* Intéractions base de donner */

        document.getElementById("btnSauvegarder").addEventListener("click", function(){
          envoyerDate("/calendrier/ajouter");
        });

        document.getElementById("btnSupprimer").addEventListener("click", function(){
          envoyerDate("/calendrier/supprimer/"+formulaire.id.value);
        });

        document.getElementById("btnModifier").addEventListener("click", function(){
          envoyerDate("/calendrier/actualiser/"+formulaire.id.value);
        });

        // Actualisation des évènements en temps réel

        function envoyerDate(url){

          const date = new FormData(formulaire);

          const newURL = baseURL+url;

          axios.post(newURL, date).
          then(
            (reponse) => {
              calendar.refetchEvents();
              $("#event").modal("hide");
            }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }

          )
        }

      });
