function initPizza() 
{
    $.post
    (
        "../connect/core.php",
        {
            "action": "initPizza"
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
    clearGoods();

    data = JSON.parse(data);

    var out = '';
    out += `<option data-id="0">Новый товар</option>`;

    for (var id in data) 
    {
        out += `<option data-id = "${id}"> ${data[id].name} </option>`;
    }

    $('.item').html(out);
    $('.out-goods select').on('change', selectGoods);
}

function selectGoods() 
{
    clearGoods();

    var id = $('.out-goods select option:selected').attr('data-id');

    $.post
    (
        "../admin/core.php",
        {
            "action": "selectGoods",
            "gid": id
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

    if (id != "") 
    {
        $.post
        (
            "../admin/core.php",
            {
                "action": "deleteGoods",
                "id": id
            }
        );
        $('.msg').removeClass('none').text('Запись удалена');
        clearGoods();
        initPizza();
    }
    else 
    {
        $('.msg').removeClass('none').text('Ошибка');
    }
}

function changeCategory() 
{
    $('.category-body select').on('change', function () 
    {
        if ($("option:selected", this).attr('data-id') == '1') 
        {
            clearGoods();
            initPizza();
        }
        else if ($("option:selected", this).attr('data-id') == '2') 
        {
            clearGoods();
            initShaurma();
        }
        else if ($("option:selected", this).attr('data-id') == '3') 
        {
            clearGoods();
            initBurgers();
        }
        else if ($("option:selected", this).attr('data-id') == '4') 
        {
            clearGoods();
            initDrinks();
        }
    });
}

function clearGoods() 
{
    $('#gid').val('');
    $('#gname').val('');
    $('#gcost').val('');
    $('#gdescr').val('');
    $('#gimg').val('');
    $('#gord').val('');
}

function saveToDb() 
{
    var id = $('#gid').val();

    if (id != "") 
    {
        $.post
        (
            "../admin/core.php",
            {
                "action": "updateGoods",
                "id": id,
                "gname": $('#gname').val(),
                "gcost": $('#gcost').val(),
                "gdescr": $('#gdescr').val(),
                "gord": $('#gord').val(),
                "gimg": $('#gimg').val()
            }
        );
        $('.msg').removeClass('none').text('Товар обновлен');
        initPizza;
    }
    else 
    {
        $.post
        (
            "../admin/core.php",
            {
                "action": "newGoods",
                "id": 0,
                "gname": $('#gname').val(),
                "gcost": $('#gcost').val(),
                "gdescr": $('#gdescr').val(),
                "gord": $('#gord').val(),
                "gimg": $('#gimg').val(),
                "gcategory": $('.category option:selected').attr('data-id'),
            }
        );

        $('.msg').removeClass('none').text('Товар добавлен');
        initPizza;
    }
}

$(document).ready(function () 
{
    initPizza();
    changeCategory();
    $('.add-to-db').on('click', saveToDb);
    $('.category option:selected').val();
    $('.delete-from-db').on('click', deleteGoods);
});