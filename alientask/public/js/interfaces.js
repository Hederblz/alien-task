$(document).ready(function() {
    $("#close").click(function() {
        $("#msg").slideUp();
    });

    $("#trigger").click(function(){
        $("#etiqueta-create").slideToggle();
    })

    $("#close-etiqueta-create").click(function(){
        $("#etiqueta-create").slideUp()
    });

    $("#closealert").click(function(){
        $(".alert").slideUp();
    });

    //Markdown controller

    //Welcome slides cotroller;
   var imgOne = '/img/icons/taken-animate.svg';
   var imgTwo = '/img/icons/calendar-animate.svg';
   var imgThree = '/img/icons/alien-scientist-animate.svg';
   var clicksNext = 1;


   $("#next").click(function(){
    if(clicksNext == 1)
    {
        $("#carouselimage").attr('src', imgOne);
        $("#slidetitle").text('Saia do mundo da procrastinação');
        $("#slidephrase").text('É hora de organizar sua vida');
        clicksNext++;
    }
    else if(clicksNext == 2)
    {
        $("#carouselimage").attr('src', imgTwo);
        $("#slidetitle").text('Cumpra seus prazos com folga');
        $("#slidephrase").text('Aumente sua produtividade');
        clicksNext++;

    }
    else if(clicksNext == 3)
    {
        $("#carouselimage").attr('src', imgThree);
        $("#slidetitle").text('Salve seus amigos da desorganização');
        $("#slidephrase").text('Compartilhe o Alien Task com eles');
        clicksNext = 1;
    }
   });

   $("#prev").click(function(){
    if(clicksNext == 3)
    {
        $("#carouselimage").attr('src', imgThree);
        $("#slidetitle").text('Salve seus amigos da desorganização');
        $("#slidephrase").text('Compartilhe o Alien Task com eles');
        clicksNext--;
    }
    else if(clicksNext == 2)
    {
        $("#carouselimage").attr('src', imgTwo);
        $("#slidetitle").text('Cumpra seus prazos com folga');
        $("#slidephrase").text('Aumente sua produtividade');
        clicksNext--;

    }
    else if(clicksNext == 1)
    {
        $("#carouselimage").attr('src', imgOne);
        $("#slidetitle").text('Saia do mundo da procrastinação');
        $("#slidephrase").text('É hora de organizar sua vida');
        clicksNext = 3;
    }
   });

   var timerLogo = (`<div class="timer d-flex">
   <div class="row text-center"style="margin-top:5px">
       <h2 id="counter">00:00:00</h2>
   </div>
   <div class="col d-flex">
       <button class="btn btn-success" id="start" onclick="startCron()"><ion-icon name="play-outline"></ion-icon></button>
       <button class="btn btn-warning" id="pause" onclick=pauseCron()><ion-icon name="pause-outline"></ion-icon></button>
       <button class="btn btn-danger" id="zerar" onclick="stopCron()"><ion-icon name="stop-outline"></ion-icon></button>
   </div>
</div>
</div>`);

   $("#timer-logo").click(function(){
    $(this).replaceWith(timerLogo);
   });
});