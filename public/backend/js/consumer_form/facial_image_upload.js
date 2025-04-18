
function checkFieldSetFacialImageUpload() {
    if ($("#fieldset_eight").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    // nextWizardStep = true;
    // console.log(nextWizardStep)

    var data = {};
    $("#fieldset_eight input").each(function () {
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
    $("#fieldset_eight select").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $("#fieldset_eight textarea").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    data["form_section"] = "facial_image_upload";

    if (nextWizardStep) {
      store_this_is_me_form_data(data, "facial_image_upload");

        $("#facial_image_upload_bar").addClass("completed");
        $("#facial_image_upload_bar").addClass("set-filled");
        $("#facial_image_upload_bar").children("div").eq(0).addClass("text-white");
        $("#facial_image_upload_bar").removeClass("active");
        $("#head_n_face_bar").addClass("active");
    }
}

$('#facial_image').on('change', function() {
    // Get the selected file
    var file = $(this)[0].files[0];
    var data = new FormData();
    data.append('file', file);
    data.append('form_section', 'facial_image_upload');


    store_this_is_me_form_data_image(data, "facial_image_upload_button");

  });