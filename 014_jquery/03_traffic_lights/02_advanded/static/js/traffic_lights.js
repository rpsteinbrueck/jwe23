let settings = {
    lightId: {
        red: "#red_light",
        yellow: "#yellow_light",
        green: "#green_light"
    },
    current_state: 0,
    /*states: [
        "0",  //red
        "01", // red+yellow
        "2",  // green
        "1",  // yellow
    ],*/
    colors: [
        "red",
        "yellow",
        "green"
    ],
    duration: {
        red: 2000,
        green: 2000,
        yellow: 2000,
        //switchTime: 1000,
    },
};

let pause = false;

let changeTrafficLightColor = function (light, color) {
    $(light).css("background-color", color);
};

const switchTrafficLight = function (light, color, duration, current_state) {
    console.log("switching traffic light: ", light, color, duration, current_state);

    let trafficTimeout = window.setTimeout(function () {
        if (pause == true) {
            console.log("Traffic light simulation has been stopped")
            return;
        }
        resetTrafficLights()

        if (current_state == 1) {
            changeTrafficLightColor(light, color);
            changeTrafficLightColor(settings.lightId.red, settings.colors[0]);
        } else {
            changeTrafficLightColor(light, color);
        }
        settings.current_state = current_state + 1;
        if ( settings.current_state == 4) {
            settings.current_state = 0;
        }
        playTrafficLights()
    }, duration);
};

let resetTrafficLights = function () {
    // turn all lights black
    changeTrafficLightColor(settings.lightId.red, "black");
    changeTrafficLightColor(settings.lightId.yellow, "black");
    changeTrafficLightColor(settings.lightId.green, "black");
};


let stopTrafficLights = function () {
    resetTrafficLights()
    pause = true;
    settings.current_state = 0
};

/*let pauseTrafficLights = function () {
    pause = true;
};*/

let playTrafficLights = function () {
    pause = false;
    //console.log("current state = ", settings.current_state)

    let current_state = settings.current_state

    if (current_state == 3) {
        switchTrafficLight(settings.lightId.yellow, settings.colors[1], settings.duration.yellow, current_state);
    }
    if (current_state == 2) {
        switchTrafficLight(settings.lightId.green, settings.colors[2], settings.duration.green, current_state);
    }
    if (current_state == 1) {
        switchTrafficLight(settings.lightId.yellow, settings.colors[1], settings.duration.red, current_state);
    }
    if (current_state == 0) {
        switchTrafficLight(settings.lightId.red, settings.colors[0], settings.duration.red, current_state);
    }

};

