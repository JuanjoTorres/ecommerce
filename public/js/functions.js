document.getElementById("searching").onkeyup = find_item; 

function find_item() {
	
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
			for(i = 0; i < codes.length; i++) {

				source += '<div class="col-xs-4"><div class="card"><img class="card-img-top" src="'
					+ images[i].innerHTML + '" alt="Card Image"><div class="card-block"><div class="card-title"><div class="pull-xs-right"><h4 class="text-muted">'
					+ prices[i].innerHTML + '€</h4></div><h4 class="card-title">'
					+ names[i].innerHTML + '</h4></div><p class="card-text">'
					+ descriptions[i].innerHTML + '</p><div class="text-xs-center"><a class="btn btn-success " href="#">Buy</a></div></div></div></div>';

		   	}

			document.getElementById("cards").innerHTML = source;

		}    

	}

	xmlhttp.open("POST","../models/AjaxItemsFinder.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("searching=" + document.getElementById("searching").value);
	
	
}