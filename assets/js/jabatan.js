$("#tambahJabatan").on("submit", function (e) {
	e.preventDefault();

	var data = $("#tambahJabatan").serialize();

	$.ajax({
		url: base_url + "/datajabatan/store",
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

$("body").on("click", "#btnUpdateJabatan", function () {
	$("#modalEdit").modal("show");

	var id = $(this).data("id");

	$.ajax({
		url: base_url + "/dataJabatan/getJabatan/" + id,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status == 200) {
				$("#idJabatan").val(response.data[0].idJabatan);
				$("#nama_jabatan").val(response.data[0].nama_jabatan);
			}
		},
	});
});

$("#updateJabatan").on("submit", function (e) {
	e.preventDefault();

	var data = $("#updateJabatan").serialize();

	$.ajax({
		url: base_url + "/dataJabatan/update",
		type: "POST",
		dataType: "json",
		data: data,
		success: function (response) {
			if ($.isEmptyObject(response.error)) {
				$(".print-error-msg-edit").css("display", "none");
				var message = response.success;
				alertSuccess(message);
				$("#addModal").modal("hide");

				window.location = "";
			} else {
				$(".print-error-msg-edit").css("display", "block");
				$(".print-error-msg-edit").html(response.error);
			}
		},
	});
});

$("body").on("click", "#deleteButtonJabatan", function () {
	Swal.fire({
		title: "Apakah Kamu Benar-Benar Ingin Menghapus Data Ini?",
		text: "Kamu Tidak Dapat Mengembalikan Data Jika Telah Dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya Hapus!",
	}).then((result) => {
		if (result.isConfirmed) {
			var id = $(this).data("id");
			$.ajax({
				url: base_url + "/dataJabatan/destroy/" + id,
				dataType: "json",
				type: "POST",
				success: function (response) {
					var message = response.success;
					alertSuccess(message);

					window.location = "";
				},
			});
		}
	});
});
