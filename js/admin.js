function initPizza() 
{
    $.post
    (
        "../connect/core.php",
        {
            "action" : "initPizza"
        },
        showGoods
    );
}

function initShaurma() 
{
    $.post
    (
        "../connect/core.php",
        {
            "action": "initShaurma"
        },
        showGoods
    );
}

function initBurgers() 
{
    $.post
    (
        "../connect/core.php",
        {
            "action": "initBurgers"
        },
        showGoods
    );
}

function initDrinks() 
{
    $.post
    (
        "../connect/core.php",
        {
            "action": "initDrinks"
        },
        showGoods
    );
}

function showGoods(data) 
{
    data = JSON.parse(data);
    var out='<select>';
    out +='<option data-id="0">Новый товар</option>';

    for (var id in data) 
    {
        out +=`<option data-id="${id}">${data[id].name}</option>`;
    }
    out +='</select>';

    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods);
}

function selectGoods() 
{
    var id = $('.goods-out select option:selected').attr('data-id');

    $.post
    (
        "../admin/core.php",
        {
            "action" : "selectGoods",
            "gid" : id
        },
        function (data) 
        {
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

function deleteGoods() 
{
    var id = $('#gid').val();

    if (id!="") 
    {
        $.post
        (
            "../admin/core.php",
            {
                "action" : "deleteGoods",
                "id" : id
            }
        );
        alert('Товар удален');
    }
    else 
    {
        alert('Ошибка');
    }
}

function saveToDb() 
{
    var id = $('#gid').val();
    if (id!="")
    {
        $.post
        (
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
    else 
    {
        $.post
        (
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


$(document).ready(function () 
{
   initPizza();
   $('.add-to-db').on('click', saveToDb);
   $('.delete-from-db').on('click', deleteGoods);
});