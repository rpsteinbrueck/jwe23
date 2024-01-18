let myNumber = 545;
let myString = "Some random string";
let myDate = "05-23-2025";
let myArr = [
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
    "Sunday",
];
let myObject = {
    type: "car",
    brand: "audi",
    hp: "334",
    color: "black",
    model: "s3",
    price: "20.000,00",
};
let myObject2 = {
    type: "car",
    brand: "bmw",
    hp: "294",
    color: "white",
    model: "",
    price: "16.000,00",
};

console.log(
    "The payment will be deducted from the account with the number: " + myNumber
);
console.log("The bill has been paid on: " + myArr[3]);
console.log(
    "My " +
        myObject.color +
        " " +
        myObject.brand +
        " has " +
        myObject.pw +
        "and is a " +
        myObject.model +
        " model."
);

//calculation work even if the data type of myObject.hp is a string
console.log(myObject.hp - myObject2.hp);

//(both of the values must be strings for this to work) this will not work if they are seperate data types
myObject.hp = 334;
console.log(myObject.hp - myObject2.hp);

// one would have to convert one of the data types to fit the other one
console.log(myObject.hp - parseInt(myObject2.hp));

console.log(
    `The ${myObject.brand} costs ${parseInt(
        myObject.price.replace(".", "").replace(",", ".")
    )}`
);

myObject.price = parseInt(myObject.price.replace(".", "").replace(",", "."));
myObject2.price = Number(myObject2.price.replace(".", "").replace(",", "."));

console.log(Number(myObject.price));
console.log(Number(myObject2.price));

console.log(myObject.price - myObject2.price);

console.log(new Date(myDate));

let pricetag = "€ 1.433,08";

console.log(pricetag.substring(2));
console.log(pricetag.substring(2, 3));
console.log(pricetag.substring(2, 4));
console.log(pricetag.substring(2, 5));
console.log(pricetag.substring(2, 10));
console.log(pricetag.substring(2, pricetag.length));

let pricetag2 = "7.22,90 Euro";
console.log(pricetag2, pricetag2.replace("Euro", ""));

let stringInfo = [
    "max",
    "Mustermann",
    "Salzburgerstrasse 1",
    "5620",
    "22.08.1989",
    "+4321123565",
    "AT",
];

console.log(stringInfo.join(";"));

let serverResponse =
    '["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]';

console.log(JSON.parse(serverResponse));

let serverResponse2 =
    '{"test": 1, "email":"somerandom@email.address","Country":"South Africa"}';
console.log(JSON.parse(serverResponse2));

let myEmail = "random@email.local";

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

if (validateEmail(myEmail) == true) {
    console.log(`${myEmail} is a valid email address`);
} else {
    console.log(`${myEmail} is not a valid email address`);
}
