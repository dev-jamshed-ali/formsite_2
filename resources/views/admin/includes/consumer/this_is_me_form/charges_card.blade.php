
<fieldset class="wizard-fieldset mt-4  @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_seven') show @endif" id="fieldset_seven">
    <input type="hidden" name="form_section" value="charge_card_information" />
    <input type="hidden" name="consumerId" value="{{session('id')}}" />

    <div id="cards_form" class=" p-3">
        <h4 class="stepper-right-f1 mb-3">
            7. Protect Charge Cards
        </h4>
        <div class="row mb-2">
            <div class="col-md-6 d-flex justify-content-start align-items-center">
                <h6 class="fs-6 mb-0">Cards Details</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <button id="add_card_info_button" type="button" class="btn btn-primary">+ Add Card</button>
            </div>
        </div>

        @if (empty($charge_card_info))
            <div class="shadow-stepper row card-fields">    
            
                <div class="col-md-4 mb-3">
                    <label for="Card Number" class="mb-2">Card Number</label>
                    <input name="card_number[0]" maxlength="16" type="number" autocomplete="cc-number"
                        class="form-control wizard-required chk_card_number_cls" id="card_number_0" required data-card-validator="true">
                        <p class="text_danger form_error" id="validaztion_msg_0"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Card Nick Name" class="mb-2">Card Nick Name</label>
                    <input name="nickname[0]" type="text" class="form-control wizard-required" id="nickname[0]" data-card-validator="true">
                    <p class="text_danger form_error"></p>

                </div>
                <div class="col-md-4 mb-3">
                    <label for="Primary Card Holder First Name" class="mb-2">Primary Card Holder First Name</label>
                    <input name="primary_first_name[0]" type="text" class="form-control wizard-required"
                        id="primary_first_name[0]" required data-card-validator="true">
            <p class="text_danger form_error"></p>

                </div>
                <div class="col-md-4 mb-3">
                    <label for="Primary Card Holder Last Name" class="mb-2">Primary Card Holder Last Name</label>
                    <input name="primary_last_name[0]" type="text" class="form-control wizard-required"
                        id="primary_last_name_[0]">
                    <p class="text_danger form_error"></p>
                    
                </div>
                <div class="col-md-4 mb-3">
                    <label for="CVC" class="mb-2">CVC</label>
                    <input type="number" class="form-control" id="cvc" name="cvc[0]" required>
            <p class="text_danger form_error"></p>

                </div>
                <div class="col-md-12">
                    <div class="form-check form-switch pb-2">
                        <input name="card_has_card_has_secondary_auth_user[0]" class="form-check-input"
                            type="checkbox" role="switch" id="your-responce">
                        <label class="form-check-label" for="your-responce">Does this card have a secondary authorized
                            user?</label>
            <p class="text_danger form_error"></p>

                    </div>
                </div>
                <div class=" mt-4 mb-5 p-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="Bank" class="mb-2">Name of the Bank that issued my card is?</label>
                            <input name="name_of_bank[0]" type="text" class="form-control wizard-required"
                                id="name_of_bank_0">
                            <p class="text_danger form_error"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Expiry Date" class="mb-2">Expiry Date</label>
                            <input name="expiry_date[0]" type="date" class="form-control wizard-required"
                                id="expiry_date[0]" required>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach ($charge_card_info as $index => $card_info)
            <div class="row shadow-stepper position-relative">
    <div class="col-md-6 d-flex justify-content-start align-items-center">
        <h6 class="fs-6 stepper-right-f1 mt-2 mb-2">Card {{ $index+1 }}</h6>
    </div>
   
    <div class="row card-fields" id="credit_card_{{ $index }}">
        <div class="col-md-4 mb-3">
            <label for="card_number" class="mb-2">Card Number</label>
            <input id="card_number_{{$index}}" autocomplete="cc-number" name="card_number[{{ $index }}]" autocomplete="cc-number"  value="{{ $card_info->card_number ?? '' }}" maxlength="16" type="number" class="form-control wizard-required chk_card_number_cls card_number" required data-card-validator="true">
            <p class="text_danger form_error" id="validation_msg_{{$index}}"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nickname" class="mb-2">Card Nick Name</label>
            <input value="{{ $card_info->nickname ?? '' }}" name="nickname[{{ $index }}]" type="text" class="form-control wizard-required" id="nickname" data-card-validator="true">
        </div>
        <div class="col-md-4 mb-3">
            <label for="primary_first_name" class="mb-2">Primary Card Holder First Name</label>
            <input value="{{ $card_info->primary_first_name ?? '' }}" name="primary_first_name[{{ $index }}]" type="text" class="form-control wizard-required" id="primary_first_name" required data-card-validator="true">
        </div>
        <div class="col-md-4 mb-3">
            <label for="primary_last_name" class="mb-2">Primary Card Holder Last Name</label>
            <input name="primary_last_name[{{ $index }}]" value="{{ $card_info->primary_last_name ?? '' }}" type="text" class="form-control wizard-required" id="primary_last_name" data-card-validator="true">
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="cvc" class="mb-2">CVC</label>
            <input type="number" class="form-control" id="cvc" placeholder="123" name="cvc[{{ $index }}]" value="{{ $card_info->cvc ?? '' }}" required />
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch pb-2">
                <input class="form-check-input" name="card_has_card_has_secondary_auth_user[{{ $index }}]" onclick="check_card_has_card_has_secondary_auth_user()" @if (!empty($card_info) && $card_info->card_has_card_has_secondary_auth_user == 1) checked @endif type="checkbox" role="switch" id="your-responce" />
                <label class="form-check-label" for="your-responce">Does this card have a secondary authorized user?</label>
            </div>
        </div>
        <div class="mt-4 mb-5 p-3">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="Bank" class="mb-2">Name of the Bank that issued my card is?</label>
                    <input name="name_of_bank[{{ $index }}]" value="{{ $card_info->name_of_bank ?? '' }}" type="text" class="form-control wizard-required" id="name_of_bank_{{ $index }}" data-card-validator="true">
                    <p class="text_danger form_error"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Expiry Date" class="mb-2">Expiry Date</label>
                    <input name="expiry_date[{{ $index }}]" value="{{ $card_info->expiry_date ?? '' }}" type="date" class="form-control wizard-required" id="expiry_date[{{ $index }}]" required data-card-validator="true">
                    <p class="text_danger form_error"></p>
                </div>
            </div>
        </div>
    </div>
</div>

            @endforeach
        @endif
    </div>


    <button type="button" name="previous" onclick="returnLater('fieldset_seven','consumer_this_is_me')"
        class="form-wizard-return-btn arrow-btn float-start">
        <img src="{{ asset('/public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button"  onclick="checkFieldSetChargesCard()" id="charge_card_information_button"
        class="form-wizard-next-btn arrow-btn float-end">
        Save & Continue
        <img src="{{ asset('/public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>
    <script>
        var backend_url=@json($app_url);
        document.getElementById('add_card_info_button').addEventListener('click', function() {
            // Get the current count of card fields to assign unique IDs and names
            var cardCount = document.querySelectorAll('.card-fields').length+1;
            const cardArreyIndex=cardCount-1;
    
            // Create the HTML for the new card fields
            var cardFieldsHtml = `
                <div class="row card-fields shadow-stepper" id="credit_card_${cardCount}">
                    <div class="row mb-2 ">
                 <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <h6 class="fs-6 stepper-right-f1 mt-2 mb-2">Card ${cardCount}</h6>
                </div>
                <div class="col-md-12 d-flex justify-content-end align-items-center">
                    <button class="btn btn-primary delete-credit-card-btn" data-credit-card-id="credit_card_${cardCount}">- Delete Card</button>
                </div>
            </div>
                    <div class="col-md-4 mb-3">
                        <label for="card_number_${cardArreyIndex}" class="mb-2">Card Number</label>
                        <input name="card_number[${cardArreyIndex}]" maxlength="16" type="number" class="form-control wizard-required chk_card_number_cls" id="card_number_${cardArreyIndex}" required data-card-validator="true">
                        <p class="text_danger form_error" id="validation_msg_${cardArreyIndex}"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nickname_${cardArreyIndex}" class="mb-2">Card Nick Name</label>
                        <input name="nickname[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="nickname_${cardArreyIndex}" data-card-validator="true">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="primary_first_name_${cardArreyIndex}" class="mb-2">Primary Card Holder First Name</label>
                        <input name="primary_first_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="primary_first_name_${cardArreyIndex}" required data-card-validator="true">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="primary_last_name_${cardArreyIndex}" class="mb-2">Primary Card Holder Last Name</label>
                        <input name="primary_last_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="primary_last_name_${cardArreyIndex}" data-card-validator="true">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cvc_${cardArreyIndex}" class="mb-2">CVC</label>
                        <input type="number" class="form-control" id="cvc_${cardArreyIndex}" name="cvc[${cardArreyIndex}]" required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="your-responce_${cardArreyIndex}" name="card_has_card_has_secondary_auth_user[${cardArreyIndex}]" data-card-validator="true">
                            <label class="form-check-label" for="your-responce_${cardArreyIndex}">Does this card have a secondary authorized user?</label>
                        </div>
                    </div>
                    <div class="mt-4 mb-5 p-3">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name_of_bank_${cardArreyIndex}" class="mb-2">Name of the Bank that issued my card is?</label>
                                <input name="name_of_bank[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="name_of_bank_${cardArreyIndex}" data-card-validator="true">
                                <p class="text_danger form_error"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="expiry_date_${cardArreyIndex}" class="mb-2">Expiry Date</label>
                                <input name="expiry_date[${cardArreyIndex}]" type="date" class="form-control wizard-required" id="expiry_date_${cardArreyIndex}" required data-card-validator="true">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    
            
            // Append the new card fields to the card form
            document.getElementById('cards_form').insertAdjacentHTML('beforeend', cardFieldsHtml);
            document.querySelector(`#credit_card_${cardCount} .delete-credit-card-btn`).addEventListener('click',
            function() {
                const cardId = this.getAttribute('data-credit-card-id');
                document.getElementById(cardId).remove();
            });
        });

        function validateCreditCard(cardNumber) {
            // Remove any spaces or dashes
            cardNumber = cardNumber.replace(/\D/g, '');
            
            // Check if empty, not a number, or starts with 0
            if (!cardNumber || isNaN(cardNumber) || cardNumber.charAt(0) === '0') {
                return {
                    isValid: false,
                    message: "Invalid card number - cannot be empty or start with 0"
                };
            }

            // Check length
            if (cardNumber.length < 13 || cardNumber.length > 19) {
                return {
                    isValid: false,
                    message: "Card number must be between 13 and 19 digits"
                };
            }

            // Check card type based on prefix
            const firstDigit = cardNumber.charAt(0);
            const firstTwoDigits = cardNumber.substring(0, 2);
            
            let cardType = "";
            if (firstDigit === '4') {
                cardType = "Visa";
            } else if (firstDigit === '5' || firstDigit === '2') {
                cardType = "Mastercard";
            } else if (firstTwoDigits === '34' || firstTwoDigits === '37') {
                cardType = "American Express";
            } else if (firstDigit === '6') {
                cardType = "Discover";
            } else if (['30', '36', '38', '39'].includes(firstTwoDigits)) {
                cardType = "Diners Club";
            } else {
                return {
                    isValid: false,
                    message: "Unrecognized card type"
                };
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

            const isValid = (sum % 10 === 0);
            
            return {
                isValid: isValid,
                cardType: isValid ? cardType : null,
                message: isValid ? `Valid ${cardType} card` : "Invalid card number (failed Luhn check)"
            };
        }

        // Enhanced validation setup
        function setupCardValidation(input) {
            input.addEventListener('input', function() {
                const index = this.id.split('_').pop();
                const validationMsg = document.getElementById(`validation_msg_${index}`);
                const result = validateCreditCard(this.value);
                
                if (result.isValid) {
                    validationMsg.textContent = result.message;
                    validationMsg.style.color = 'green';
                    this.setCustomValidity('');
                } else {
                    validationMsg.textContent = result.message;
                    validationMsg.style.color = 'red';
                    this.setCustomValidity(result.message);
                }
            });

            // Initial validation
            if (input.value) {
                input.dispatchEvent(new Event('input'));
            }
        }

        // Form submission validation
        function checkFieldSetChargesCard() {
            let isValid = true;
            const cardFields = document.querySelectorAll('.chk_card_number_cls');
            
            cardFields.forEach(field => {
                const result = validateCreditCard(field.value);
                const index = field.id.split('_').pop();
                const validationMsg = document.getElementById(`validation_msg_${index}`);
                
                if (!result.isValid) {
                    isValid = false;
                    validationMsg.textContent = result.message;
                    validationMsg.style.color = 'red';
                    field.setCustomValidity(result.message);
                }
            });

            if (!isValid) {
                alert('Please correct the invalid card numbers before proceeding.');
                return false;
            }

            return true; // Allow form submission if all cards are valid
        }

        // Setup validation on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.chk_card_number_cls').forEach(setupCardValidation);
        });

        // Add periodic validation check
        function validateCardFields() {
            const cardFields = document.querySelectorAll('[data-card-validator]');
            
            cardFields.forEach(field => {
                const value = field.value;
                
                // Remove any potentially dangerous characters
                const sanitizedValue = value.replace(/[;'"\\<>]/g, '');
                
                // Check for common SQL injection patterns
                const sqlPatterns = [
                    "INSERT", "UNION", "SELECT", "ORDER BY", "AND", "OR",
            "NOT", "NULL", "UPDATE", "INTRO", "DELETE",
            "COUNT", "SUM", "AVG", "LIKE", "WILDCARD",
            "SELECT", "INSERT", "UPDATE", "DELETE", "DROP", "UNION", "JOIN", 
            "WHERE", "FROM", "ALTER", "CREATE", "TABLE", "DATABASE", "TRUNCATE", 
            "EXEC", "HAVING", "GROUP BY", "ORDER BY", "MERGE", "GRANT", "REVOKE",
            "PROCEDURE", "FUNCTION", "TRIGGER", "INDEX", "VIEW", "SCHEMA", "INTO",
            "VALUES", "SET", "DECLARE", "EXECUTE", "SP_", "XP_", "--", ";--", ";",
            "WAITFOR", "DELAY", "SHUTDOWN", "BACKUP", "RESTORE", "PRINT", "/*", "*/"
                ];
                
                const containsSQLInjection = sqlPatterns.some(pattern => 
                    value.toUpperCase().includes(pattern)
                );
                
                if (containsSQLInjection || value !== sanitizedValue) {
                    field.value = sanitizedValue;
                    field.classList.add('is-invalid');
                    
                    // Find the nearest error message element
                    const errorElement = field.nextElementSibling?.classList.contains('text_danger') 
                        ? field.nextElementSibling 
                        : field.parentElement.querySelector('.text_danger');
                        
                    if (errorElement) {
                        errorElement.textContent = 'Invalid input detected';
                        errorElement.style.color = 'red';
                    }
                }
            });
        }

        // Run validation every 10 seconds
        setInterval(validateCardFields, 10000);

        // Also run validation on input
        document.addEventListener('input', function(e) {
            if (e.target.hasAttribute('data-card-validator')) {
                validateCardFields();
            }
        });
    </script>
</fieldset>
