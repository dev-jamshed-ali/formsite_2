function checkFieldSetNeighborhood() {
    if ($("#fieldset_five").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    console.log("Shall i proceed to next:" , nextWizardStep );
    // nextWizardStep = true;

    var data = {};
    $("#fieldset_five input").each(function () {
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
    $("#fieldset_five select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_five textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "my_neighborhood_information";

    if (nextWizardStep) {
        store_this_is_me_form_data(data, "my_neighborhood_button");

        $("#neighborhood_bar").addClass("completed");
        $("#neighborhood_bar").addClass("set-filled");
        $("#neighborhood_bar").children("div").eq(0).addClass("text-white");
        $("#neighborhood_bar").removeClass("active");
        $("#employment_bar").addClass("active");
    }
}
