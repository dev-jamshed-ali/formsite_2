function are_you_active_memeber_of_labour_union_check() {
    if (
        $(
            "input[name='are_you_active_memeber_of_labour_union']:checked"
        ).val() == "1"
    ) {
        $("#are_you_active_memeber_of_labour_union_div").show();
        $("#labor_union_name").prop("required", true);
        $("#your_union_membership_number").prop("required", true);
    } else {
        $("#are_you_active_memeber_of_labour_union_div").hide();
        $("#labor_union_name").prop("required", false);
        $("#your_union_membership_number").prop("required", false);
    }
}

function checkFieldSetEmploymentInformation() {
    if ($("#fieldset_six").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;

    var data = {};
    $("#fieldset_six input").each(function () {
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
    $("#fieldset_six select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_six textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "employment_information";

    if (nextWizardStep) {
        store_this_is_me_form_data(data, "employment_information_button");

        $("#employment_bar").addClass("completed");
        $("#employment_bar").addClass("set-filled");
        $("#employment_bar").children("div").eq(0).addClass("text-white");
        $("#employment_bar").removeClass("active");
        $("#protect_cards_bar").addClass("active");
    }
}
