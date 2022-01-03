      document.addEventListener('DOMContentLoaded', function() {

        let formulaire = document.querySelector("#formulaireEvent");

        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          initialView: 'dayGridMonth',

          locale: "fr",
          displayEventTime:false,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
          },

        //  events: baseURL + "/calendrier/afficher",
        eventSources: {
          url: baseURL + "/calendrier/afficher",
          method:"POST",
          extraParams: {
            _token: formulaire._token.value,
          }
        },

          dateClick:function(info){
            formulaire.reset();

            formulaire.start.value=info.dateStr;
            formulaire.end.value=info.dateStr;

            $('#event').modal("show");

          },
          eventClick:function(info){
            var event=info.event;
            console.log(event);

            axios.post(baseURL + "/calendrier/modifier/"+info.event.id).
            then(
              (reponse) => {

                formulaire.id.value=reponse.data.id;
                formulaire.title.value=reponse.data.title;

                formulaire.description.value=reponse.data.description;

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

        document.getElementById("btnSauvegarder").addEventListener("click", function(){
          envoyerDate("/calendrier/ajouter");

        });

        document.getElementById("btnSupprimer").addEventListener("click", function(){
          envoyerDate("/calendrier/supprimer/"+formulaire.id.value);
        });

        document.getElementById("btnModifier").addEventListener("click", function(){
          envoyerDate("/calendrier/actualiser/"+formulaire.id.value);
        });

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
