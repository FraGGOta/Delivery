var cart = {}; 

function loadCart() {
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
            showMainCart();  
    }
    else {
        $('.main-cart').html('Корзина пуста');
    }
}

function showMainCart() {
    if (!isEmpty(cart)) {
            $('.total').html(`Итого: ${0} рублей`);
            $('.main-cart').html('Корзина пуста');
    }
    else {
        $.post(
        "dataBase/function.php", 
        { 
            "action" : "loadGoods"      
        },

    function(data) {
        var goods = JSON.parse(data);
        console.log(goods);
        var out = '';
        var total = 0;
            for (var id in cart) {  
                out += '<div class="main-cart">';
                out += `<img class="imgss" src = "images\\${goods[id].img}">`;
                out += `<p class="name">${goods[id].name}</p>`;
                out += `<button data-id="${id}" class="minus-goods">-</button>`;
                out += `${cart[id]}`;
                out += `<button data-id="${id}" class="plus-goods">+</button>`;
                out += `<div class="cost">${goods[id].cost * cart[id]} РУБ </div>`;
                out += `<button data-id="${id}" class="del-goods">x</button>`;
                total += goods[id].cost * cart[id];
                out += '</div>';
            }
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
            $('.total').html(`Итого: ${total} рублей`);
        });
    }
}

function delGoods() {
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showMainCart();   
}

function plusGoods() {
    var id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showMainCart();   
}

function minusGoods() {
    var id = $(this).attr('data-id');
    if (cart[id] == 1) {
        delete cart[id];
    }
    else {
        cart[id]--;
    }
    saveCart();
    showMainCart();   
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function isEmpty(object) {
    for (var key in object)
    if (object.hasOwnProperty(key)) return true;
    return false;
}

 function isCheck() {
    var mail = document.getElementById("mail").value;
    var number = document.getElementById("number").value;
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;

    var mail_reg = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
    var number_reg = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i;
    var name_reg = /^[a-zA-Zа-яёА-ЯЁ]+$/u;
    var address_reg = /[\p{Alpha}\p{M}\p{Nd}\p{Pc}\p{Join_C}]/gu;

    if (mail_reg.test(mail) && number_reg.test(number) && name_reg.test(name) && address_reg.test(address)) return true;
        return false;
}

function sendEmail() {
    var name = $('#name').val();
    var address = $('#address').val();
    var number = $('#number').val();
    var mail = $('#mail').val();

    if (isCheck()) {
        if (isEmpty(cart)) {
            $.post(
                "mail/mail.php",
                {
                    "name" : name,
                    "address" : address,
                    "number" : number,
                    "mail" : mail,
                    "cart" : cart
                },
                function (result) {
                    console.log(result)
                }
            );
            alert('Заказ отправлен');
            localStorage.clear();
        } 
        else {
                alert('Корзина пуста');
            } 
    } 
    else {
        alert('Заполните поля верно');
    }
}

$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail);
});