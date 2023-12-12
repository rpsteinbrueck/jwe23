let shopping_list = [];

let add_item = function () {
    let new_item = document.querySelector("#newElement").value;
    console.log(new_item, " was added to the list: shopping_list.");
    shopping_list.push(new_item);
    console.log(shopping_list);
    getAllItems();
};

let getAllItems = function () {
    let html_output = " ";
    shopping_list.forEach((item) => {
        html_output += item + " ";
    });
    document.querySelector("#listoutput").innerHTML = html_output;
};
