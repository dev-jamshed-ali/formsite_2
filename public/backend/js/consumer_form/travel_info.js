function checkFieldSetTravelInfo()
{
    if ($("#fieldset_sixteen").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;
    // console.log(nextWizardStep)

    var data = {};
    $("#fieldset_sixteen input").each(function () {
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
    $("#fieldset_sixteen select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_sixteen textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });

    data["form_section"] = "travel_information";


    if (nextWizardStep) {
      store_this_is_me_form_data(data, "travel_information_button");
        $("#travel_info_bar").addClass("completed");
        $("#travel_info_bar").addClass("set-filled");
        $("#travel_info_bar").children("div").eq(0).addClass("text-white");
        $("#travel_info_bar").removeClass("active");
        $("#attestation_bar").addClass("active");
    }
}