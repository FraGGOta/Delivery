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
        $.getJSON('goods.json', function (data) {
            var goods = data;
            var out = '';
            var total = 0;
            for (var id in cart) {  
                out +='<div class="main-cart">';
                out += `<img class="imgss" src = "images\\${goods[id].img}">`;
                out += `<p class="name">${goods[id].name}</p>`;
                out += `<button data-id="${id}" class="minus-goods">-</button>`;
                out += ` ${cart[id]}`;
                out += `<button data-id="${id}" class="plus-goods">+</button>`;
                out += `<div class="cost">${goods[id].cost * cart[id]} РУБ </div>`;
                out += `<button data-id="${id}" class="del-goods">x</button>`;
                total += goods[id].cost * cart[id];
                out +='</div>';
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

function sendEmail() {
    var ename = $('#ename').val();
    var eaddress = $('#eaddress').val();
    var etelephone = $('#etelephone').val();
    var eemail = $('#eemail').val();

    if (ename!='' && eaddress!='' && etelephone!='' && eemail !='') {
        if (isEmpty(cart)) {
            $.post(
                "core/mail.php",
                {
                    "ename" : ename,
                    "eaddress" : eaddress,
                    "etelephone" : etelephone,
                    "eemail" : eemail,
                    "cart" : cart
                },
                function(data) {
                    if (data==1) {
                        alert('Заказ отправлен');
                    }
                    else {
                        alert('Повторите заказ');
                    }
                }
            );
        }
        else {
                alert('Корзина пуста');
            }
    }
    else {
        alert('Заполните поля');
    }
}

$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail);
});