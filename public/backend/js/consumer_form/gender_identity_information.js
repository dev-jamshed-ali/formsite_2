function checkFieldSetGenderIdentityInformation() {
    if ($("#fieldset_three").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;
    // console.log(nextWizardStep)

    var data = {};
    $("#fieldset_three input").each(function () {
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
    $("#fieldset_three select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_three textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "gender_identity_info";
    console.log(data);
    if (nextWizardStep) {
        store_this_is_me_form_data(data, "gender_identity_info_button" , true );

        $("#gender_identity_bar").addClass("completed");
        $("#gender_identity_bar").addClass("set-filled");
        $("#gender_identity_bar").children("div").eq(0).addClass("text-white");
        $("#gender_identity_bar").removeClass("active");
        $("#enthnicity_bar").addClass("active");
    }
}
