$(document).ready(main);

function main() {

	$('.edit_item').click(function(){
		
	var modal = $('.modal-content');
	var card = $(this).parents('.card');
	var nameItem = card.find('.card_name').text();
	var descriptionItem = card.find('.card_description').text();
	var priceItem = card.find('.card_price').text().slice(0, -1);
	var imageItem = card.find('.card_image').attr('src');
	var id = $(this).attr("name").split("_")[0];

		modal.find('#item-name').val(nameItem);
		modal.find('#item-price').val(priceItem);
		modal.find('#item-description').val(descriptionItem);
		modal.find('#item-thumbnail').css("background-image","url(" + imageItem + ")");
		modal.find('#item-check').val(id);
	});

	$('.add-item').click(function(){
		var modal = $('.modal-content');
		modal.find('input').val('');
		modal.find('textarea').val('');
		modal.find('#item-thumbnail').css("background-image", "none");
	});

	$('#item-image').change(function() {
		readURL(this);
	});

	// Fuente: http://stackoverflow.com/questions/18457340/how-to-preview-selected-image-in-input-type-file-in-popup-using-jquery/18457508
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#item-thumbnail').css('background-image', 'url(' + e.target.result + ')');
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

}