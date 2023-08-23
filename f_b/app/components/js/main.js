
var ICR = {
    user: {
        trigger: function (w) {
            $(`.input_image_file#${w}`).click();
        },
        imagepreview: function (event, w) {
            var output = document.querySelector(`.image_preview#${w}`);
            var reader = new FileReader();
            reader.onload = function (e) {
                output.src = e.target.result;
            }
            reader.readAsDataURL(event.files[0]);
        }
    },
    ui: {
        modal_close: function () {
            $(`.modal`).removeClass("show_active");
        },
        modal: function (what) {
            if (what == "CLOSE") {
                $(`.modal`).removeClass("show_active");
            } else {
                var str = `.modal[id="${what}"]`;

                if ($(str).hasClass("show_active")) {
                    $(str).removeClass("show_active");
                } else {
                    $(`.modal`).removeClass("show_active");

                    $(str).addClass("show_active");

                }

            }
        }
    },
    login_reg: function (w) {
        var data = {};
        if (w == "logout"){
            data = {
                what: w
            };
        }
        if (w == "login") {
            data = {
                what: w,
                email: $(".modal#login_modal #inputEmail").val(),
                password: $(".modal#login_modal #inputPassword").val(),
            };
        }

        if (w == "reg") {
            data = {
                what: w, 
                username: $(".modal#login_modal #inputUsername").val(),
                surname: $(".modal#login_modal #inputSurname").val(),
                email: $(".modal#login_modal #inputEmail").val(),
                password: $(".modal#login_modal #inputPassword").val(),
                address: $(".modal#login_modal #inputAdresse").val(),
                phone: $(".modal#login_modal #inputPhone").val() 
            };
        }

        $.ajax({
            type:"POST",
            url: "./?q=login_reg",
            data: data,
            success: function (res) {
                if (res == "YES") {
                    window.location.reload();
                }
            }

        });
    },
    url: function (page) {
        window.location.href = `./?p=${page}`
    },
    chatbot: {
        msg: function (R) {
            eval(`${R}`)
        }
    }
}