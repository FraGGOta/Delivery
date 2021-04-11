$('.login-btn').click(function (e) 
{
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax
    ({
        url: 'auth/signin.php',
        type: 'POST',
        dataType: 'json',
        data: 
        {
            login: login,
            password: password
        },
        success(data) 
        {

            if (data.status) 
            {
                if (data.type == 'admin')
                    document.location.href = '/admin.php';
                else
                    document.location.href = '/profile.php';
            }
            else 
            {
                if (data.type === 1) 
                {
                    data.fields.forEach(function (field) 
                    {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }
        }
    });

});

$('.register-btn').click(function (e) 
{
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('name', name);
    formData.append('email', email);

    $.ajax
    ({
        url: 'auth/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) 
        {
            if (data.status) 
            {
                document.location.href = '/auth.php';
            }
            else 
            {
                if (data.type === 1) 
                {
                    data.fields.forEach(function (field) 
                    {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});

$('.recovery-btn').click(function (e) 
{
    e.preventDefault();

    $(`input`).removeClass('error');

    let email = $('input[name="email"]').val();
        
    $.ajax
    ({
        url: 'auth/restore.php',
        type: 'POST',
        dataType: 'json',
        data:
        {
            email: email,
        },
        success(data) 
        {
            if (data.type === 1) 
            {
                data.fields.forEach(function (field) 
                {
                    $(`input[name="${field}"]`).addClass('error');
                });
            }

            $('.msg').removeClass('none').text(data.message);
        }
    });
});