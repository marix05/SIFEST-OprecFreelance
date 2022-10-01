$(document).ready(function () {
    // Data Tablee
    $(document).ready(function () {
        $("#datatable").DataTable();

        $("#datatable").parent().parent().addClass("responsive_table");
    });

    $("#toast").hide().fadeIn();
    setTimeout(() => {
        $("#toast").fadeOut();
    }, 5000);
    setTimeout(() => {
        $("#toast").remove();
    }, 6000);

    $("#datatable tbody").delegate(".img_modal_toggle", "click", function () {
        const src = $(this).attr("src");
        $("#identifier_img").attr("src", src);
        $("#identifier_img_modal").modal("show");
    });

    $("#datatable tbody").delegate(".delete_btn_modal", "click", function () {
        var user_id = $(this).val();
        $("#delete_modal").modal("show");

        $.ajax({
            type: "GET",
            url: "/sifest2022/admin/user/" + user_id,
            success: function (response) {
                $("#delete_modal #delete_name").val(response.user.name);
                $("#delete_modal #delete_NIM").val(response.user.NIM);
            },
        });
    });

    $("#datatable tbody").delegate(".edit_btn_modal", "click", function () {
        $("#edit_modal #edit_interview").children().attr("selected", false);
        $("#edit_modal #edit_password").val("");
        var user_id = $(this).val();
        $("#edit_modal").modal("show");

        $.ajax({
            type: "GET",
            url: "/sifest2022/admin/user/" + user_id,
            success: function (response) {
                $("#edit_modal #edit_name").val(response.user.name);
                $("#edit_modal #edit_NIM").val(response.user.NIM);

                $("#edit_modal #edit_interview")
                    .children("option[value='" + response.user.interview + "']")
                    .attr("selected", true);
            },
        });
    });

    $("#datatable tbody").delegate(".recruit_btn_modal", "click", function () {
        $("#recruit_result").children().attr("selected", false);
        var user_id = $(this).val();
        $("#recruit_modal").modal("show");

        $.ajax({
            type: "GET",
            url: "/sifest2022/admin/user/" + user_id,
            success: function (response) {
                $("#recruit_modal #recruit_name").val(response.user.name);
                $("#recruit_modal #recruit_NIM").val(response.user.NIM);

                $("#recruit_modal #recruit_first_choice")
                    .text(response.user.first_choice)
                    .val(response.user.first_choice)
                    .attr("selected", true);

                $("#recruit_modal #recruit_second_choice")
                    .text(response.user.second_choice)
                    .val(response.user.second_choice);
            },
        });
    });

    $("#datatable tbody").on(
        "click",
        ".cancel_recruitment_btn_modal",
        function () {
            var user_id = $(this).val();
            $("#cancel_recruitment_modal").modal("show");

            $.ajax({
                type: "GET",
                url: "/sifest2022/admin/user/" + user_id,
                success: function (response) {
                    $("#cancel_recruitment_modal #cancel_name").val(
                        response.user.name
                    );
                    $("#cancel_recruitment_modal #cancel_NIM").val(
                        response.user.NIM
                    );
                },
            });
        }
    );

    $("#datatable tbody").delegate(".detail_btn_modal", "click", function () {
        var user_id = $(this).val();
        $("#detail_modal").modal("show");

        $.ajax({
            type: "GET",
            url: "/sifest2022/admin/user/" + user_id,
            success: function (response) {
                $("#detail_modal #detail_identifier").attr(
                    "src",
                    "/KRS_KPM/" + response.user.identifier
                );
                $("#detail_modal #detail_name").val(response.user.name);
                $("#detail_modal #detail_NIM").val(response.user.NIM);
                $("#detail_modal #detail_email").val(response.user.email);
                $("#detail_modal #detail_class").val(response.user.class);
                $("#detail_modal #detail_domicile").val(response.user.domicile);
                $("#detail_modal #detail_interview").val(
                    response.user.interview
                );
                $("#detail_modal #detail_first_choice").val(
                    response.user.first_choice
                );
                $("#detail_modal #detail_first_reason").text(
                    response.user.first_reason
                );
                $("#detail_modal #detail_second_choice").val(
                    response.user.second_choice
                );
                $("#detail_modal #detail_second_reason").text(
                    response.user.second_reason
                );
            },
        });
    });

    $("#datatable #edit_password").on("change, keyup", function () {
        let password = $(this).val();
        let error_msg = $(this).parent().find(".error_msg p");

        // regex validation
        if (!/^(.{8,20}$)/.test(password)) {
            error_msg.html("Password must be between 8 to 20 characters long.");
        } else if (!/^(?=.*[A-Z])/.test(password)) {
            error_msg.html("Password must contain at least one uppercase.");
        } else if (!/^(?=.*[a-z])/.test(password)) {
            error_msg.html("Password must contain at least one lowercase.");
        } else if (!/^(?=.*[0-9])/.test(password)) {
            error_msg.html("Password must contain at least one digit.");
        } else {
            error_msg.html("");
        }

        // empty fill
        if (password === "") {
            error_msg.html("");
        }
    });
});
