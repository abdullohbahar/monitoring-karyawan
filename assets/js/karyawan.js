$("#tambahKaryawan").on("submit", function (e) {
	e.preventDefault();

	var data = $("#tambahKaryawan").serialize();

	$.ajax({
		url: base_url + "/dataKaryawan/store",
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

$("body").on("click", "#btnUpdate", function () {
	$("#modalEdit").modal("show");

	var id = $(this).data("id");

	$.ajax({
		url: base_url + "/DataKaryawan/getKaryawan/" + id,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status == 200) {
				console.log(response);
				$("#idKaryawan").val(response.data[0].idKaryawan);
				$("#nama").val(response.data[0].nama);
				$("#alamat").val(response.data[0].alamat);
				$("#email").val(response.data[0].email);
				$("#no_hp").val(response.data[0].no_hp);
				$("#jabatan").val(response.data[0].idJabatan);
				$("#nik").val(response.data[0].nik);
				$("#status").val(response.data[0].status);
			}
		},
	});
});

$("#updateKaryawan").on("submit", function (e) {
	e.preventDefault();

	var data = $("#updateKaryawan").serialize();

	$.ajax({
		url: base_url + "/dataKaryawan/update",
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

$("body").on("click", "#deleteButton", function () {
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
				url: base_url + "/dataKaryawan/destroy/" + id,
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
