var cart = {}; 

function init() {
    $.getJSON("goods.json", goodsOut); 
}
   
function goodsOut(data) {
    var out='';
    for (var key in data) {
        out +='<div class="cart">';
        out +=`<img class="imgs" src="images/${data[key].img}" alt="">`;
        out +=`<p class="name">${data[key].name}</p>`;
        out +=`<div class="descr">${data[key].descr}</div>`;
        out +=`<div class="cost">${data[key].cost} РУБ</div>`;
        out +=`<button class="add-to-cart" data-id="${key}">Купить</button>`;
        out +='</div>';
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
    var out="";
    for (var key in cart) {
        out += key + ' --- ' + cart[key] + '; ';
    }
    $('.mcart').html(out);
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

