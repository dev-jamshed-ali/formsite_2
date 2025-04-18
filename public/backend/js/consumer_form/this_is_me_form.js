$.validator.addMethod(
    "zipcode",
    function (value) {
        return /^\d{5}(-\d{4})?$/.test(value);
    },
    "Please enter a valid ZIP code (XXXXX or XXXXX-XXXX format)"
);

$.validator.addMethod(
    "alphabet_only",
    
    function (value) {
        return /^[a-zA-Z]+$/.test(value);
    },
    "Use only char"
);
$.validator.addMethod(
    "no_sql_keywords_and_special_chars",
    function (value, element) {
        const forbiddenKeywords = [
            "INSERT", "UNION", "SELECT", "ORDER BY", "AND", "OR",
            "NOT", "NULL", "UPDATE", "INTRO", "DELETE",
            "COUNT", "SUM", "AVG", "LIKE", "WILDCARD"
        ];

        const specialChars = /[!@#$%^&*()_+={}:"<>]/g;
        const consecutiveSpaces = /\s{2,}/g; // Regex to check for two or more consecutive spaces
        let upperValue = value.toUpperCase();
        let originalValue = value;

        // Remove forbidden SQL keywords
        forbiddenKeywords.forEach(keyword => {
            const regex = new RegExp(keyword, 'gi');
            originalValue = originalValue.replace(regex, '');
        });

        // Remove special characters
        originalValue = originalValue.replace(specialChars, '');

        // Remove consecutive spaces
        originalValue = originalValue.replace(consecutiveSpaces, ' ');

        // Update the element value to reflect cleaned input
        $(element).val(originalValue);

        // Return true if the value matches the cleaned value, otherwise false
        return value === originalValue;
    },
    "Input contains forbidden SQL keywords, special characters, or extra spaces, and they have been removed."
);

$.validator.addMethod(
    "no_sql_keywords_and_special_chars_for_email",
    function (value, element) {
        // List of forbidden SQL keywords
        const forbiddenKeywords = [
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
        const specialChars = /[!#$%^&*()_+={}:"<>]/g;
        let upperValue = value.toUpperCase();
        let originalValue = value;
        forbiddenKeywords.forEach(keyword => {
            const regex = new RegExp(keyword, 'gi');
            originalValue = originalValue.replace(regex, '');
        });
        originalValue = originalValue.replace(specialChars, '');
        $(element).val(originalValue);
        return value === originalValue;
    },
    "Input contains forbidden SQL keywords or special characters, and they have been removed"
);

$.validator.addMethod(
    "no_sql_keywords_and_special_chars_for_phone",
    function (value, element) {
        // For phone numbers, we only want to allow digits, parentheses, spaces, and hyphens
        const allowedChars = /^[\d\s()\-]+$/;
        return allowedChars.test(value);
    },
    "Please enter a valid phone number using only digits, spaces, and standard formatting characters"
);

let dob_age;
$.validator.addMethod("DOB", function (value, element) {
    let dob = new Date(value);
    let today = new Date();
    let age = today.getFullYear() - dob.getFullYear();

    let monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    dob_age = age;
    return age >= 18 && age <= 100;
}, function (value, element) {
    if (dob_age < 18) {
        return 'You must be at least 18 years old.';
    } else if (dob_age > 100) {
        return 'You must be less than 100 years old.';
    }
    return false;
});

// Phone number formatter and validator
$.validator.addMethod(
    "phone_format",
    function (value, element) {
        return this.optional(element) || /^\(\d{3}\) \d{3}-\d{4}$/.test(value);
    },
    "Please enter a valid phone number in format (XXX) XXX-XXXX"
);

// Format phone numbers as they are typed
function formatPhoneNumber(input) {
    let value = input.val().replace(/[^\d\s()\-]/g, ''); // Only allow digits, spaces, parentheses, and hyphens
    if (value.length > 0) {
        // Remove any existing formatting
        value = value.replace(/\D/g, '');
        
        if (value.length <= 3) {
            value = `(${value}`;
        } else if (value.length <= 6) {
            value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
        } else {
            value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
        }
    }
    // Ensure we don't exceed 14 characters (including formatting)
    if (value.length > 14) {
        value = value.substring(0, 14);
    }
    input.val(value);
}

// Apply formatting to all phone number fields
$('input[name="primary_mobile_number"], input[name="alternate_area_code"]').on('input blur focus', function(e) {
    formatPhoneNumber($(this));
});

// Handle paste events
$('input[name="primary_mobile_number"], input[name="alternate_area_code"]').on('paste', function(e) {
    setTimeout(() => {
        formatPhoneNumber($(this));
    }, 0);
});

// Maintain format when leaving the field
$('input[name="primary_mobile_number"], input[name="alternate_area_code"]').on('blur', function() {
    let value = $(this).val().replace(/\D/g, '');
    if (value.length > 0) {
        if (value.length <= 3) {
            value = `(${value})`;
        } else if (value.length <= 6) {
            value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
        } else {
            value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
        }
        $(this).val(value);
    }
});

// Prevent input beyond max length and maintain format
$('input[name="primary_mobile_number"], input[name="alternate_area_code"]').on('keydown keyup', function(e) {
    let cursorPos = this.selectionStart;
    let value = $(this).val();
    
    // If we're at max length and not pressing backspace/delete/arrows
    if (value.length >= 14 && 
        ![8, 46, 37, 38, 39, 40].includes(e.keyCode) && 
        !e.ctrlKey && !e.metaKey) {
        e.preventDefault();
        return false;
    }
    
    // Maintain cursor position after formatting
    if (cursorPos) {
        this.selectionStart = cursorPos;
        this.selectionEnd = cursorPos;
    }
});

// Prevent non-numeric input except for allowed special characters
$('input[name="primary_mobile_number"], input[name="alternate_area_code"]').on('keypress', function(e) {
    // Allow: backspace, delete, tab, escape, enter
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
    }
    // Allow only numbers
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

// SQL keywords validation
$.validator.addMethod("no_sql_keywords", function(value, element) {
    const sqlKeywords = /\b(SELECT|INSERT|UPDATE|DELETE|DROP|UNION|JOIN|WHERE|FROM|ALTER|CREATE|TABLE|DATABASE|TRUNCATE|EXEC|HAVING|GROUP BY)\b/i;
    return !sqlKeywords.test(value);
}, "Invalid input: SQL keywords are not allowed");

// Add SSN validation function
function isValidSSN(ssn) {
    // Remove any non-digits and spaces
    ssn = ssn.replace(/[^\d]/g, '');

    // Must be 9 digits
    if (ssn.length !== 9) {
        return {
            isValid: false,
            message: "SSN must be 9 digits"
        };
    }

    // Check for repeating digits
    if (/(\d)\1{8}/.test(ssn)) {
        return {
            isValid: false,
            message: "Invalid SSN: Cannot contain same digit 9 times"
        };
    }

    // Check first three digits (area number)
    const areaNumber = parseInt(ssn.substring(0, 3));
    
    // Check if area number is valid
    if (areaNumber === 0) {
        return {
            isValid: false,
            message: "Area number cannot be 000"
        };
    }

    if (areaNumber === 666) {
        return {
            isValid: false,
            message: "Invalid area number"
        };
    }

    if (areaNumber > 772 && ssn[0] !== '9') {
        return {
            isValid: false,
            message: "Invalid area number range"
        };
    }

    // Check for green card temporary SSN
    if (ssn[0] === '9') {
        if (ssn[3] !== '7' && ssn[3] !== '8') {
            return {
                isValid: false,
                message: "Invalid temporary SSN format"
            };
        }
    }

    // Check group number (middle two digits)
    const groupNumber = ssn.substring(3, 5);
    if (groupNumber === '00') {
        return {
            isValid: false,
            message: "Group number cannot be 00"
        };
    }

    // Check serial number (last four digits)
    const serialNumber = ssn.substring(5, 9);
    if (serialNumber === '0000') {
        return {
            isValid: false,
            message: "Serial number cannot be 0000"
        };
    }

    // Check for obviously fake numbers
    if (ssn === '123456789' || ssn === '123121234') {
        return {
            isValid: false,
            message: "Invalid SSN: Obviously fake number"
        };
    }

    // Add validation for blacklisted SSNs
    const blacklistedSSNs = [
        '078051120', // Woolworth wallet SSN
        '219099999', // Commonly used fake SSN
        '111111111',
        '222222222',
        '333333333',
        '444444444',
        '555555555',
        '777777777',
        '888888888',
        '999999999'
    ];

    if (blacklistedSSNs.includes(ssn)) {
        return {
            isValid: false,
            message: "Invalid SSN: Known invalid number"
        };
    }

    return {
        isValid: true,
        message: "Valid SSN"
    };
}

// Add jQuery validation method for SSN
$.validator.addMethod("valid_ssn", function(value, element) {
    const result = isValidSSN(value);
    if (!result.isValid) {
        $.validator.messages.valid_ssn = result.message;
    }
    return result.isValid;
}, "Invalid SSN");

// Add input formatter and validator for SSN fields
$(document).on('input', 'input[name="social_security_no"], input[name="verify_social_security_no"]', function() {
    let value = this.value.replace(/\D/g, '');
    
    // Format as XXX-XX-XXXX
    if (value.length > 0) {
        if (value.length <= 3) {
            value = value;
        } else if (value.length <= 5) {
            value = value.slice(0, 3) + '-' + value.slice(3);
        } else {
            value = value.slice(0, 3) + '-' + value.slice(3, 5) + '-' + value.slice(5, 9);
        }
    }
    
    this.value = value;
    
    // Validate if complete SSN entered
    if (value.replace(/\D/g, '').length === 9) {
        const result = isValidSSN(value);
        const errorElement = $(this).siblings('.text_danger');
        if (!result.isValid) {
            errorElement.text(result.message);
            $(this).addClass('invalid').removeClass('valid');
        } else {
            errorElement.text('');
            $(this).addClass('valid').removeClass('invalid');
        }
    }
});

$("#this_is_me_form").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.siblings("p"));
    },
    onkeyup: function (element) {
        var element_id = $(element).attr("id");
        if (this.settings?.rules[element_id]?.onkeyup !== false) {
            $(element).valid();
        }
    },
    rules: {
        fname: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            minlength: 2,
            maxlength: 32,
            alphabet_only: true,
        },
        lname: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            minlength: 2,
            maxlength: 32,
            alphabet_only: true,
        },
        middle_initial: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 1,
            maxlength: 1,
            alphabet_only: true,

        },
        suffix: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 2,
            maxlength: 8,
            alphabet_only: true,
        },
        email: {
            // no_sql_keywords_and_special_chars_for_email: true,
            required: true,
            email: true,
            minlength: 8,
            maxlength: 32,
            // noemail: true,

        },
        nick_name: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 1,
            maxlength: 32,
            alphabet_only: true,
        },
        date_of_birth: {
            no_sql_keywords_and_special_chars: true,
            DOB: true,
            required: true,
            date: true,
            maxlength: 32,
            max: new Date().toISOString().split('T')[0]
        },
        social_security_no: {
            required: true,
            valid_ssn: true
        },
        verify_social_security_no: {
            required: true,
            valid_ssn: true,
            equalTo: "#social_security_no"
        },
        // Find me here form
        house_address: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            minlength: 1,
            maxlength: 45,
        },
        building_name: {
            required: true,
            no_sql_keywords_and_special_chars: true,
            minlength: 3,
            maxlength: 50,
            alphabet_only: true,
        },
        apartment_no: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 10,
        },
        street_name: {
            required: true,
            no_sql_keywords_and_special_chars: true,
            // minlength: 5,
            maxlength: 50,
        },
        state: {
            required: true,
            no_sql_keywords_and_special_chars: true,
        },
        city: {
            no_sql_keywords_and_special_chars: true,
            required: true,
        },
        town: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        township: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        parish: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        village: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        hamlet: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        district: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 3,
            maxlength: 30,
        },
        county: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        neighborhood_name: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },

        zipcode: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            minlength: 4,
            maxlength: 30,
        },

        urbanization_name: {
            no_sql_keywords_and_special_chars: true,
            required: false,
        },

        house_type: {
            no_sql_keywords_and_special_chars: true,
            required: false,
        },

        house_number: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 1,
            maxlength: 30,
        },

        building_name: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            minlength: 4,
            maxlength: 30,
        },
        primary_mobile_number: {
            required: true,
            phone_format: true,
            no_sql_keywords_and_special_chars_for_phone: true,
            minlength: 1,
            maxlength: 14
        },
        alternate_area_code: {
            no_sql_keywords_and_special_chars_for_phone: true,
            minlength: 1,
            maxlength: 14
        },
        alternate_telephone_number: {
            // phone_format: true,
            // no_sql_keywords_and_special_chars_for_phone: true,
            minlength: 1,
            maxlength: 14
        },
        //gender identity
        sex_at_birth: {
            required: true,
            no_sql_keywords_and_special_chars: true,
        },
        legal_sex: {
            required: true,
            // no_sql_keywords_and_special_chars: true,
        },
        self_identify_sex: {
            required: false,
            // no_sql_keywords_and_special_chars: true,
        },
        //Ethnicity Information
        Ethnicity: {
            required: true,
            minlength: 1,
            maxlength: 30,
            // no_sql_keywords_and_special_chars: true,
        },
        marital_status: {
            required: false,
            minlength: 1,
            maxlength: 30,
        },
        height: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 10,
            minlength: 1,
            min: 21, // Minimum height in inches
            digits: true
        },
        weight: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 10,
            minlength: 1,
            min: 5, // Minimum weight in pounds
            digits: true
        },
        complexion: {
            required: false,
            maxlength: 30,
            minlength: 1,
        },
        //My Neighborhood is

        neighborhood_race_right: {
            required: false,
            maxlength: 32,
            // no_sql_keywords_and_special_chars: true,
        },
        name_of_neighborhood_household_head_right: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        neighborhood_house_address_right: {
            digits: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        neighborhood_guid_right: {
            no_sql_keywords: true,
            maxlength: 100,
        },
        provide_neigborhood_address_right: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        neighborhood_race_left: {
            // no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        name_of_neighborhood_household_head_left: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        neighborhood_guid_left: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 32,
        },
        neighborhood_house_address_left: {
            digits: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        provide_neigborhood_address_left: {
            maxlength: 100,
        },
        neighborhood_race_front: {
            required: false,
            maxlength: 32,
        },
        name_of_neighborhood_household_head_front: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        neighborhood_house_address_front: {
            digits: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        neighborhood_guid_front: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        provide_neigborhood_address_front: {
            maxlength: 100,
        },
        neighborhood_race_back: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        name_of_neighborhood_household_head_back: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 32,
        },
        neighborhood_guid_back: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 32,
        },
        neighborhood_house_address_back: {
            digits: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 100,
        },
        provide_neigborhood_address_back: {
            maxlength: 100,
        },
        //Employment Information

        employer_name: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 26,
        },
        job_title: {
            required: true,
            maxlength: 45,
            no_sql_keywords_and_special_chars: true,    
        },
        employer_identification_number: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 16,
        },
        anual_salary_last_year: {
            required: true,
            maxlength: 32,
        },
        labor_union_name: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 16,
        },
        your_union_membership_number: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 16,
        },
        membership_start: {
            no_sql_keywords_and_special_chars: true,
            // required: true,
        },
        membership_end: {
            no_sql_keywords_and_special_chars: true,
            // required: true,
        },
        union_contact_info: {
            no_sql_keywords_and_special_chars: true,
            // required: true,
        },
        //Special Licenses
        passport_number: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 26,
        },
        alien_id_number: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 26,
        },
        dual_citizen_ship: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 26,
        },
        visa_purpose: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 26,
        },
        visa_number: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 26,
        },
        us_visa_expiration_date: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 26,
        },
        state_driver_license: {
            required: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 26,
        },
        state_driver_license_no: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 30,
        },
        state_id_no: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 30,
        },
        state_hunting: {
            required: true,
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        state_hunting_no: {
            no_sql_keywords_and_special_chars: true,
            required: true,
            maxlength: 30,
        },
        us_state: {
            required: true,
            no_sql_keywords_and_special_chars: true,
        },
        state_fishing: {
            required: false,
            maxlength: 30,
            no_sql_keywords_and_special_chars: true,
        },
        state_fishing_no: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 30,
        },
        state_pilot_license: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 30,
        },
        state_pilot_license_no: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 30,
        },
        state_handgun_firearm: {
            no_sql_keywords_and_special_chars: true,
            required: false,
            maxlength: 30,
        },

        state_handgun_firearm_no: {
            no_sql_keywords_and_special_chars: true,
            minlength: 1,
            maxlength: 30,
        },

        state_medicaid: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        state_medicaid_no: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        state_medicare: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        state_medicare_no: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        us_military_branch: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        us_military_branch_no: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        bureau_of_indian_affair_card_no: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        
        tribal_id_card_no: {
            no_sql_keywords_and_special_chars: true,
            maxlength: 30,
        },
        how_you_heared_about_us: {
            required: true,
            no_sql_keywords_and_special_chars: true,
        },
    },
    messages: {
        date_of_birth: {
            max: "Are you from Future?"
        },
        primary_mobile_number: {
            required: "Primary Mobile Area Code & Number is required",
            phone_format: "Please enter a valid phone number in format (XXX) XXX-XXXX",
            // no_sql_keywords_and_special_chars_for_phone: "Please enter a valid phone number"
        },
        alternate_telephone_number: {
            // phone_format: "Please enter a valid phone number in format (XXX) XXX-XXXX",
            // no_sql_keywords_and_special_chars_for_phone: "Please enter a valid phone number"
        },
        alternate_area_code: {
            no_sql_keywords_and_special_chars_for_phone: "Please enter a valid area code"
        },
        height: {
            required: "Height is required",
            min: "Height must be at least 21 inches",
            digits: "Please enter only numbers"
        },
        weight: {
            required: "Weight is required",
            min: "Weight must be at least 5 pounds",
            digits: "Please enter only numbers"
        },
        neighborhood_house_address_right: {
            digits: "Please enter only numbers"
        },
        neighborhood_house_address_left: {
            digits: "Please enter only numbers"
        },
        neighborhood_house_address_front: {
            digits: "Please enter only numbers"
        },
        neighborhood_house_address_back: {
            digits: "Please enter only numbers"
        },
        social_security_no: {
            required: "SSN is required"
        },
        verify_social_security_no: {
            required: "Please verify your SSN",
            equalTo: "SSN numbers do not match"
        }
    },
});

// Smart ZIP code formatter with auto-fill support
$('input[name="zipcode"]').on('input', function(e) {
    let input = $(this);
    let value = input.val().replace(/[^\d-]/g, '');
    
    // Handle backspace/delete
    if (e.keyCode === 8 || e.keyCode === 46) {
        return;
    }
    
    // Remove existing hyphen
    value = value.replace(/-/g, '');
    
    // Format as ZIP+4 if length > 5
    if (value.length > 5) {
        value = value.substring(0, 5) + '-' + value.substring(5, 9);
    }
    
    // Limit to maximum of 10 characters (XXXXX-XXXX)
    value = value.substring(0, 10);
    
    input.val(value);
});

// Auto-format pasted ZIP codes
$('input[name="zipcode"]').on('paste', function(e) {
    setTimeout(() => {
        let input = $(this);
        let value = input.val().replace(/[^\d-]/g, '');
        
        // Remove existing hyphen
        value = value.replace(/-/g, '');
        
        // Format as ZIP+4 if length > 5
        if (value.length > 5) {
            value = value.substring(0, 5) + '-' + value.substring(5, 9);
        }
        
        // Limit to maximum of 10 characters (XXXXX-XXXX)
        value = value.substring(0, 10);
        
        input.val(value);
    }, 0);
});

function move_to_next_step(nextWizardStep, bar_id, next_bar_id) {
    console.log('Moving to next step', nextWizardStep, bar_id, next_bar_id);
    var parentFieldset = $("#find_me_here_next_button").parents(
        ".wizard-fieldset"
    );
    var currentActiveStep = $("#find_me_here_next_button")
        .parents(".form-wizard")
        .find(".stepper-item.active");
    var next = $("#find_me_here_next_button");

    if (nextWizardStep) {
        next.parents(".wizard-fieldset").removeClass("show", "400");
        currentActiveStep
            .removeClass("active")
            .addClass("activated")
            .next()
            .addClass("active", "400");
        next.parents(".wizard-fieldset")
            .next(".wizard-fieldset")
            .addClass("show", "400");
        parentFieldset.hide();

        next.parents(".wizard-fieldset").next(".wizard-fieldset").show();

        progress_bar = progress_bar + 5.9;
        console.log(progress_bar);
        let text = next
            .parents(".wizard-fieldset")
            .next(".wizard-fieldset")
            .find("h5")
            .text();
        console.log(text);
        $(".progress-bar")
            .css("width", progress_bar + "%")
            .text(text);
        jQuery(document)
            .find(".wizard-fieldset")
            .each(function () {
                if ($("#find_me_here_next_button").hasClass("show")) {
                    var formAtrr = $("#find_me_here_next_button").attr(
                        "data-tab-content"
                    );
                }
            });
    }

    if (nextWizardStep) {
        $(`#${bar_id}`).addClass("completed");
        $(`#${bar_id}`).children("div").eq(0).addClass("text-white");
        $(`#${bar_id}`).removeClass("active");
        $(`#${next_bar_id}`).addClass("active");
    }
    isSomeInputChanged = false;
}

function move_to_previous_step(prevWizardStep, bar_id, prev_bar_id) {
    if (prevWizardStep) {
        $(`#${bar_id}`).removeClass("completed");
        $(`#${bar_id}`).children("div").eq(0).removeClass("text-white");
        $(`#${bar_id}`).removeClass("show").hide();
        console.log('Moving from:',bar_id)
        $(`#${prev_bar_id}`).addClass("show").show()
    }
    isSomeInputChanged = false;
}
function store_this_is_me_form_data(data, next_button_id, goto_next = true) {

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    ///url = "/ginicoe/admin/consumer/this-is-me-store";
    const routeParts = window.location.pathname.split("/admin");
    let prefix = routeParts.length ? routeParts[0] : '';
    url = prefix + "/admin/consumer/this-is-me-store";
    $.ajax({
        type: "post",
        url: url,
        data: data,

        dataType: "JSON",

        success: function (data) {
            if (data.success) {
                if (data?.data) {
                    console.log('resss', data);
                    var img = $("#facial_image_thumbnail");
                    // set the source of the image
                    img.attr("src", `${data?.data?.facial_image}`);
                } else {
                    if (goto_next) {
                        next_step(next_button_id);
                    }
                }
            }
        },
    });
}


function store_this_is_me_form_data_image(data, next_button_id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //url = "/ginicoe/admin/consumer/this-is-me-store";
    const routeParts = window.location.pathname.split("/admin");
    let prefix = routeParts.length ? routeParts[0] : '';
    url = prefix + "/admin/consumer/this-is-me-store";

    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "JSON",
        enctype: "multipart/form-data",
        success: function (data) {
            if (data.success) {
                if (data?.data) {
                    console.log(data?.data?.facial_image);
                    var img = $("#facial_image_thumbnail");
                    // set the source of the image
                    img.attr("src", `${data?.data?.facial_image}`);
                } else {
                    next_step(next_button_id);
                }
            }
        },
    });
}

function next_step(next_button_id) {
    var parentFieldset = $(`#${next_button_id}`).parents(".wizard-fieldset");

    var next = $(`#${next_button_id}`);
    next.parents(".wizard-fieldset").removeClass("show").css("display", "none");
    next.parents(".wizard-fieldset").next(".wizard-fieldset").addClass("show").css("display", "block");

    progress_bar = progress_bar + 5.9;
    console.log(progress_bar);
  

    jQuery(document)
        .find(".wizard-fieldset")
        .each(function () {
            if ($("#find_me_here_next_button").hasClass("show")) {
                var formAtrr = $("#find_me_here_next_button").attr(
                    "data-tab-content"
                );
            }
        });
}

function previousStep(current_bar, previous_bar) {
    $(`#${previous_bar}`).removeClass("completed");
    $(`#${previous_bar}`).children("div").eq(0).removeClass("text-white");
    $(`#${previous_bar}`).addClass("active");
    $(`#${current_bar}`).removeClass("active");
}

function switchFieldset(fieldset, element) {
    if (!$(element).hasClass('set-filled')) {
        return;
    }
    $("fieldset").hide();
    $(`#${fieldset}`).show();
    console.log("this is switch", $(element));
    var currentDiv = $(element);
    console.log(currentDiv);
    currentDiv.addClass("active");
    currentDiv.prevAll(".stepper-item").addClass("completed");
    currentDiv.prevAll(".stepper-item").removeClass("active");
    currentDiv
        .prevAll(".stepper-item")
        .find(".step-counter")
        .addClass("text-white");
    currentDiv.nextAll(".stepper-item").removeClass("active completed");
}

function switchFieldsetFromSideBar(fieldset, element) {
    $("fieldset").hide();
    $(`#${fieldset}`).show();

    var currentDiv = $(`#${element}`);
    console.log(currentDiv);
    currentDiv.addClass("active");
    currentDiv.prevAll(".stepper-item").addClass("completed");
    currentDiv.prevAll(".stepper-item").removeClass("active");
    currentDiv
        .prevAll(".stepper-item")
        .find(".step-counter")
        .addClass("text-white");
    currentDiv.nextAll(".stepper-item").removeClass("active completed");
}
function returnLater(fieldset, module) {
    console.log("Next wizard ", nextWizardStep);
   var data = {};
    $(`#${fieldset} input`).each(function () {
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
    $(`#${fieldset} select`).each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    $(`#${fieldset} textarea`).each(function () {
        data[$(this).attr("name")] = $(this).val();
    });
    if(isSomeInputChanged){
        store_this_is_me_form_data(data, null, false)
        const routeParts = window.location.pathname.split("/admin");
        let prefix = routeParts.length ? routeParts[0] : '';
        url = prefix+"/admin/consumer/return-later";
        $.ajax({
            type: "get",
            url: url,
            data: { fieldset_id: fieldset, module: module },
            dataType: "JSON",
            success: function (data) {
                if (data.success) {
                    toastr.success("Form Saved successfully");
                }
            },
        });
    }else{
        toastr.info("Nothing changed!");
    }
    const allSteps = $(".wizard-fieldset").toArray();
    var currentStepId = '';
    var lastStepId = '';
    for (let index = 0; index < allSteps.length; index++) {
                const currentStepElem = allSteps[index];
                if ($(currentStepElem).hasClass("show")) {
                    currentStepId = $(currentStepElem).attr("id");
                    break;
                }
                lastStepId = $(currentStepElem).attr("id");
                }   
    console.log("Moving " , currentStepId , lastStepId );
    move_to_previous_step(true , currentStepId , lastStepId);

}

var currentDiv = $(".stepper-item.active");
console.log(currentDiv);
currentDiv.addClass("active");
currentDiv.prevAll(".stepper-item").addClass("completed");
currentDiv.prevAll(".stepper-item").removeClass("active");
currentDiv
    .prevAll(".stepper-item")
    .find(".step-counter")
    .addClass("text-white");
currentDiv.nextAll(".stepper-item").removeClass("active completed");
function add_disable_property(input_names) {
    input_names.forEach(function (element, index, array) {
        $(`#${element}`).prop('disabled', true)
    });
}

// Enhanced provide_address function to clear fields when checked
function provide_address(id, parentDivId) {
    const checkbox = document.getElementById(id);
    const value = checkbox.checked ? 1 : 0;
    const parentDiv = document.getElementById(parentDivId);
    const inputs = parentDiv.querySelectorAll('input, select');

    inputs.forEach(input => {
        if (input.type !== 'checkbox' && input.id !== id) {
            input.disabled = value === 1;
            
            // Clear fields if checkbox is checked
            if (value === 1) {
                if (input.type === 'select-one') {
                    input.selectedIndex = 0;
                } else {
                    input.value = '';
                }
            }
            
            // Update required status
            input.required = value === 0;
        }
    });
}

// Remove number input spinners from GUID fields
$('input[id$="_guid_right"], input[id$="_guid_left"], input[id$="_guid_front"], input[id$="_guid_back"]').on('focus', function() {
    $(this).attr('type', 'text');
}).on('blur', function() {
    if (!/^[a-zA-Z0-9]+$/.test($(this).val())) {
        $(this).val('');
    }
});

// // Force house address fields to be numeric only
// $('input[id*="house_address"]').on('input', function() {
//     this.value = this.value.replace(/\D/g, '');
// });

// // Prevent paste of non-numeric values in house address fields
// $('input[id*="house_address"]').on('paste', function(e) {
//     const pastedText = (e.originalEvent.clipboardData || window.clipboardData).getData('text');
//     if (!/^\d+$/.test(pastedText)) {
//         e.preventDefault();
//     }
// });
