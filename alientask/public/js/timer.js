
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
    }
    
    function timer()
    {
        document.getElementById("counter").innerText = 'teste';
    }
