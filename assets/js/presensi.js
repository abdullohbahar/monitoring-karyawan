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

$("#tambahPresensi").on("submit", function (e) {
	e.preventDefault();
	var data = $("#tambahPresensi").serialize();

	console.log(data);

	$.ajax({
		url: base_url + "/datapresensi/store",
		type: "POST",
		dataType: "json",
		data: data,
		success: function (response) {
			if ($.isEmptyObject(response.error)) {
				$(".print-error-msg").css("display", "none");
				var message = response.success;
				alertSuccess(message);
				$("#addModal").modal("hide");

				window.location = "";
			} else {
				$(".print-error-msg").css("display", "block");
				$(".print-error-msg").html(response.error);
			}
		},
	});
});

$("body").on("click", "#btnUpdatePresensi", function () {
	$("#modalUpdate").modal("show");

	var keterangan = $(this).data("keterangan");
	var id = $(this).data("id");

	$("#keterangan").val(keterangan);
	$("#id").val(id);
});

$("#updatePresensi").on("submit", function (e) {
	e.preventDefault();
	var data = $("#updatePresensi").serialize();

	// console.log(data);

	$.ajax({
		url: base_url + "/dataPresensi/update",
		data: data,
		type: "POST",
		dataType: "json",
		success: function (response) {
			var message = response.success;
			$("#addModal").modal("hide");
			alertSuccess(message);

			window.location = "";
		},
	});
});
