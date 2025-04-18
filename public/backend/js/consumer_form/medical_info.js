$("#medical_state").change(function () {
    var state = $(this).val();
    var cities = cities_by_state[state];
console.log(cities)
    // Clear the city select and add the default option
    $("#medical_city")
        .empty()
        .append('<option value="">Select a city</option>');

    // Populate the city select with options based on the selected state

    $.each(cities, function (index, city) {
        $("#medical_city").append(
            `<option value="${city}">` + city + "</option>"
        );
    });
});

function check_do_you_have_hidden_ailment()
{

    if ($("input[name='do_you_have_hidden_ailment']:checked").val() == "1") {
        $("#disablility_section").show();

    } else {
        $("#disablility_section").hide();

    }
}

function checkFieldSetMedicalInfo()
{
    if ($("#fieldset_fourteen").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;

    var data = {};
    $("#fieldset_fourteen input").each(function () {
        if ($(this).attr("type") == "radio") {
            const checkedInput = document.querySelector( 'input[name="' + $(this).attr("name") + '"]:checked' );
            data[$(this).attr("name")] = checkedInput ? checkedInput.value : '';
            console.log("checkedInput :" , checkedInput ? checkedInput.value : '')
        }
        if ($(this).attr("type") == "checkbox") {
            data[$(this).attr("name")] = $(this).is(":checked") ? 1 : 0;
        } if($(this).attr("type") != "radio" && $(this).attr("type") != "checkbox") {
            data[$(this).attr("name")] = $(this).val();
        }
    });
    $("#fieldset_fourteen select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_fourteen textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "medical_information";

    if (nextWizardStep) {
      store_this_is_me_form_data(data, "medical_information_information_button");

        $("#medical_info_bar").addClass("completed");
        $("#medical_info_bar").addClass("set-filled");
        $("#medical_info_bar").children("div").eq(0).addClass("text-white");
        $("#medical_info_bar").removeClass("active");
        $("#family_history_bar").addClass("active");
    }
}