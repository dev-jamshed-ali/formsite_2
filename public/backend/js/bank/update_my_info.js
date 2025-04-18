

$("#update_my_info_form").validate({
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
        financial_institution_name:{
            required:true,
            maxlength: 40,
        },
        first_name:{
            required:true,
            maxlength: 40,
        },

        last_name:{
            required:true,
            maxlength: 40,
        },
        primary_job_title:{
            required:true,
        },
        contact_info:{
            required:true,
        },
        total_asset_size:{
            required:true,

        },
        daily_trade_volume:{
            required:true,
        },

        mortage_loans:{
            required:true,
            maxlength: 10,
        },

        credit_card:{
            required:true,
            maxlength: 10,
        },

        debit_card:{
            required:true,
            maxlength: 10,
        },
        wealth_advisor:{
            required:true,
            maxlength: 10,
        },
        state:{
            required:true,
        },
        help_description:{
            required:true,
            maxlength: 140,
        },
        bank_identification_no:{
            required:true,
            maxlength:6,
            
        }
    },
    messages: {},
});