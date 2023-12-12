console.log("This is where the console is being debugged");

let myName = "Random_Name"; // string
let myAge = 26; // int
let float_myAge = 26.0; // float
let organicFood = false; // bool

// does not have to have a semi cologn, example:
// let organicFood = false
// it is advised to write statement with semicologn

let myArray = ["bread", "milk", true, 3999, "test", 88.222]; // array list

// a common single and double quotes problem solved in javascript:
let dynamic_html = '<p style="color: red;"> This is a red paragraph</p>';

// break or escape solving the same problem:
let dynamic_html2 = '<p style="color: blue;"> This is a blue paragraph<p>';

document.body.innerHTML = dynamic_html;

// old way of writing function in javascript
let myFunctionName = function () {
    console.log(myArray);
};

// commented out because it has to be loaded after the html code
// otherwise an error occurs
//
// get information from the html document, examples:
// let varh1_1 = document.querySelector("h1").innerText;
// let varh1_2 = document.getElementsByName("h1").innerText;

let i = 0;

let change_background = function () {
    let backgroundColor_Arr = ["#dc3312", "blue", "grey", "white", "black"];
    document.getElementById("bodycolor").style.backgroundColor =
        backgroundColor_Arr[i];

    if (i == 4) {
        i = 0;
    } else {
        i += 1;
    }
};
