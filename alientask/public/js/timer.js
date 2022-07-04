
    "use strict"

    var hours = 0;
    var minutes = 0;
    var seconds = 0;

    var time = 1000; //milloseconds
    var cron;

    //start
    function startCron()
    {
        cron = setInterval(() => {
            timer();
        }, time);
    }

    function pauseCron()
    {
        clearInterval(cron);
    }

    function stopCron()
    {
        clearInterval(cron);
        hours = 0;
        minutes = 0;
        seconds = 0;
        document.getElementById("counter").innerText = '00:00:00';
    }
    
    function timer()
    {
        if(seconds == 59)
        {
            minutes++;
            seconds = 0;
        }
        if(minutes == 60)
        {
            minutes = 0;
            hours++;
        }
        seconds++;
        var format = (hours < 10 ? '0' + hours : hours) + ':' + (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds);
        document.getElementById("counter").innerText = format;
    }
