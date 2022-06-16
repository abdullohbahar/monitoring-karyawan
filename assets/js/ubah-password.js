$("#ubahPassword").on("submit", function (e) {
	e.preventDefault();

	var data = $("#ubahPassword").serialize();

	$.ajax({
		url: base_url + "/profil/ubahPassword",
		type: "POST",
		dataType: "json",
		data: data,
		success: function (response) {
			var message = response.success;
			alertSuccess(message);

			document.getElementById("password").value = "";
		},
	});
});
