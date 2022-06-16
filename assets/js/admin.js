$("#tambahAdmin").on("submit", function (e) {
	e.preventDefault();

	var data = $("#tambahAdmin").serialize();

	$.ajax({
		url: base_url + "/dataAdmin/store",
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

$("body").on("click", "#btnUpdateAdmin", function () {
	$("#modalEdit").modal("show");

	var id = $(this).data("id");

	$.ajax({
		url: base_url + "/DataAdmin/getAdmin/" + id,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status == 200) {
				$("#idAdmin").val(response.data[0].idAdmin);
				$("#email").val(response.data[0].email);
			}
		},
	});
});

$("#updateAdmin").on("submit", function (e) {
	e.preventDefault();

	var data = $("#updateAdmin").serialize();

	$.ajax({
		url: base_url + "/dataAdmin/update",
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

$("body").on("click", "#deleteButtonAdmin", function () {
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
				url: base_url + "/dataAdmin/destroy/" + id,
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
