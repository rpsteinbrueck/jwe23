let itemList = [];
let checkboxList = [];

if (typeof Cookies.get("cookie_itemList") != "undefined") {
    itemList = Cookies.get("cookie_itemList").split(",");

    if (typeof Cookies.get("cookie_checkboxList") != "undefined") {
        checkboxList = Cookies.get("cookie_checkboxList").split(",");
    }
}

const prependNewItem = function (item_id, item_name) {
    let filteredCheckboxList = checkboxList.filter(function (item) {
        return item.toLowerCase() == item_name.toLowerCase(); 
    });

    if (filteredCheckboxList.length) {
        checkboxStatus = 'checked="true"'
    } else {
        checkboxStatus = ""
    }

    
    $("#item_list").prepend(`<div class="form-check" data_item_id="${item_id}">
                                <input class="form-check-input" 
                                       type="checkbox"
                                       ${checkboxStatus}
                                       value="${item_name}" 
                                       id="item_${item_id}">
                                <label class="form-check-label"
                                       for="flexCheckDefault" 
                                       checked=false 
                                       id="item_${item_id}">${item_name}
                                </label>
                                <button class="btn btn-danger"
                                        type="button"
                                        data_item_id="${item_id}"
                                        onclick="rmItem('${item_id}')">Delete
                                </button>
                             </div>`
                            );
};

const createItemList = function () {
    $(itemList).each(function (item_id, item_name) {
        prependNewItem(item_id, item_name);
    });
};

const addItem = function () {
    let value = $("#new_item").val();

    let filteredList = itemList.filter(function (item) {
        return item.toLowerCase() == value.toLowerCase(); 
    });

    if (!filteredList.length) {
        itemList.push($("#new_item").val());
        Cookies.set("cookie_itemList", itemList, { expires: 365 });
        prependNewItem(itemList.length - 1, itemList[itemList.length - 1]);
    } else {
        $("#new_item").val("");
    }
    $("#new_item").val("").focus();
};

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
        Cookies.remove("cookie_checkboxList")
    }
	return true
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

const checkboxLogic = function () {
    let checkbox = $(this);

    if (checkbox.prop("checked") !== true) {

        for (let count = 0; count < checkboxList.length; count++) {
            if (checkboxList[count] === $(checkbox).val()) {
                delete checkboxList[count];;
            }
        }

        let checkboxArr = []
        for (let count = 0; count < checkboxList.length; count++) {
            if (checkboxList[count] !== undefined) {
                checkboxArr.push(checkboxList[count]);
            }
        }
        checkboxList = checkboxArr
        if (checkboxList.length !== 0) {    
            Cookies.set("cookie_checkboxList", checkboxList, { expires: 365 });
        } else {
            Cookies.remove("cookie_checkboxList")
        }
    } else {
        let filteredCheckboxList = checkboxList.filter(function (item) {
            return item.toLowerCase() == $(checkbox).val().toLowerCase(); 
        });

        if (!filteredCheckboxList.length) {
            checkboxList.push($(checkbox).val())
            Cookies.set("cookie_checkboxList", checkboxList, { expires: 365 });
        }
    }
}


if (itemList.length !== 0) {
    createItemList();
}

$("#add_item").on("click", addItem);
$("#new_item").on("keyup", function (e) {
    if (e.keyCode == 13) {
        addItem();
    }
});

$("#new_item").on("keyup", filterList);
$("#add_item").on("click", filterList);

$("input.form-check-input").on("click", checkboxLogic);