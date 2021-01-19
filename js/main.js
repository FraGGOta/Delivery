function slider() {
    $('.next').click(function() {
		var currentImage = $('.image.curry');
		var currentImageIndex = $('.image.curry').index();
		var nextImageIndex = currentImageIndex + 1;
		var nextImage = $('.image').eq(nextImageIndex);
		currentImage.fadeOut(1000);
		currentImage.removeClass('curry');

		if(nextImageIndex == ($('.image:last').index()+1)) {
			$('.image').eq(0).fadeIn(1000);
			$('.image').eq(0).addClass('curry');
		} else {
			nextImage.fadeIn(1000);
			nextImage.addClass('curry');
		}
	});

	$('.previous').click(function() {
		var currentImage = $('.image.curry');
		var currentImageIndex = $('.image.curry').index();
		var prevImageIndex = currentImageIndex - 1;
		var prevImage = $('.image').eq(prevImageIndex);
		currentImage.fadeOut(1000);
		currentImage.removeClass('curry');
		prevImage.fadeIn(1000);
		prevImage.addClass('curry');
    });
}

$(document).ready(function () {
    slider();
});
