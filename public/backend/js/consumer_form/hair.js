function checkFieldSetHair() {
    if ($("#fieldset_ten").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;

    var data = {};

    $("#fieldset_ten input").each(function () {
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
    $("#fieldset_ten select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_ten textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "hair_information";

    if (nextWizardStep) {
      store_this_is_me_form_data(data, "hair_information_button");

        $("#hair_bar").addClass("completed");
        $("#hair_bar").addClass("set-filled");
        $("#hair_bar").children("div").eq(0).addClass("text-white");
        $("#hair_bar").removeClass("active");
         $("#distinguish_bar").addClass("active");
    }
}