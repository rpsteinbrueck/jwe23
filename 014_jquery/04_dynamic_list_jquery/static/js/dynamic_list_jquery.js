let itemList = [];

if (typeof Cookies.get("itemList") != "undefined") {
    itemList = Cookies.get("itemList", itemList).split(",");
}

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
    itemList.push($("#new_item").val());
    Cookies.set("itemList", itemList, { expires: 365 });
    prependNewItem(itemList.length - 1, itemList[itemList.length - 1]);
    $("#new_item").val("").focus();
};

const deleteItem = function (item_id) {
};

$("#add_item").on("click", addItem);
$("#new_item").on("keyup", function (e) {
    if (e.keyCode == 13) {
        addItem();
    }
});

createItemList();
