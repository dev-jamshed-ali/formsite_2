function checkFieldSetHeadAndFace() {
    if ($("#fieldset_nine").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;

    var data = {};
    $("#fieldset_nine input").each(function () {
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
    $("#fieldset_nine select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_nine textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "head_and_face_information";

    if (nextWizardStep) {
      store_this_is_me_form_data(data, "head_and_face_information_button");

        $("#head_n_face_bar").addClass("completed");
        $("#head_n_face_bar").addClass("set-filled");
        $("#head_n_face_bar").children("div").eq(0).addClass("text-white");
        $("#head_n_face_bar").removeClass("active");
        $("#hair_bar").addClass("active");
    }
}