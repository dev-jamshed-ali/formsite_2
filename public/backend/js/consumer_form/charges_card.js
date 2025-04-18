function checkFieldSetChargesCard() {
    let nextWizardStep = $("#fieldset_seven").find(":input").valid() && validateAllCards();

    if (nextWizardStep) {
        var data = {};
        $("#fieldset_seven input").each(function () {
            if ($(this).attr("type") == "radio") {
                data[$(this).attr("name")] = document.querySelector(
                    'input[name="' + $(this).attr("name") + '"]:checked'
                ).value;
            }
            if ($(this).attr("type") == "checkbox") {
                data[$(this).attr("name")] = $(this).is(":checked") ? 1 : 0;
            } 
            if ($(this).attr("type") != "radio" && $(this).attr("type") != "checkbox") {
                data[$(this).attr("name")] = $(this).val();
            }
        });
        
        $("#fieldset_seven select").each(function () {
            data[$(this).attr("name")] = $(this).val();
        });

        $("#fieldset_seven textarea").each(function () {
            data[$(this).attr("name")] = $(this).val();
        });
        
        data["form_section"] = "charge_card_information";
        store_this_is_me_form_data(data, "charge_card_information_button");
        $("#protect_cards_bar").addClass("completed set-filled");
        $("#protect_cards_bar").children("div").eq(0).addClass("text-white");
        $("#protect_cards_bar").removeClass("active");
        $("#facial_image_upload_bar").addClass("active");
    }
}

function validateLuhn(cardNumber) {
    // Remove any spaces or non-digits
    cardNumber = cardNumber.replace(/\D/g, '');
    
    // Check if empty, not a number, or starts with 0
    if (!cardNumber || isNaN(cardNumber) || cardNumber.charAt(0) === '0') {
        return false;
    }

    // Check length
    if (cardNumber.length < 13 || cardNumber.length > 19) {
        return false;
    }

    // Check card type based on prefix
    const firstDigit = cardNumber.charAt(0);
    const firstTwoDigits = cardNumber.substring(0, 2);
    
    // Validate card prefix
    const isValidPrefix = 
        firstDigit === '4' || // Visa
        firstDigit === '5' || firstDigit === '2' || // Mastercard
        firstTwoDigits === '34' || firstTwoDigits === '37' || // American Express
        firstDigit === '6' || // Discover
        ['30', '36', '38', '39'].includes(firstTwoDigits); // Diners Club
    
    if (!isValidPrefix) {
        return false;
    }

    // Implement Luhn Algorithm
    let sum = 0;
    let isAlternate = false;
    
    // Loop from right to left
    for (let i = cardNumber.length - 1; i >= 0; i--) {
        let digit = parseInt(cardNumber.charAt(i));

        if (isAlternate) {
            digit *= 2;
            if (digit > 9) {
                digit = (digit % 10) + 1;
            }
        }

        sum += digit;
        isAlternate = !isAlternate;
    }

    return (sum % 10 === 0);
}

function validateAllCards() {
    let isValid = true;
    $('.chk_card_number_cls').each(function() {
        const cardNumber = $(this).val();
        const index = $(this).attr('id').split('_').pop();
        const msgElement = $(`#validation_msg_${index}`);
        
        if (!validateLuhn(cardNumber)) {
            isValid = false;
            msgElement.html("Invalid Card Number!").css('color', 'red');
            $(this).addClass('is-invalid');
        } else {
            msgElement.html("Valid Card Number").css('color', 'green');
            $(this).removeClass('is-invalid');
        }
    });
    return isValid;
}

// Attach validation to card number inputs
$(document).on('input', '.chk_card_number_cls', function() {
    const cardNumber = $(this).val();
    const index = $(this).attr('id').split('_').pop();
    const msgElement = $(`#validation_msg_${index}`);
    
    if (cardNumber.length >= 13) {
        if (!validateLuhn(cardNumber)) {
            msgElement.html("Invalid Card Number!").css('color', 'red');
            $(this).addClass('is-invalid');
        } else {
            msgElement.html("Valid Card Number").css('color', 'green');
            $(this).removeClass('is-invalid');
        }
    } else {
        msgElement.html("").css('color', 'red');
        $(this).removeClass('is-invalid');
    }
});

// Remove the old AJAX validation code since we're using Luhn validation
if ($("input.chk_card_number_cls").length) {
    $('input.chk_card_number_cls').on('input', function() {
        clearTimeout(window.cardValidationTimer);
        const input = $(this);
        
        window.cardValidationTimer = setTimeout(function() {
            const cardNumber = input.val();
            if (cardNumber.length >= 13) {
                const isValid = validateLuhn(cardNumber);
                const index = input.attr('id').split('_').pop();
                const msgElement = $(`#validation_msg_${index}`);
                
                if (!isValid) {
                    msgElement.html("Invalid Card Number!").css('color', 'red');
                    input.addClass('is-invalid');
                } else {
                    msgElement.html("Valid Card Number").css('color', 'green');
                    input.removeClass('is-invalid');
                }
            }
        }, 300);
    });
}