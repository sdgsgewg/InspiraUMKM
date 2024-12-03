// Mengirim data ke server tanpa memuat ulang halaman
$("#payment-form").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: $(this).attr("action"),
        method: "POST",
        data: formData,
        success: function (response) {
            // Tampilkan token Snap dan redirect ke halaman pembayaran
            $("#payment-form").hide();
            $("#payment-success").html("Payment Token: " + response.snap_token);
            window.location.href = "/payment/" + response.snap_token;
        },
    });
});
