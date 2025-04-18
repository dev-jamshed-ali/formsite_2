function submitAttestation() {
    let nextWizardStep;
    if ($("#fieldset_seventeen").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    var data = {};
    $("#fieldset_seventeen input").each(function () {
        if ($(this).attr("type") == "radio") {
            const checkedInput = document.querySelector( 'input[name="' + $(this).attr("name") + '"]:checked' );
            data[$(this).attr("name")] = checkedInput ? checkedInput.value : '';
            console.log("checkedInput :" , checkedInput ? checkedInput.value : '')
        }
        if ($(this).attr("type") == "checkbox") {
            data[$(this).attr("name")] = $(this).is(":checked") ? 1 : 0;
        }
        if (
            $(this).attr("type") != "radio" &&
            $(this).attr("type") != "checkbox"
        ) {
            data[$(this).attr("name")] = $(this).val();
        }
    });
    $("#fieldset_seventeen select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_seventeen textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "attestation_information";

    if (nextWizardStep) {
        store_this_is_me_form_data(data, "attestation_information_button");

        $("#attestation_bar").addClass("completed");
        $("#attestation_bar").addClass("set-filled");
        $("#attestation_bar").children("div").eq(0).addClass("text-white");
        $("#attestation_bar").removeClass("active");
        toastr.success("Form Completed");
    //    setTimeout(()=>{
    //     location.reload();

    //    },5000)
    }
}

function review_form() {
    $(".wizard-fieldset").hide();
    $(".wizard-fieldset").show();
    $(".clearfix").hide();
    $("#all_form_submit").show();
}
function submit_full_form() {
    if ($("fieldset").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    $("fieldset").find(":input").each(function() {
        if (!$(this).valid()) {

          console.log("Field not valid: " + $(this).attr("name"));
        }
      });
    //   submitAttestation();

    if (!nextWizardStep) {
        toastr.error("Please check form some fields are not valid");
    }else{
        checkFieldSetPidegree();
        checkFieldSetThisIsMe();
        checkFieldSetGenderIdentityInformation();
        checkFieldSetEthnicityInformation();
        checkFieldSetNeighborhood();
        checkFieldSetEmploymentInformation();
        checkFieldSetChargesCard();
        checkFieldSetFacialImageUpload();
        checkFieldSetTravelInfo();
        submitAttestation();
    }
}
