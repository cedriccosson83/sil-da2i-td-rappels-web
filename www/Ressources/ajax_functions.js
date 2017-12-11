/**
 * Created by c15009594 on 05/12/17.
 */

$(document).ready(function() {

	$("#form_add_pers").submit(function () {

		//var form = $('#form_add_pers');

		$.ajax({
			type: "POST",
			url: "/Model/treat_data.php",
			data: $(this).serialize(),
			dataType: "json",
			success : function(data) {
				for(key in data){
				    $("#request_result .success").html(data[key]);
				}
				$('.success').show();
			},
			error : function (xhr, status, error) {
    			$("#request_result .error").html(xhr.responseText);
				$('.error').show();
			}
    	});
	});

	

	var table_pers = [];

	$.ajax({
		type: "POST",
		url: "/Model/get_pers_ajax.php",
		dataType: "json",
		success : function(data) {
			var personnages = data['personnages'];

			for(key in personnages){
			    table_pers[key] = personnages[key];
			}

			$('#delete_pers').append("<table><tr> <th>Id</th> <th>Nom</th> <th>Prénom</th> <th>Date de naissance</th> <th>Supprimer ?</th></tr>")

			var finished = false;

			for (var i = 0; i < table_pers.length; ++i) {
				var value = table_pers[i];
				$('#delete_pers').append("<table><tr><td> " + value.id + " </td><td> " + value.nom + " </td><td> " + value.prenom + " </td><td> " + value.date + " </td><td> <button class='black_btn' id='delete_pers_"+value.id+"'> Supprimer</button> </td></tr></table>");

			}

			$('#delete_pers').append("</table>");

			console.log(table_pers);
		},
		error : function (xhr, status, error) {
			$("#request_result .error").html(xhr.responseText);
			$('.error').show();
		}
	});

    $('#delete_pers').fadeIn(300);
	    
});