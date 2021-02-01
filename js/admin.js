function init() {
    $.post(
        "../admin/core.php",
        {
            "action" : "init"
        },
        showGoods
    );
}

function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
    var out='<select>';
    out +='<option data-id="0">Новый товар</option>';
    for (var id in data) {
        out +=`<option data-id="${id}">${data[id].name}</option>`;
    }
    out +='</select>';
    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods);
}

function selectGoods() {

    var id = $('.goods-out select option:selected').attr('data-id');
    console.log(id);
    $.post(
        "../admin/core.php",
        {
            "action" : "selectOneGoods",
            "gid" : id
        },
        function (data) {
            data = JSON.parse(data);
            $('#gname').val(data.name);
            $('#gcost').val(data.cost);
            $('#gdescr').val(data.descr);
            $('#gord').val(data.ord);
            $('#gimg').val(data.img);
            $('#gid').val(data.id);
        }
    );
}

function deleteGoods() {
    var id = $('#gid').val();
    if (id!="") {
        $.post(
            "../admin/core.php",
            {
                "action" : "deleteGoods",
                "id" : id
            }
        );
        alert('Товар удален');
    }
    else {
        alert('Ошибка');
    }
}

function saveToDb() {
    var id = $('#gid').val();
    if (id!=""){
        $.post(
            "../admin/core.php",
            {
                "action" : "updateGoods",
                "id" : id,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gord" : $('#gord').val(),
                "gimg" : $('#gimg').val(),
            }
        );
        alert('Товар обновлен');
    }
    else {
        $.post(
            "../admin/core.php",
            {
                "action" : "newGoods",
                "id" : 0,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gord" : $('#gord').val(),
                "gimg" : $('#gimg').val()
            }
        );  
        alert('Товар добавлен');
    }
}


$(document).ready(function () {
   init();
   $('.add-to-db').on('click', saveToDb);
   $('.delete-from-db').on('click', deleteGoods);
});