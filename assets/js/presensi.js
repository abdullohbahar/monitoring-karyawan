$("#absenMasuk").on("click", function (e) {
	e.preventDefault();

	$.ajax({
		url: base_url + "/dataPresensiKaryawan/presensiMasuk",
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

$("#absenPulang").on("click", function (e) {
	e.preventDefault();

	$.ajax({
		url: base_url + "/dataPresensiKaryawan/presensiPulang",
		// type: "POST",
		dataType: "json",
		// data: data,
		success: function (response) {
			if ($.isEmptyObject(response.error)) {
				var message = response.success;
				alertSuccess(message);

				$("#absenPulang").attr("hidden", true);
			}
		},
	});
});
