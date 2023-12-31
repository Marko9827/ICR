
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
    country: [
        { name: 'Afghanistan', code: 'AF' },
        { name: 'Åland Islands', code: 'AX' },
        { name: 'Albania', code: 'AL' },
        { name: 'Algeria', code: 'DZ' },
        { name: 'American Samoa', code: 'AS' },
        { name: 'AndorrA', code: 'AD' },
        { name: 'Angola', code: 'AO' },
        { name: 'Anguilla', code: 'AI' },
        { name: 'Antarctica', code: 'AQ' },
        { name: 'Antigua and Barbuda', code: 'AG' },
        { name: 'Argentina', code: 'AR' },
        { name: 'Armenia', code: 'AM' },
        { name: 'Aruba', code: 'AW' },
        { name: 'Australia', code: 'AU' },
        { name: 'Austria', code: 'AT' },
        { name: 'Azerbaijan', code: 'AZ' },
        { name: 'Bahamas', code: 'BS' },
        { name: 'Bahrain', code: 'BH' },
        { name: 'Bangladesh', code: 'BD' },
        { name: 'Barbados', code: 'BB' },
        { name: 'Belarus', code: 'BY' },
        { name: 'Belgium', code: 'BE' },
        { name: 'Belize', code: 'BZ' },
        { name: 'Benin', code: 'BJ' },
        { name: 'Bermuda', code: 'BM' },
        { name: 'Bhutan', code: 'BT' },
        { name: 'Bolivia', code: 'BO' },
        { name: 'Bosnia and Herzegovina', code: 'BA' },
        { name: 'Botswana', code: 'BW' },
        { name: 'Bouvet Island', code: 'BV' },
        { name: 'Brazil', code: 'BR' },
        { name: 'British Indian Ocean Territory', code: 'IO' },
        { name: 'Brunei Darussalam', code: 'BN' },
        { name: 'Bulgaria', code: 'BG' },
        { name: 'Burkina Faso', code: 'BF' },
        { name: 'Burundi', code: 'BI' },
        { name: 'Cambodia', code: 'KH' },
        { name: 'Cameroon', code: 'CM' },
        { name: 'Canada', code: 'CA' },
        { name: 'Cape Verde', code: 'CV' },
        { name: 'Cayman Islands', code: 'KY' },
        { name: 'Central African Republic', code: 'CF' },
        { name: 'Chad', code: 'TD' },
        { name: 'Chile', code: 'CL' },
        { name: 'China', code: 'CN' },
        { name: 'Christmas Island', code: 'CX' },
        { name: 'Cocos (Keeling) Islands', code: 'CC' },
        { name: 'Colombia', code: 'CO' },
        { name: 'Comoros', code: 'KM' },
        { name: 'Congo', code: 'CG' },
        { name: 'Congo, The Democratic Republic of the', code: 'CD' },
        { name: 'Cook Islands', code: 'CK' },
        { name: 'Costa Rica', code: 'CR' },
        { name: 'Cote D\'Ivoire', code: 'CI' },
        { name: 'Croatia', code: 'HR' },
        { name: 'Cuba', code: 'CU' },
        { name: 'Cyprus', code: 'CY' },
        { name: 'Czech Republic', code: 'CZ' },
        { name: 'Denmark', code: 'DK' },
        { name: 'Djibouti', code: 'DJ' },
        { name: 'Dominica', code: 'DM' },
        { name: 'Dominican Republic', code: 'DO' },
        { name: 'Ecuador', code: 'EC' },
        { name: 'Egypt', code: 'EG' },
        { name: 'El Salvador', code: 'SV' },
        { name: 'Equatorial Guinea', code: 'GQ' },
        { name: 'Eritrea', code: 'ER' },
        { name: 'Estonia', code: 'EE' },
        { name: 'Ethiopia', code: 'ET' },
        { name: 'Falkland Islands (Malvinas)', code: 'FK' },
        { name: 'Faroe Islands', code: 'FO' },
        { name: 'Fiji', code: 'FJ' },
        { name: 'Finland', code: 'FI' },
        { name: 'France', code: 'FR' },
        { name: 'French Guiana', code: 'GF' },
        { name: 'French Polynesia', code: 'PF' },
        { name: 'French Southern Territories', code: 'TF' },
        { name: 'Gabon', code: 'GA' },
        { name: 'Gambia', code: 'GM' },
        { name: 'Georgia', code: 'GE' },
        { name: 'Germany', code: 'DE' },
        { name: 'Ghana', code: 'GH' },
        { name: 'Gibraltar', code: 'GI' },
        { name: 'Greece', code: 'GR' },
        { name: 'Greenland', code: 'GL' },
        { name: 'Grenada', code: 'GD' },
        { name: 'Guadeloupe', code: 'GP' },
        { name: 'Guam', code: 'GU' },
        { name: 'Guatemala', code: 'GT' },
        { name: 'Guernsey', code: 'GG' },
        { name: 'Guinea', code: 'GN' },
        { name: 'Guinea-Bissau', code: 'GW' },
        { name: 'Guyana', code: 'GY' },
        { name: 'Haiti', code: 'HT' },
        { name: 'Heard Island and Mcdonald Islands', code: 'HM' },
        { name: 'Holy See (Vatican City State)', code: 'VA' },
        { name: 'Honduras', code: 'HN' },
        { name: 'Hong Kong', code: 'HK' },
        { name: 'Hungary', code: 'HU' },
        { name: 'Iceland', code: 'IS' },
        { name: 'India', code: 'IN' },
        { name: 'Indonesia', code: 'ID' },
        { name: 'Iran, Islamic Republic Of', code: 'IR' },
        { name: 'Iraq', code: 'IQ' },
        { name: 'Ireland', code: 'IE' },
        { name: 'Isle of Man', code: 'IM' },
        { name: 'Israel', code: 'IL' },
        { name: 'Italy', code: 'IT' },
        { name: 'Jamaica', code: 'JM' },
        { name: 'Japan', code: 'JP' },
        { name: 'Jersey', code: 'JE' },
        { name: 'Jordan', code: 'JO' },
        { name: 'Kazakhstan', code: 'KZ' },
        { name: 'Kenya', code: 'KE' },
        { name: 'Kiribati', code: 'KI' },
        { name: 'Korea, Democratic People\'S Republic of', code: 'KP' },
        { name: 'Korea, Republic of', code: 'KR' },
        { name: 'Kuwait', code: 'KW' },
        { name: 'Kyrgyzstan', code: 'KG' },
        { name: 'Lao People\'S Democratic Republic', code: 'LA' },
        { name: 'Latvia', code: 'LV' },
        { name: 'Lebanon', code: 'LB' },
        { name: 'Lesotho', code: 'LS' },
        { name: 'Liberia', code: 'LR' },
        { name: 'Libyan Arab Jamahiriya', code: 'LY' },
        { name: 'Liechtenstein', code: 'LI' },
        { name: 'Lithuania', code: 'LT' },
        { name: 'Luxembourg', code: 'LU' },
        { name: 'Macao', code: 'MO' },
        { name: 'Macedonia, The Former Yugoslav Republic of', code: 'MK' },
        { name: 'Madagascar', code: 'MG' },
        { name: 'Malawi', code: 'MW' },
        { name: 'Malaysia', code: 'MY' },
        { name: 'Maldives', code: 'MV' },
        { name: 'Mali', code: 'ML' },
        { name: 'Malta', code: 'MT' },
        { name: 'Marshall Islands', code: 'MH' },
        { name: 'Martinique', code: 'MQ' },
        { name: 'Mauritania', code: 'MR' },
        { name: 'Mauritius', code: 'MU' },
        { name: 'Mayotte', code: 'YT' },
        { name: 'Mexico', code: 'MX' },
        { name: 'Micronesia, Federated States of', code: 'FM' },
        { name: 'Moldova, Republic of', code: 'MD' },
        { name: 'Monaco', code: 'MC' },
        { name: 'Mongolia', code: 'MN' },
        { name: 'Montserrat', code: 'MS' },
        { name: 'Morocco', code: 'MA' },
        { name: 'Mozambique', code: 'MZ' },
        { name: 'Montenegro', code: 'CS' },
        { name: 'Myanmar', code: 'MM' },
        { name: 'Namibia', code: 'NA' },
        { name: 'Nauru', code: 'NR' },
        { name: 'Nepal', code: 'NP' },
        { name: 'Netherlands', code: 'NL' },
        { name: 'Netherlands Antilles', code: 'AN' },
        { name: 'New Caledonia', code: 'NC' },
        { name: 'New Zealand', code: 'NZ' },
        { name: 'Nicaragua', code: 'NI' },
        { name: 'Niger', code: 'NE' },
        { name: 'Nigeria', code: 'NG' },
        { name: 'Niue', code: 'NU' },
        { name: 'Norfolk Island', code: 'NF' },
        { name: 'Northern Mariana Islands', code: 'MP' },
        { name: 'Norway', code: 'NO' },
        { name: 'Oman', code: 'OM' },
        { name: 'Pakistan', code: 'PK' },
        { name: 'Palau', code: 'PW' },
        { name: 'Palestinian Territory, Occupied', code: 'PS' },
        { name: 'Panama', code: 'PA' },
        { name: 'Papua New Guinea', code: 'PG' },
        { name: 'Paraguay', code: 'PY' },
        { name: 'Peru', code: 'PE' },
        { name: 'Philippines', code: 'PH' },
        { name: 'Pitcairn', code: 'PN' },
        { name: 'Poland', code: 'PL' },
        { name: 'Portugal', code: 'PT' },
        { name: 'Puerto Rico', code: 'PR' },
        { name: 'Qatar', code: 'QA' },
        { name: 'Reunion', code: 'RE' },
        { name: 'Romania', code: 'RO' },
        { name: 'Russian Federation', code: 'RU' },
        { name: 'RWANDA', code: 'RW' },
        { name: 'Saint Helena', code: 'SH' },
        { name: 'Saint Kitts and Nevis', code: 'KN' },
        { name: 'Saint Lucia', code: 'LC' },
        { name: 'Saint Pierre and Miquelon', code: 'PM' },
        { name: 'Saint Vincent and the Grenadines', code: 'VC' },
        { name: 'Samoa', code: 'WS' },
        { name: 'San Marino', code: 'SM' },
        { name: 'Sao Tome and Principe', code: 'ST' },
        { name: 'Saudi Arabia', code: 'SA' },
        { name: 'Senegal', code: 'SN' },
        { name: 'Serbia', code: 'RS' },
        { name: 'Seychelles', code: 'SC' },
        { name: 'Sierra Leone', code: 'SL' },
        { name: 'Singapore', code: 'SG' },
        { name: 'Slovakia', code: 'SK' },
        { name: 'Slovenia', code: 'SI' },
        { name: 'Solomon Islands', code: 'SB' },
        { name: 'Somalia', code: 'SO' },
        { name: 'South Africa', code: 'ZA' },
        { name: 'South Georgia and the South Sandwich Islands', code: 'GS' },
        { name: 'Spain', code: 'ES' },
        { name: 'Sri Lanka', code: 'LK' },
        { name: 'Sudan', code: 'SD' },
        { name: 'Suriname', code: 'SR' },
        { name: 'Svalbard and Jan Mayen', code: 'SJ' },
        { name: 'Swaziland', code: 'SZ' },
        { name: 'Sweden', code: 'SE' },
        { name: 'Switzerland', code: 'CH' },
        { name: 'Syrian Arab Republic', code: 'SY' },
        { name: 'Taiwan, Province of China', code: 'TW' },
        { name: 'Tajikistan', code: 'TJ' },
        { name: 'Tanzania, United Republic of', code: 'TZ' },
        { name: 'Thailand', code: 'TH' },
        { name: 'Timor-Leste', code: 'TL' },
        { name: 'Togo', code: 'TG' },
        { name: 'Tokelau', code: 'TK' },
        { name: 'Tonga', code: 'TO' },
        { name: 'Trinidad and Tobago', code: 'TT' },
        { name: 'Tunisia', code: 'TN' },
        { name: 'Turkey', code: 'TR' },
        { name: 'Turkmenistan', code: 'TM' },
        { name: 'Turks and Caicos Islands', code: 'TC' },
        { name: 'Tuvalu', code: 'TV' },
        { name: 'Uganda', code: 'UG' },
        { name: 'Ukraine', code: 'UA' },
        { name: 'United Arab Emirates', code: 'AE' },
        { name: 'United Kingdom', code: 'GB' },
        { name: 'United States', code: 'US' },
        { name: 'United States Minor Outlying Islands', code: 'UM' },
        { name: 'Uruguay', code: 'UY' },
        { name: 'Uzbekistan', code: 'UZ' },
        { name: 'Vanuatu', code: 'VU' },
        { name: 'Venezuela', code: 'VE' },
        { name: 'Viet Nam', code: 'VN' },
        { name: 'Virgin Islands, British', code: 'VG' },
        { name: 'Virgin Islands, U.S.', code: 'VI' },
        { name: 'Wallis and Futuna', code: 'WF' },
        { name: 'Western Sahara', code: 'EH' },
        { name: 'Yemen', code: 'YE' },
        { name: 'Zambia', code: 'ZM' },
        { name: 'Zimbabwe', code: 'ZW' }
    ],
    ui: {
        score: {
            percentage(partialValue, totalValue) {
                return (100 * partialValue) / totalValue;
            }
        },
        post_profile_edit: function () {

            $.ajax({
                type: "POST",
                url: "./?q=login_reg",
                data: {
                    what: "profile_edit",
                    username: $(".modal#edit_profile_modal #inputUsername").val(),
                    surname: $(".modal#edit_profile_modal #inputSurname").val(),
                    email: $(".modal#edit_profile_modal #inputEmail").val(),
                    address: $(".modal#edit_profile_modal #inputAdresse").val(),
                    phone: $(".modal#edit_profile_modal #inputPhone").val()
                },
                success: function (res) {
                    if (res == "YES") {
                        window.location.href = "./?p=profile";
                    }
                }

            });
        },

        post_comment: function (id) {
            $.ajax({
                type: "POST",
                url: "./?q=login_reg",
                data: {
                    what: 'class_review_title',
                    hmm: "new_comment",
                    msg: $("section.modal-body textarea.form-control").val(),
                    score: $("#com_score").val(),
                    id: id
                },
                success: function (res) {
                    $("section.modal-body").html(res);
                }, complete: function () {


                }

            });
        },
        checkout: {
            chk: function (t) {
                if (t.checked) {
                    $(".checked_disabled_chk").removeAttr("disabled");
                } else {
                    $(".checked_disabled_chk").attr("disabled", "true");
                }
            },
            ticket: function (id, what) {
                var data = {};
                if (what == "ticked_add") {
                    data = {
                        id: id,
                        what: what,
                        airport_a: $("#country.airport_a").val(),
                        start_r: $("#departure_date").val(),
                        start_end: $("#departure_date_Return").val(),
                        seats: $("#seats").val()
                    };
                }
                if (what == "ticked_del") {
                    data = {
                        id: id,
                        what: what
                    }
                }
                if (what == "ticked_edit") {
                    data = {
                        id: id,
                        what: what,
                        airport_a: $("#country.airport_a").val(),
                        start_r: $("#departure_date").val(),
                        start_end: $("#departure_date_Return").val(),
                        seats: $("#seats").val()

                    };
                }
                // ticked_edit
                $.ajax({
                    type: "POST",
                    url: "./?q=login_reg",
                    data: data,
                    success: function (res) {
                        if (res == "YES") {
                            if (what == "ticked_edit" || what == "ticked_del") {
                                window.location.reload();
                            } else {
                                window.location.href = "./?p=Journal";
                            }
                        }
                    }

                });
            },
            cr: function () {
                document.querySelectorAll("#country").forEach(function (v) {
                    v.innerHTML = "<option selected value='Choose...'>Choose...</option>";
                    ICR.country.forEach(function (h) {
                        v.innerHTML += `<option value="${h.name}">${h.name}</option>`;
                    });
                    $(v).find(`option[value="${$(v).attr("data-selected")}"]`).attr("selected", "true");

                });
                $("#seats").html("");
                for (var i = 0; i < 10; i++) {
                    $("#seats").append(`<option value="${i}">${i}</option>`);
                }
                $("#seats").find(`option[value="${$("#seats").attr("data-selected")}"]`).attr("selected", "true");

            }
        },
        modal_close: function () {
            $(`.modal`).removeClass("show_active");
        },
        search: function(t){
            $.get(`./?q=search&d=${$(t).val()}`,function(a){
                $(".row_home_page").html(a);
            });
        },
        modal: function (what, id = 0) {
            if (what == "CLOSE") {
                $(`.modal`).removeClass("show_active");
            } else {

                var str = `.modal[id="${what}"]`;

                if ($(str).hasClass("show_active")) {
                    $(str).removeClass("show_active");
                } else {
                    $(`.modal`).removeClass("show_active");

                    $(str).addClass("show_active");
                    if (what == "class_review_title") {
                        $.ajax({
                            type: "POST",
                            url: "./?q=login_reg",
                            data: {
                                what: what,
                                hmm: "get_all",
                                id: id
                            },
                            success: function (res) {
                                $("section.modal-body").html(res);
                            }, complete: function () {
                                $('#review-gate').reviewGate({
                                    navbarColor: '#0f18e9',
                                    onUpdate: function (count) {
                                        if (count >= 5) {
                                            // Do something on good review
                                            $('#review-gate').reviewGate('step', 2);
                                        } else {
                                            // Do something on bad review
                                            $('#review-gate').reviewGate('step', 3);
                                        }
                                    },
                                });

                            }

                        });
                    }
                }

            }
        }
    },
    login_reg: function (w,) {
        var data = {};
        if (w == "logout") {
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
                username: $(".modal#reg_modal #inputUsername").val(),
                surname: $(".modal#reg_modal #inputSurname").val(),
                email: $(".modal#reg_modal #inputEmail").val(),
                password: $(".modal#reg_modal #inputPassword").val(),
                address: $(".modal#reg_modal #inputAdresse").val(),
                phone: $(".modal#reg_modal #inputPhone").val()
            };
        }
        if (w == "ticked_comm_add") {
            data = {
                what: w,
                username: $(".modal#reg_modal #inputUsername").val(),
                surname: $(".modal#reg_modal #inputSurname").val(),
                email: $(".modal#reg_modal #inputEmail").val(),
                password: $(".modal#reg_modal #inputPassword").val(),
                address: $(".modal#reg_modal #inputAdresse").val(),
                phone: $(".modal#reg_modal #inputPhone").val()
            };
        }
        if (w == "edit_profile") {
            data = {
                what: w,
                username: $(".modal#reg_modal #inputUsername").val(),
                surname: $(".modal#reg_modal #inputSurname").val(),
                email: $(".modal#reg_modal #inputEmail").val(),
                password: $(".modal#reg_modal #inputPassword").val(),
                address: $(".modal#reg_modal #inputAdresse").val(),
                phone: $(".modal#reg_modal #inputPhone").val()
            };
        }
        console.log(data);
        $.ajax({
            type: "POST",
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
    },
    chat: {
        o: function (t) {
            $("button.rw-launcher").click();
            return "";
            if ($(t).hasClass("active")) {
                $(t).removeClass("active");
                $(".rw-widget-container").removeClass("rw-chat-open");
                $(".rw-widget-container .rw-conversation-container").remove();

            } else {
                $(t).addClass("active");
                //  $(".rw-widget-container").addClass("rw-chat-open");
                $("button.rw-launcher").click();


            }
        }
    },
    start: function () {
        document.body.ondragstart = () => { return false; };
        document.body.oncontextmenu = () => { return false; };
        window.addEventListener("message", event => {
            console.log(event.data.custom);
            if (event.data.custom  === "logout_status") {
              // Call your JavaScript function to show the map
              window.location.href = "/?p=logout";
        
            }
          });

    }
}

ICR.start();