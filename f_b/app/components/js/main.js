
var ICR = {
    ui: {
        modal: function (what) {
            var str = `.modal[id="${what}"]`;
   
            if ($(str).hasClass("show_active")) {
                 $(str).removeClass("show_active");
            } else {
                $(`.login_modal`).removeClass("show_active");

                $(str).addClass("show_active");

            }
        }
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