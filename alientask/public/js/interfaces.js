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
   })
});