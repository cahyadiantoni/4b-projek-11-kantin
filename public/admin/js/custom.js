$(document).ready(function () {
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        // alert(curent_password);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-admin-password",
            data: { current_password: current_password },
            success: function (resp) {
                if (resp == "false") {
                    $("#check_password").html(
                        "<font color='red'>Passwordmu salah!</font>"
                    );
                } else if (resp == "true") {
                    $("#check_password").html(
                        "<font color='green'>Passwordmu benar!</font>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});
