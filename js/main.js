function slider() {
    $('.next').click(function() {
		var currentImage = $('.block.curry');
		var currentImageIndex = $('.block.curry').index();
		var nextImageIndex = currentImageIndex + 1;
		var nextImage = $('.block').eq(nextImageIndex);
		currentImage.fadeOut(1000);
		currentImage.removeClass('curry');

		if(nextImageIndex == ($('.block:last').index()+1)) {
			$('.block').eq(0).fadeIn(1000);
			$('.block').eq(0).addClass('curry');
		} else {
			nextImage.fadeIn(1000);
			nextImage.addClass('curry');
		}
	});

	$('.previous').click(function() {
		var currentImage = $('.block.curry');
		var currentImageIndex = $('.block.curry').index();
		var prevImageIndex = currentImageIndex - 1;
		var prevImage = $('.block').eq(prevImageIndex);
		currentImage.fadeOut(1000);
		currentImage.removeClass('curry');
		prevImage.fadeIn(1000);
		prevImage.addClass('curry');
    });
}

$(document).ready(function () {
    slider();
});
