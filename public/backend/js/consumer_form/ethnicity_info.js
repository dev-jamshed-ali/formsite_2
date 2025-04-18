function checkFieldSetEthnicityInformation() {
    if ($("#fieldset_four").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;
    // console.log(nextWizardStep)

    var data = {};
    $("#fieldset_four input").each(function () {
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
    $("#fieldset_four select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_four textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "ethnicity_information";

    if (nextWizardStep) {
      store_this_is_me_form_data(data, "ethnicity_information_button");

        $("#enthnicity_bar").addClass("completed");
        $("#enthnicity_bar").addClass("set-filled");
        $("#enthnicity_bar").children("div").eq(0).addClass("text-white");
        $("#enthnicity_bar").removeClass("active");
        $("#neighborhood_bar").addClass("active");
    }
}
