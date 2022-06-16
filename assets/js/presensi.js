$("#absenMasuk").on("click", function (e) {
	e.preventDefault();

	$.ajax({
		url: base_url + "/dataPresensi/presensiMasuk",
		// type: "POST",
		dataType: "json",
		// data: data,
		success: function (response) {
			if ($.isEmptyObject(response.error)) {
				var message = response.success;
				alertSuccess(message);

				$("#absenMasuk").attr("hidden", true);
			}
		},
	});
});
