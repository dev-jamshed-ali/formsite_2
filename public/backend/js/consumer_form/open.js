function checkFieldSetOpen()
{
    if ($("#fieldset_eleven").find(":input").valid()) {
        nextWizardStep = true;
    } else {
        nextWizardStep = false;
    }
    nextWizardStep = true;

    var data = {};
    $("#fieldset_eleven input").each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    console.log(data);

    if (nextWizardStep) {
        $("#open_bar").addClass("completed");
        $("#open_bar").addClass("set-filled");
        $("#open_bar").children("div").eq(0).addClass("text-white");
        $("#open_bar").removeClass("active");
        $("#medical_info_bar").addClass("active");
    }
}