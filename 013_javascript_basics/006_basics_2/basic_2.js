/*

    ############################
    #
    # JavaScript Basics REVISION
    # 
    ############################

*/

// defining an empty variable
let myVariable;

// assigning a var later
myVariable = "Dienstag";

// changing data type for var later is valid
myVariable = 1;

// constant stays constant (never changing)
const myConst = 2;

// output to browser console
console.log(myVariable, myConst);

// define array
let myArr = ["Milk", "Sugar", "Bread"];

// read first element of arr
console.log(myArr[0]);

// change first element of arr
myArr[0] = "Beer";
console.log(myArr[0]);

// define a const array
const myArr2 = ["Butter", "Honey"];
console.log(myArr2);

// const arrays cannot be changed from array to another data type
myArr2[1] = "Mustard";
console.log(myArr);
myArr2[1] = 1234;
console.log(myArr2);

// adding a value by key to array
myArr2[3] = "Tomatoes";

// objects
let myObject = {
    name: "Random Name",
    age: "random age",
    languages: [
        "English",
        "German",
        "Dutch",
        "Afrikaans",
        "Golang",
        "Bash",
        "Python",
        "Javascript",
    ],
    greet: function () {
        window.alert("Hi there!");
    },
};

console.log(myObject);

// objects can contain functions
// myObject.greet()

console.log(myObject.age);

// object in an array
let myCartArr = [
    {
        articleID: "00000001",
        articleName: "Cup",
        articlePrice: "4.5",
        amount: 45,
    },
    {
        articleID: "00000002",
        articleName: "Book",
        articlePrice: "10",
        amount: 1,
    },
];

// dot.notation
console.log(myCartArr[0].articleName);

/*let someObject = {
    deleteProduct: function () {},
    varients: {
        sizes: ["S", "M", "L"],
        color: ["red", "green", "blue"],
    },
};*/

const productData = {
    id: 123,
    artNo: 9123123,
    title: "Taz's Tomatoe T-Shirts",
    varients: {
        sizes: ["XS", "S", "M", "L", "XL", "XXL"],
        colors: ["black", "petrol", "wine red"],
    },
    price: 49.99,
    productImage: "pexels-anna-nekrashevich-8532616",
};
