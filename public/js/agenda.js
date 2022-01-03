      document.addEventListener('DOMContentLoaded', function() {

        let formulaire = document.querySelector("form");

        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          initialView: 'dayGridMonth',

          locale: "fr",

          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
          },

          events: "http://127.0.0.1:8000/calendrier/afficher",

          dateClick:function(info){
            formulaire.reset();

            formulaire.start.value=info.dateStr;
            formulaire.end.value=info.dateStr;

            $('#event').modal("show");

          },
          eventClick:function(info){
            var event=info.event;
            console.log(event);

            axios.post("http://127.0.0.1:8000/calendrier/modifier/"+info.event.id).
            then(
              (reponse) => {

                formulaire.id.value=reponse.data.id;

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
          const date = new FormData(formulaire);

          console.log(date);
          console.log(formulaire.title.value);

          axios.post("http://127.0.0.1:8000/calendrier/ajouter", date).
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

        });

      });
