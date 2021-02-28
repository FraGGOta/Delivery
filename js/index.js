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
 	else {
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
	timer = setTimeout(function() 
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