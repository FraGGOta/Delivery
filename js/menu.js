var cart = {}; 

function init() {
    $.post(
        "dataBase/function.php",
        {
            "action" : "loadGoods"
        },
        goodsOut
    );
}
   
function goodsOut(data) {
    data = JSON.parse(data);
    var out='';
    for (var id in data) {
        out += '<div class="cart">';
        out += `<img class="imgs" src="images/${data[id].img}" alt="">`;
        out += `<p class="name">${data[id].name}</p>`;
        out += `<div class="descr">${data[id].descr}</div>`;
        out += `<div class="cost">${data[id].cost} РУБ</div>`;
        out += `<button class="add-to-cart" data-id="${id}">Купить</button>`;
        out += '</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-cart').on('click', addToCart)
}

function addToCart() {
    var id = $(this).attr('data-id');
    if (cart[id]==undefined) {
        cart[id] = 1;
    }
    else {
        cart[id]++;
    }
    showCart();
    saveCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showCart() {
    count = 0;
    for (var key in cart) {
        count += cart[key];
    }
    $('.mini-cart').html(count);
}

function loadCart() {
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));   
        showCart();
    }
}

$(document).ready(function () {
    init();
    loadCart();
});

