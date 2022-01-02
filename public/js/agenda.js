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

          dateClick:function(info){
            $('#event').modal("show");

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