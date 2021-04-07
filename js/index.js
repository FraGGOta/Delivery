autoSlider();

var timer;
var images = document.querySelectorAll('.slide img');
var current = 2;

function slider() 
{
	for (let i = 0; i < images.length; i++) 
	{
		images[i].classList.add('opacity0');
	}
	images[current].classList.remove('opacity0');
}

slider();

document.querySelector('.right').onclick = function () 
{
	if (current - 1 == - 1) 
	{
		current = images.length - 1;
	}
	else 
	{
		current--;
	}

	slider();
};

document.querySelector('.left').onclick = function () 
{
	if (current + 1 == images.length) 
	{
		current = 0;
	}
	else 
	{
		current++;
	}

	slider();
};

function autoSlider() 
{
	timer = setTimeout(function () 
	{
		for (let i = 0; i < images.length; i++)
		{
			images[i].classList.add('opacity0');
		}
		images[current].classList.remove('opacity0');

		if (current + 1 == images.length) 
		{
			current = 0;
		}
		else 
		{
			current++;
		}

		slider();
		autoSlider();

	}, 5000);
}

function openForm() 
{
	document.getElementById("myForm").style.display = "block";
}

function closeForm() 
{
	document.getElementById("myForm").style.display = "none";
}

$('.send-email').click(function (e) 
{
	e.preventDefault();

	$(`input`).removeClass('error');
	$(`textarea`).removeClass('error');

	var name = $('#name').val();
	var report = $('#report').val();
	var number = $('#number').val();
	var mail = $('#mail').val();

	$.ajax
	({
		method: "POST",
		url: "/mail/support.php",
		dataType: "json",
		data:
		{
			"name": name,
			"report": report,
			"number": number,
			"mail": mail,

		},
		success: function (response) 
		{
			if (response.status)
			{
				$('.msg').removeClass('none').text('Сообщение отправлено');
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
});
