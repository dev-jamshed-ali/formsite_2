/* jQuery( document ).ready(function($) { */
    $.validator.addMethod('noemail', function(value) {
        return /.+@(gmail|ginicoe|yahoo|aol|zoho|edu|proton|mail|tutanota|icloud|hotmail|outlook)\.com$/
            .test(value);
    }, 'This email address is not allowed.');
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Please enter Letters only");

    jQuery.validator.addMethod("numeric_only", function(value, element) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
    }, "Please Enter valid phone number");

    $.validator.addMethod("strong_password", function(value, element) {
        let password = value;
        if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&()])(.{8,32}$)/.test(password))) {
            return false;
        }
        return true;
    }, function(value, element) {
        let password = $(element).val();
        if (!(/^(.{8,20}$)/.test(password))) {
            return 'Password must be between 8 to 32 characters long.';
        } else if (!(/^(?=.*[A-Z])/.test(password))) {
            return 'Password must contain at least one uppercase.';
        } else if (!(/^(?=.*[a-z])/.test(password))) {
            return 'Password must contain at least one lowercase.';
        } else if (!(/^(?=.*[0-9])/.test(password))) {
            return 'Password must contain at least one digit.';
        } else if (!(/^(?=.*[@#$%&()])/.test(password))) {
            return "Password must contain special characters from @#$%&.";
        }
        return false;
    });

    $.validator.addMethod("no_space", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "Spaces are not allowed.");

    $.validator.addMethod("only_dash", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\-]+$/.test(value);
    }, "Only dash allowed from meta char");

   
    
/* }); */
