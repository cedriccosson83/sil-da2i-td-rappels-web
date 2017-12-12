/**
 * Created by c15009594 on 05/12/17.
 */

$(document).ready(function() {

	$('button#delete_pers_1').click(function () {
		alert($(this).attr('id'));
		alert('ok');
		console.log('test');
	});

	$("#form_add_pers").submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "/Model/treat_data.php",
			data: $(this).serialize(),
			dataType: "json",
			success : function(data) {
				for(key in data){
				    $("#request_result_insert .success").html(data[key]);
				}
				$('.success').css("display", "block");
			},
			error : function (xhr, status, error) {
    			$("#request_result_insert .error").html(xhr.responseText);
				$('.error').show();
			}
    	});
	});



	$('#form_update').submit(function(e) {

    	e.preventDefault();
		var form_result = $(this).serializeArray();
		var id_personnage = form_result[0].value;

		var form = $('<form />');
		form
			.attr("method", "post")
			.attr("id", "form_valid_update")
			.addClass("form_template");

		var input_id = $('<input />');
		input_id
			.attr('type', 'hidden')
			.attr('name', 'id')
			.attr('value', id_personnage);
		
		form.append(input_id);

		var personnage_infos = [];

		$.ajax({
			type: "POST",
			url: "/Model/get_pers_infos_ajax.php",
			data: "id="+id_personnage,
			dataType: "json",
			success : function(data) {
				for(key in data){
				    personnage_infos[key] = data[key];
				}

				var p = personnage_infos[0];

				var label_nom = $('<label />').attr('for', 'nom').html('Nom');
				var label_prenom = $('<label />').attr('for', 'prenom').html('Prénom');
				var label_date = $('<label />').attr('for', 'date').html('Date de naissance');
				var label_bio = $('<label />').attr('for', 'biographie').html('Biographie');

				var input_nom = $('<input />');
				input_nom
					.attr('type', 'text')
					.attr('name', 'nom')
					.addClass("form_input_text")
					.attr('value', p["nom"]);

				var input_prenom = $('<input />');
				input_prenom
					.attr('type', 'text')
					.attr('name', 'prenom')
					.addClass("form_input_text")
					.attr('value',  p["prenom"]);

				var input_date = $('<input />');
				input_date
					.attr('type', 'text')
					.attr('name', 'date')
					.addClass("form_input_text")
					.attr('value',  p["date"]);

				var text_bio = $('<textarea />');
				text_bio
					.attr('name', 'bio')
					.addClass("form_textarea")
					.html(p["bio"]);
			
				var button = $('<button />');
				button
					.attr('type', 'button')
					.attr('id',  'submit_btn_update_form')
					.addClass('black_btn elm_center')
					.click(function () {
						$.ajax({
							type: "POST",
							url: "/Model/udpate_data_ajax.php",
							data: $("#form_valid_update").serialize(),
							dataType: "json",
							success : function(data) {
								var result = false;
								for(key in data)
								    if(data[key])
								    	result = true;
								
							    if (result) {

							    	var success_msg = $('<div />');
							    	success_msg
							    		.css({
										    "padding": "20px",
										    "text-align": "center",
										    "background-color" : "#81C784",
										    "color" : "white",
										    "font-weight": "bold"
										})
										.html("Le personnage à été modifié avec succès !");

							    	$('#form_update_pers').html(success_msg);

							    }
							    else {
							    	alert("FAILYURE");
							    }
							},
							error : function (xhr, status, error) {
				    			$("#request_result_insert .error").html(xhr.responseText);
								$('.error').show();
							}
				    	});
					})
					.html('Valider ces modifications');

				form
					.append(label_nom)
					.append(input_nom)

					.append(label_prenom)
					.append(input_prenom)

					.append(label_date)
					.append(input_date)

					.append(label_bio)
					.append(text_bio)

					.append("<br/>")
					.append(button);
				
			},
			error : function (xhr, status, error) {
    			$("#request_result_update .error").html(xhr.responseText);
				$('.error').show();
			}
    	});
				

		$('#form_update_pers').html(form);
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

			var table = $('<table />');


			table.append("<tr> <th>Id</th> <th>Nom</th> <th>Prénom</th> <th>Date de naissance</th> <th>Supprimer ?</th></tr>")

			var finished = false;

			for (var i = 0; i < table_pers.length; ++i) {
				var value = table_pers[i];
				var tr = $('<tr/>');
				var td_id = $('<td/>');
				var td_nom = $('<td/>');
				var td_prenom = $('<td/>');
				var td_date = $('<td/>');
				var button = $('<button />');
				td_id.append(value.id);
				td_nom.append(value.nom);
				td_prenom.append(value.prenom);
				td_date.append(value.date);
				button
					.addClass('black_btn delete')
					.attr('id','delete_pers_' + value.id)
					.html("Supprimer")
					.click(function(){ delete_personnage($(this)); });

				tr
					.append(td_id)
					.append(td_nom)
					.append(td_prenom)
					.append(td_date)
					.append(button);

				table.append(tr);

			}
			
			$('#delete_pers').append(table);
		},
		error : function (xhr, status, error) {
			$("#request_result .error").html(xhr.responseText);
			$('.error').show();
		}
	});

    $('#delete_pers').fadeIn(300);

	function delete_personnage (button) {
		var id = button.attr('id').substr(12);

		$.ajax({
			type: "POST",
			url: "/Model/delete_pers_ajax.php",
			data: 'id=' + id,
			dataType: "json",
			success : function(data) {
			
				for(key in data){
					var message;
					message = data[key];
					remove_pers_from_front(id);
					break;
				}
			},
			error : function (xhr, status, error) {
				$("#request_result .error").html(xhr.responseText);
				$('.error').show();
			}
		});
	}

	function remove_pers_from_front(id) {
		var element = $('#delete_pers_'+ id).parent();
		element.fadeOut(200);
		var td = $('<td />');
		var new_td = $('<td />');
		new_td
			.html("element supprimé !")
			.css({"background-color": "#66BB6A"});

		var new_td1 = $('<td />');
		new_td1.css({"background-color": "#66BB6A", "border-right": "1px solid #66BB6A"});

		var new_td2 = $('<td />');
		new_td2.css({"background-color": "#66BB6A", "border-right": "1px solid #66BB6A"});

		var new_td3 = $('<td />');
		new_td3.css({"background-color": "#66BB6A", "border-right": "1px solid #66BB6A"});

		var new_td4 = $('<td />');
		new_td4.css({"background-color": "#66BB6A"});

		element
			.empty()			
			.append(new_td)
			.append(new_td1)
			.append(new_td2)
			.append(new_td3)
			.append(new_td4);

		element.fadeIn(200);

	}
    

	    
});
