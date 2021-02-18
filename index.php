<!DOCTYPE html>
<html>
<head>
	<title>test avec nodejs</title>
</head>
<body>
	<div class='get_info'>
		<ul>
			
		</ul>
	</div>
</body>
<script src="node_modules/socket.io-client/dist/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
$.get('http://localhost:3000', {}, function(response){
	$.each(response, function(index, el)
	{
		console.log(index, el)
		$('.get_info > ul').append('<li>titre : ' + el.title + ', description : ' + el.description + ', prix : <input type="number" class="price" id="' + el._id + '" value="' + el.price + '">€</li>')
	});
});

var socket = io('http://localhost:3000');

$(document).on('change', '.price', function()
{
	var price = $(this).val();
	var id = $(this).attr('id');
	var message = {change_price:'', price:price, id:id};
	socket.emit('change_price', message);
});

socket.on('change_price', function(msg) {
   $('#' + msg.id).val(msg.price);
});


socket.on('chat message', function(msg) {
   console.log(msg);
});

// socket.emit('chat message', 'Hello');

</script>
</html>