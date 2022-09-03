$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
    },
});

// Wait until document is ready
$(document).ready(function () {
    const inputs = document.querySelectorAll(".input");

    inputs.forEach((input) => {
        if (input.value) {
            input.parentNode.parentNode.classList.add("focus");
        }

        input.addEventListener("focus", function () {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        });

        input.addEventListener("blur", function () {
            let parent = this.parentNode.parentNode;
            if (!this.value) {
                parent.classList.remove("focus");
            }
        });
    });

    $(".password_visibility").click(function () {
        $(this).toggleClass("fa-eye");
        $(this).toggleClass("fa-eye-slash");

        const type_check =
            $(this).parent().find("input").attr("type") === "password"
                ? "text"
                : "password";
        $(this).parent().find("input").attr("type", type_check);
    });

    $("#phone_number").on("change, keyup", function () {
        let phone_number = $(this).val();
        let error_msg = $(this).parent().parent().parent().find(".error_msg p");

        if (password === "") {
            error_msg.html("");
        }
    });

    $("#password").on("change, keyup", function () {
        let password = $(this).val();
        let error_msg = $(this).parent().parent().parent().find(".error_msg p");

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

        if (password === "") {
            error_msg.html("");
        }
    });

    $("#password_confirmation").on("change, keyup", function () {
        let password = $("#password").val();
        let password_confirmation = $(this).val();
        let error_msg = $(this).parent().parent().parent().find(".error_msg p");

        if (password !== password_confirmation) {
            error_msg.html("Password confirmation does not match");
        } else {
            error_msg.html("");
        }

        if (password_confirmation === "") {
            error_msg.html("");
        }
    });

    $(".input_interview").on("change", function () {
        if ($(this).val() === "Indralaya") {
            $("#interview_timeline").html(
                "Jumat, <span class='fw_bold fc_red'>23 Sepetember 2022</span>  Fasilkom Indralaya"
            );
        } else if ($(this).val() === "Palembang") {
            $("#interview_timeline").html(
                "Sabtu, <span class='fw_bold fc_red'>24 Sepetember 2022</span>  Fasilkom Palembang"
            );
        }
    });

    $(".division_select").change(function () {
        $("#first_choice, #second_choice")
            .not(this)
            .children("option[value='" + this.value + "']")
            .attr("disabled", true)
            .siblings()
            .removeAttr("disabled");

        $(this)
            .parent()
            .parent()
            .parent()
            .next()
            .find(".input_info")
            .html(
                "Alasan anda memilih divisi <span class='fw_bold fc_red'>" +
                    this.value +
                    "</span>"
            );
    });

    // navs tabs
    $(".form_navs a").click(function () {
        const id = $(this).data("id");
        console.log(id);
        if (!$(this).hasClass("active")) {
            $(".form_navs a").removeClass("active");
            $(this).addClass("active");

            $(".form_tab").hide();
            $(`[data-content=${id}]`).fadeIn();
        }
    });

    $(".type_navs a").click(function () {
        const id = $(this).data("id");
        console.log(id);
        if (!$(this).hasClass("active")) {
            $(".type_navs a").removeClass("active");
            $(this).addClass("active");

            $(".type_tab").hide();
            $(`[type-content=${id}]`).fadeIn();
        }
    });

    // alert
    $(".alert_toggle").click(function () {
        $(".alert").remove();
    });

    setTimeout(() => {
        $(".alert").remove();
    }, 8000);
});
