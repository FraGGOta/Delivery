var cart = {}; 

function init() 
{
    $.post
    (
        "dataBase/core.php",
        {
            "action" : "loadPizza"
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
    var out='';

    for (var id in data) 
    {
        out += '<div class="cart">';
        out += `<img class="images" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="descr">${data[id].descr}</div>`;
        out += `<div class="cost">${data[id].cost} РУБ </div>`;
        out += `<button class="add-pizza" data-id="${id}">Купить</button>`;
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
        out += `<button class="add-shaurma" data-id="${id}">Купить</button>`;
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
        out += `<button class="add-burgers" data-id="${id}">Купить</button>`;
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
        out += `<button class="add-drinks" data-id="${id}">Купить</button>`;
        out += '</div>';
    }

    $('.out-drinks').html(out);
    $('.add-drinks').on('click', addCart)
}

function addCart() 
{
    var id = $(this).attr('data-id');

    if (cart[id]==undefined) 
    {
        cart[id] = 1;
    }
    else {
        cart[id]++;
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

