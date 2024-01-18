let itemList = ["bread"];

if (typeof Cookies.get("cookie_itemList") != "undefined") {
    itemList = Cookies.get("cookie_itemList").split(",");
}

//if (localStorage.getItem("itemList".split(","))) {}

const prependNewItem = function (item_id, item_name) {
    $("#item_list").prepend(`<div class="form-check" data_item_id="${item_id}">
<input class="form-check-input" type="checkbox" value="${item_name}" id="item_${item_id}">
<label class="form-check-label" for="flexCheckDefault" checked=false id="item_${item_id}">
${item_name}
</label>
<button
class="btn btn-danger"
type="button"
data_item_id="${item_id}">
Delete
</button>
</div>`);
};

const createItemList = function () {
    $(itemList).each(function (item_id, item_name) {
        prependNewItem(item_id, item_name);
    });
};

const addItem = function () {
    /*if (typeof $("#new_item").val() != "undifined") {
        return;
    }*/

    let value = $("#new_item").val();

    let filteredList = itemList.filter(function (item) {
        return item.toLowerCase().includes(value.toLowerCase());
    });

    if (!filteredList.length) {
        itemList.push($("#new_item").val());
        Cookies.set("cookie_itemList", itemList, { expires: 365 });
        localStorage.setItem("itemList", JSON.stringify(itemList));
        prependNewItem(itemList.length - 1, itemList[itemList.length - 1]);
    } else {
        $("#new_item").val("");
    }
    $("#new_item").val("").focus();
};

//const deleteItem = function (item_id) {};

$("#add_item").on("click", addItem);
$("#new_item").on("keyup", function (e) {
    if (e.keyCode == 13) {
        addItem();
    }
});

createItemList();

const fuzzyFinder = function (filteredList) {
    $("#item_list").empty();
    $(filteredList).each(prependNewItem());
};

const filterList = function () {
    let value = $(this).val().toLowerCase();

    let filteredList = itemList.filter(function (item) {
        return item.toLowerCase().includes(value);
    });
    fuzzyFinder(filteredList);
};

$("#new_item").on("keyup", filterList());
$("#add_item").on("click", filterList());
