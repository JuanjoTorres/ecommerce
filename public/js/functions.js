function find_item(permission) {
	
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			xmldoc = xmlhttp.responseXML;
			var source = "";
			codes = xmldoc.getElementsByTagName("CODE");
			names = xmldoc.getElementsByTagName("NAME");
			descriptions = xmldoc.getElementsByTagName("DESCRIPTION");
			prices = xmldoc.getElementsByTagName("PRICE");
			images = xmldoc.getElementsByTagName("IMAGE");

			if(permission != 2) {

				for(i = 0; i < codes.length; i++) {

					source += '<div class="col-xs-4"><div class="card"><img class="card-img-top card_image" src="'
				   		+ images[i].innerHTML + '" alt="Card Image"><div class="card-block"><div class="card-title"><div class="pull-xs-right"><h4 class="text-muted card_price">'
				   		+ prices[i].innerHTML + '€</h4></div><h4 class="card-title card_name">'
				   		+ names[i].innerHTML + '</h4></div><p class="card-text card_description">'
				   		+ descriptions[i].innerHTML + '</p><div class="text-xs-center"><button id="'
				   		+ codes[i].innerHTML + '"class="btn btn-success to-car">Buy</button></div></div></div></div>';

			   	}

			} else {

				for(i = 0; i < codes.length; i++) {

					source += '<div class="col-xs-4"><div class="card"><img class="card-img-top card_image" src="'
				   		+ images[i].innerHTML + '" alt="Card Image"><div class="card-block"><div class="card-title"><div class="pull-xs-right"><h4 class="text-muted card_price">'
				   		+ prices[i].innerHTML + '€</h4></div><h4 class="card-title card_name">'
				   		+ names[i].innerHTML + '</h4></div><p class="card-text card_description">'
				   		+ descriptions[i].innerHTML + '</p><div class="text-xs-right"><button class="btn btn-secondary edit_item" name="'
				   		+ codes[i].innerHTML + '_modify" data-toggle="modal" data-target="#item-modal">Editar</button><form method="POST"><button class="btn btn-warning" name="'
				   		+ codes[i].innerHTML + '_delete">Eliminar</button></form></div></div></div></div>';

			   	}

			}
			

			document.getElementById("cards").innerHTML = source;

		}    

	}

	xmlhttp.open("POST","../models/AjaxItemsFinder.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("searching=" + document.getElementById("searching-item").value);
	
}

function find_user() {
	
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			xmldoc = xmlhttp.responseXML;
			var source = "";
			ids = xmldoc.getElementsByTagName("IDUSER");
			passwords = xmldoc.getElementsByTagName("PASSWORD");
			firstnames = xmldoc.getElementsByTagName("FIRSTNAME");
			lastnames = xmldoc.getElementsByTagName("LASTNAME");
			emails = xmldoc.getElementsByTagName("EMAIL");
			permissions = xmldoc.getElementsByTagName("PERMISSION");

			for(i = 0; i < ids.length; i++) {

				source += '<tr><th scope="row">' 
					+ (i + 1) + '</th><td>' 
					+ ids[i].innerHTML + '</td><td>' 
					+ passwords[i].innerHTML + '</td><td>' 
					+ firstnames[i].innerHTML + '</td><td>' 
					+ lastnames[i].innerHTML + '</td><td>' 
					+ emails[i].innerHTML + '</td><td>' 
					+ permissions[i].innerHTML + '</td><td><button type="submit" name="' 
					+ ids[i].innerHTML + '_change" class="btn btn-secondary">Cambiar rol</button></td><td><button type="submit" name="' 
					+ ids[i].innerHTML + '_modify" class="btn btn-secondary">Editar</button></td><td><button type="submit" name="' 
					+ ids[i].innerHTML + '_delete" class="btn btn-warning">Banear</button></td></tr>';

		   	}

			document.getElementById("users-rows").innerHTML = source;

		}    

	}

	xmlhttp.open("POST","../models/AjaxUsersFinder.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("searching=" + document.getElementById("searching-user").value);
	
}