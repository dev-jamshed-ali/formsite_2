function distinguish_identifier_check() {
    if ($("input[name='facial_neck_scars']:checked").val() == "1") {
        $("#facial_neck_scars_description_div").show();
        $("#facial_neck_scars_description").prop("required", true);
    } else {
        $("#facial_neck_scars_description_div").hide();
        $("#facial_neck_scars_description").prop("required", false);
    }
}

function facial_neck_tattoos_check() {
    if ($("input[name='facial_or_neck_tattoos']:checked").val() == "1") {
        $("#facial_or_neck_tattoos_description_div").show();
        $("#facial_or_neck_tattoos_description").prop("required", true);
    } else {
        $("#facial_or_neck_tattoos_description_div").hide();
        $("#facial_or_neck_tattoos_description").prop("required", false);
    }
}
function facial_plastic_surgery_check() {
    if ($("input[name='facial_plastic_surgery']:checked").val() == "1") {
        $("#facial_plastic_surgery_description_div").show();
        $("#facial_surgery_date").prop("required", true);
        $("#number_of_plastic_surgery").prop("required", true);
        $("#plastic_surgeon_name").prop("required", true);
        $("#first_name_of_surgeon").prop("required", true);
        $("#last_name_of_surgeon").prop("required", true);
        $("#surgeon_house_address").prop("required", true);
        $("#surgeon_street").prop("required", true);
        $("#surgeon_state").prop("required", true);
        $("#surgeon_city").prop("required", true);
        $("#surgeon_zipcode").prop("required", true);
        $("#surgeon_telephone").prop("required", true);
    } else {
        $("#facial_plastic_surgery_description_div").hide();

        $("#facial_surgery_date").prop("required", false);
        $("#number_of_plastic_surgery").prop("required", false);
        $("#plastic_surgeon_name").prop("required", false);
        $("#first_name_of_surgeon").prop("required", false);
        $("#last_name_of_surgeon").prop("required", false);
        $("#surgeon_house_address").prop("required", false);
        $("#surgeon_street").prop("required", false);
        $("#surgeon_state").prop("required", false);
        $("#surgeon_city").prop("required", false);
        $("#surgeon_zipcode").prop("required", false);
        $("#surgeon_telephone").prop("required", false);
    }
}

$("#surgeon_state").change(function () {
    var state = $(this).val();
    var cities = cities_by_state[state];

    // Clear the city select and add the default option
    $("#surgeon_city")
        .empty()
        .append('<option value="">Select a city</option>');

    // Populate the city select with options based on the selected state
    // $("#city").append("<option selected></option>");
    $.each(cities, function (index, city) {
        $("#surgeon_city").append(
            `<option value="${city}">` + city + "</option>"
        );
    });
});

function checkFieldSetDistinguishIdentifier() {
    if ($("#fieldset_eleven").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;

    var data = {};
    $("#fieldset_eleven input").each(function () {
        if ($(this).attr("type") == "radio") {
            const checkedInput = document.querySelector( 'input[name="' + $(this).attr("name") + '"]:checked' );
            data[$(this).attr("name")] = checkedInput ? checkedInput.value : '';
        }
        if ($(this).attr("type") == "checkbox") {
            data[$(this).attr("name")] = $(this).is(":checked") ? 1 : 0;
        } if($(this).attr("type") != "radio" && $(this).attr("type") != "checkbox") {
            data[$(this).attr("name")] = $(this).val();
        }
    });
    $("#fieldset_eleven select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_eleven textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "distinguish_identifier_information";


    if (nextWizardStep) {
        store_this_is_me_form_data(
            data,
            "distinguish_identifier_information_button"
        );

        $("#distinguish_bar").addClass("completed");
        $("#distinguish_bar").addClass("set-filled");
        $("#distinguish_bar").children("div").eq(0).addClass("text-white");
        $("#distinguish_bar").removeClass("active");
        $("#twin_identifier_bar").addClass("active");
    }
}
