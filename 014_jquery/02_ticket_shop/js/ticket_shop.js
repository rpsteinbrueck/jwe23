let myInterval = window.setInterval(function () {
    //const ticketSateStart = new Date("2024-01-11T20:30:00");
    const ticketSateStart = new Date("2024-01-11T20:36:00");
    const now = new Date();

    console.log(new Date(), "check", now >= ticketSateStart);

    if (now >= ticketSateStart) {
        //document.querySelector("#tickets").style.display = "block";
        //$("#tickets").show();
        $("#tickets").slideDown();
        clearInterval(myInterval);
    } else {
        //$("#tickets").hide();
        $("#tickets").slideUp();
    }
}, 2000);
