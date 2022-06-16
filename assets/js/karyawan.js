$("#tambahKaryawan").on("submit", function (e) {
	e.preventDefault();

	var data = $("#tambahKaryawan").serialize();

	console.log(data);

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
