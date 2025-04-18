// public/js/donation.js
function add_payment(element, amount) {
    $(element).addClass("bg-warning");
    $(element).addClass("text-dark");
    $(element).siblings("button").removeClass("bg-warning");
    $("#donate_amount").val(amount);
}
function select_frequency(element, type) {
    $(element).addClass("bg-warning");
    $(element).addClass("text-dark");
    $(element).siblings("button").removeClass("bg-warning");
    $("#frequency").val(type);
}

$(document).ready(function () {

    $("#donation_form").validate({

        errorPlacement: function(error, element) {

            error.appendTo(element.siblings('p'));
        },
        onkeyup: function(element) {
            var element_id = $(element).attr('id');
            if (this.settings.rules[element_id].onkeyup !== false) {
                $(element).valid();
            }
        },
        rules: {
            donor_name: {
                required: true,
                maxlength: 25,
                lettersonly: true,

            },
            donor_email: {
                required: true,
                email: true,
                maxlength: 50,
                noemail: true,

            },
            donate_amount:{
                required:true,
                number:true,
                
            }
          

        },
        messages: {
            email: "Please enter a valid email address",
        },
        submitHandler:async function (form, event) {
            event.preventDefault();
            $("#donate_button_spinner").show();
            const email = $("#donor_email").val();
            const amount = parseFloat($("#donate_amount").val());
            const frequency = $("#frequency").val();
            const name = $("#donor_name").val();
    
            if (isNaN(amount) || amount <= 0) {
                alert("Please enter a valid amount.");
                return;
            }
    
            // Disable the donate button to prevent multiple submissions
            const donateButton = $("#donation_button");
            donateButton.prop("disabled", true);
    
            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: "card",
                card: card,
            });
    
            if (error) {
                toastr.error("An error occurred: " + error.message);
                donateButton.prop("disabled", false);
                $("#donate_button_spinner").hide();
                return;
            }
          
            // Submit the form with the token to the server
            $.ajax({
                url: "/donate",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    name,
                    email,
                    amount,
                    frequency,
                    paymentMethodId: paymentMethod.id,
                },
                success: (response) => {
                    toastr.success(response.message);
                    $("#donation_form")[0].reset();
                    card.clear();
                    donateButton.prop("disabled", false);
                    $("#donate_button_spinner").hide();
                },
                error: (xhr, textStatus, errorThrown) => {
                    toastr.error("An error occurred: " + errorThrown);
                    donateButton.prop("disabled", false);
                    $("#donate_button_spinner").hide();
                },
            });
        }
    });



    const elements = stripe.elements();

    // Custom styling for Stripe Elements
    const style = {
        base: {
            color: "#32325d",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4",
            },
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a",
        },
    };

    // Create an instance of the card Element
    const card = elements.create("card", { style: style });

    // Add an instance of the card Element into the `card-element` <div>
    card.mount("#card-element");

    // Handle real-time validation errors from the card Element
    card.on("change", function (event) {
        const displayError = document.getElementById("card-errors");
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    });
    // $("#donation_form").submit(async function (event) {
    //     event.preventDefault();
    //     $("#donate_button_spinner").show();
    //     const email = $("#donor_email").val();
    //     const amount = parseFloat($("#donate_amount").val());
    //     const frequency = $("#frequency").val();
    //     const name = $("#donor_name").val();

    //     if (isNaN(amount) || amount <= 0) {
    //         alert("Please enter a valid amount.");
    //         return;
    //     }

    //     // Disable the donate button to prevent multiple submissions
    //     const donateButton = $("#donation_button");
    //     donateButton.prop("disabled", true);

    //     const { paymentMethod, error } = await stripe.createPaymentMethod({
    //         type: "card",
    //         card: card,
    //     });

    //     if (error) {
    //         toastr.error("An error occurred: " + error.message);
    //         donateButton.prop("disabled", false);
    //         return;
    //     }
      
    //     // Submit the form with the token to the server
    //     $.ajax({
    //         url: "/ginicoe/donate",
    //         method: "POST",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         data: {
    //             name,
    //             email,
    //             amount,
    //             frequency,
    //             paymentMethodId: paymentMethod.id,
    //         },
    //         success: (response) => {
    //             toastr.success(response.message);
    //             $("#donation_form")[0].reset();
    //             card.clear();
    //             donateButton.prop("disabled", false);
    //             $("#donate_button_spinner").hide();
    //         },
    //         error: (xhr, textStatus, errorThrown) => {
    //             toastr.error("An error occurred: " + errorThrown);
    //             donateButton.prop("disabled", false);
    //             $("#donate_button_spinner").hide();
    //         },
    //     });
    // });
});
