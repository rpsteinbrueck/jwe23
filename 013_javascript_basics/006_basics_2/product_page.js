const productData = {
    id: 123,
    artNo: 9123123,
    title: "Taz's Tomatoe T-Shirts",
    varients: {
        sizes: ["XS", "S", "M", "L", "XL", "XXL"],
        colors: ["black", "petrol", "wine red"],
    },
    price: 49.99,
    productImage: "img/pexels-anna-nekrashevich-8532616.jpg",
    description:
        "lorem200 asc cvx v sdfv asdvsdfgsa fasda s das das dasd asda sdasdsd",
};

document.querySelector("#art-no").innerHTML = productData.artNo;
document
    .querySelector("#art-img")
    .setAttribute("src", productData.productImage);
document.querySelector("#art-title").innerHTML = productData.title;
document.querySelector("#art-price").innerHTML =
    "€" + productData.price.toString().replace(".", ",");
document.querySelector("#inputQuantity").innerHTML;

let sizeArr = productData.varients.sizes;
let output = "";

for (
    let number = 0, sizesArrLength = productData.varients.sizes.length;
    number < sizesArrLength;
    number++
) {
    console.log(number);
    console.log(sizeArr[number]);
    output += `<option value="${sizeArr[number]}">${sizeArr[number]}</option>\n`;
}
document.querySelector("#art-size").innerHTML = output;
