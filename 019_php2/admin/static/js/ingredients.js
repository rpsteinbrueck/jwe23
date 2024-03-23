function newIngredient() {
    var block = document.querySelector(".ingredients_list .ingredients_block");
    var new_block = block.cloneNode(true);
    document.querySelector(".ingredients_list").appendChild(new_block);

    new_block.querySelector("select").value = "---Please select ingredient---";
}

function rmIngredient(trashbutton) {
    var element = trashbutton;
    var ingredients_block_div = element.parentElement;
    ingredients_block_div.remove();
}