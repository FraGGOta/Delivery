var cart = {};

function getRandomInt(min, max) 
{
    return Math.floor(Math.random() * (max - min)) + min;
}

function loadCart() 
{
    if (localStorage.getItem('cart')) 
    {
        cart = JSON.parse(localStorage.getItem('cart'));
        showCart();
    }
    else 
    {
        $('.main-cart').html('Добавьте что-нибудь из меню');
    }
}

function showCart() 
{
    if (!isEmpty(cart)) 
    {
        $('.total-sum').html(`Итого: ${0} рублей`);
        $('.main-cart').html('Добавьте что-нибудь из меню');
    }
    else 
    {
        $.post
        (
            "dataBase/core.php",
            {
                "action": "allGoods"
            },

            function (data) 
            {
                var goods = JSON.parse(data);
                var out = '';
                var total = 0;

                for (var id in cart) 
                {
                    out += '<div class="main-cart">';
                    out += `<img class="images" src = "images\\${goods[id].img}">`;
                    out += `<p>${goods[id].name}</p>`;
                    out += `<button data-id="${id}" class="minus-goods">-</button>&nbsp`;
                    out += `${cart[id]}`;
                    out += `&nbsp<button data-id="${id}" class="plus-goods">+</button>`;
                    out += `<div>${goods[id].cost * cart[id]} РУБ </div>`;
                    out += `<button data-id="${id}" class="delete-goods">x</button>`;
                    total += goods[id].cost * cart[id];
                    out += '</div>';
                }

                $('.main-cart').html(out);
                $('.plus-goods').on('click', plusGoods);
                $('.minus-goods').on('click', minusGoods);
                $('.delete-goods').on('click', deleteGoods);
                $('.total-sum').html(`Итого: ${total} рублей`);
            }
        );
    }
}

function plusGoods() 
{
    var id = $(this).attr('data-id');
    cart[id]++;

    saveCart();
    showCart();
}

function minusGoods() 
{
    var id = $(this).attr('data-id');

    if (cart[id] == 1) 
    {
        delete cart[id];
    }
    else 
    {
        cart[id]--;
    }

    saveCart();
    showCart();
}

function deleteGoods() 
{
    var id = $(this).attr('data-id');
    delete cart[id];

    saveCart();
    showCart();
}

function saveCart() 
{
    localStorage.setItem('cart', JSON.stringify(cart));
}

function isEmpty(object) 
{
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}

function refreshCaptcha() 
{
    $("img#captcha-image").attr("src", "/captcha.php?r=" + getRandomInt(100000000, 400000000));
}

function sendEmail() 
{
    event.preventDefault();

    $(`input`).removeClass('error');
    $(`textarea`).removeClass('error');

    var name = $('#name').val();
    var address = $('#address').val();
    var number = $('#number').val();
    var mail = $('#mail').val();
    var captcha = $('#captcha').val();

    if (isEmpty(cart)) 
    {
        $.ajax
            ({
                method: "POST",
                url: "/mail/order.php",
                dataType: "json",
                data:
                {
                    "name": name,
                    "address": address,
                    "number": number,
                    "mail": mail,
                    "cart": cart,
                    "captcha": captcha
                },
                success: function (response) 
                {
                    if (response.status) 
                    {
                        $('.msg').removeClass('none').text('Заказ отправлен');
                        localStorage.clear();
                        document.location.href = '/';
                    }
                    else 
                    {
                        if (response.type === 1) 
                        {
                            response.fields.forEach(function (field) 
                            {
                                if ($(`input[id="${field}"]`).length > 0) 
                                {
                                    $(`input[id="${field}"]`).addClass('error');
                                }
                                else 
                                {
                                    if ($(`textarea[id="${field}"]`).length > 0) 
                                    {
                                        $(`textarea[id="${field}"]`).addClass('error');
                                    }
                                }
                            });
                        }

                        $('.msg').removeClass('none').text(response.message);
                    }
                },
                error: function (request, status, error) 
                {
                    $('.msg').removeClass('none').text('Не удалось выполнить запрос');
                }
            });
    }
    else {
        $('.msg').removeClass('none').text('Корзина пуста');
    }

    refreshCaptcha();
}


$(document).ready(function () 
{
    loadCart();
    $('.refresh-captcha').on('click', refreshCaptcha);
    $('.send-email').on('click', sendEmail);
});