const settings = {
    states: [
        "0", //red
        "01", // red+yellow
        "2", // green
        "1", // yellow
    ],
    state: "2",
    duration: {
        red: 10,
        green: 5,
    },
    switchTime: 1,
};

$("#traffic_lights").text(settings.state);

const fromGreenToRed = function () {
    window.setTimeout(function () {
        settings.state = settings.states[3]; // set to yellow
        window.setTimeout(function () {
            settings.state = settings.states[0]; // set to red
            window.setTimeout(function () {
                fromRedToGreen();
            }, settings.duration.red);
        }, 1000);
    }, 1000);
};

const fromRedToGreen = function () {
    window.setTimeout(function () {
        settings.state = settings.states[1]; // set to yellow
        window.setTimeout(function () {
            settings.state = settings.states[2]; // set to red
            window.setTimeout(function () {
                fromRedToGreen();
            }, settings.duration.green);
        }, 1000);
    }, 1000);
};

window.setInterval(function () {
    $("#traffic_lights").text(settings.state);
}, 5000);

fromGreenToRed();

if ($("#traffic_lights").text() == 0) {
    $("#traffic_lights").css("color", "red");
}
