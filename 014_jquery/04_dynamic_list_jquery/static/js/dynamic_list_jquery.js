let itemList = [];

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
data_item_id="${item_id}"
onclick="rmItem('${item_id}')">
Delete
</button>
</div>`);
};

const createItemList = function () {
    if ( itemList !== 0) {
        $(itemList).each(function (item_id, item_name) {
            prependNewItem(item_id, item_name);
        });
    }
};





const addItem = function () {

    let value = $("#new_item").val();

    let filteredList = itemList.filter(function (item) {
        return item.toLowerCase() == value.toLowerCase();
    });

    if (!filteredList.length) {
        itemList.push($("#new_item").val());
        Cookies.set("cookie_itemList", itemList, { expires: 365 });
        //localStorage.setItem("cookie_itemList", JSON.stringify(itemList));
        prependNewItem(itemList.length - 1, itemList[itemList.length - 1]);
    } else {
        $("#new_item").val("");
    }
    $("#new_item").val("").focus();
};

$("#add_item").on("click", addItem);
$("#new_item").on("keyup", function (e) {
    if (e.keyCode == 13) {
        addItem();
    }
});

if (itemList.length !== 0) {
    createItemList();
}


const fuzzyFinder = function (filteredList) {
    $("#item_list").empty();
    $(filteredList).each(prependNewItem);
};

const filterList = function () {
    let value = $(this).val().toLowerCase();

    let filteredList = itemList.filter(function (item) {
        return item.toLowerCase().includes(value);
    });
    fuzzyFinder(filteredList);
};

$("#new_item").on("keyup", filterList);
$("#add_item").on("click", filterList);

/*$("input.form-check-input").on("click", function () {
    let checkbox = $(this);

    console.log(checkbox.prop("checked"));

    if (checkbox.prop("checked") == true) {
        // save in array
    }
});*/

$("[data_item_id]").each(function (index, item) {
    let element = $(this);

    if (element.attr("data_item_id" == 1)) {
        element.find("input.form-check-input").prop("checked", true);
        //$("[data_item_id]").find("input.form-check-input").prop("checked", true)
    }
});

/*$("input.form-check-input").each(function (index, input) {
    if (input.attr("id") == "data_item" + 2) {
        $(input).prop("checked", true);
    }
});*/

function rmItem(value) {
	if (! value in itemList) {
		return false;
	} else {
		delete itemList[value]
	}

	let newArr = []
	for (let count = 0; count < itemList.length; count++) {
		if (itemList[count] === undefined) {
			continue
		} else {
			newArr.push(itemList[count])
		}
    }
	itemList = newArr

    $("#item_list").empty();
    if (itemList.length !== 0) {    
        Cookies.set("cookie_itemList", itemList, { expires: 365 });
        createItemList()
    } else {
        Cookies.remove("cookie_itemList")
    }
	return true
}