var cart = {};

function init() 
{
    $.post
    (
        "dataBase/core.php",
        {
            "action": "loadPizza"
        },
        outPizza
    );

    $.post
    (
        "dataBase/core.php",
        {
            "action": "loadShaurma"
        },
        outShaurma
    );

    $.post
    (
        "dataBase/core.php",
        {
            "action": "loadBurgers"
        },
        outBurgers
    );

    $.post
    (
        "dataBase/core.php",
        {
            "action": "loadDrinks"
        },
        outDrinks
    );
}

function outPizza(data) 
{
    data = JSON.parse(data);
    var out = '';

    for (var id in data) 
    {
        out += '<div class="cart">';
        out += `<img class="images" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="descr">${data[id].descr}</div>`;
        out += `<div class="cost">${data[id].cost} РУБ </div>`;
        out += `<button class="add-pizza" id="cart_button_buy" data-id="${id}">Купить</button>`;
        out += '</div>';
    }

    $('.out-pizza').html(out);
    $('.add-pizza').on('click', addCart)
}

function outShaurma(data) 
{
    data = JSON.parse(data);
    var out = '';

    for (var id in data) 
    {
        out += '<div class="cart">';
        out += `<img class="images" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="descr">${data[id].descr}</div>`;
        out += `<div class="cost">${data[id].cost} РУБ </div>`;
        out += `<button class="add-shaurma" id="cart_button_buy" data-id="${id}">Купить</button>`;
        out += '</div>';
    }

    $('.out-shaurma').html(out);
    $('.add-shaurma').on('click', addCart)
}

function outBurgers(data) 
{
    data = JSON.parse(data);
    var out = '';

    for (var id in data) 
    {
        out += '<div class="cart">';
        out += `<img class="images" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="descr">${data[id].descr}</div>`;
        out += `<div class="cost">${data[id].cost} РУБ </div>`;
        out += `<button class="add-burgers" id="cart_button_buy" data-id="${id}">Купить</button>`;
        out += '</div>';
    }

    $('.out-burgers').html(out);
    $('.add-burgers').on('click', addCart)
}

function outDrinks(data) 
{
    data = JSON.parse(data);
    var out = '';

    for (var id in data) 
    {
        out += '<div class="cart_drink">';
        out += `<img class="images" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="cost">${data[id].cost} РУБ </div>`;
        out += `<button class="add-drinks" id="cart_button_buy" data-id="${id}">Купить</button>`;
        out += '</div>';
    }

    $('.out-drinks').html(out);
    $('.add-drinks').on('click', addCart)
}

function addCart() 
{
    var id = $(this).attr('data-id');

    if (cart[id] == undefined) 
    {
        cart[id] = 1;
    }
    else 
    {
        cart[id]++;
    }

    var card_animation = $('#cart_menu');
    if ($(this).parent('.cart').length) var imgtodrag = $(this).parent('.cart').find("img").eq(0);
    if ($(this).parent('.cart_drink').length) var imgtodrag = $(this).parent('.cart_drink').find("img").eq(0);

    if (imgtodrag) 
    {
        var imgclone = imgtodrag.clone()
            .offset
            ({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
            .css
            ({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '1000000'
            })
            .appendTo($('body'))
            .animate
            ({
                'top': card_animation.offset().top + 10,
                'left': card_animation.offset().left + 10,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');

        setTimeout(function () 
        {
            card_animation.effect("shake",
                {
                    times: 2
                }, 200);
        }, 1500);

        imgclone.animate
        ({
            'width': 0,
            'height': 0
        }, function () {
            $(this).detach()
        });
    }

    showMiniCart();
    saveCart();
}

function saveCart() 
{
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showMiniCart() 
{
    count = 0;

    for (var key in cart) 
    {
        count += cart[key];
    }

    $('.mini-cart').html(count);
}

function loadCart() 
{
    if (localStorage.getItem('cart')) 
    {
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

$(document).ready(function () 
{
    init();
    loadCart();
});



