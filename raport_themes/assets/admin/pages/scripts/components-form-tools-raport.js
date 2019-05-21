var RaportFormTools = function () {

    var handleBootstrapMaxlength = function() {
        $('#maxlength_defaultconfig').maxlength({
            limitReachedClass: "label label-danger",
        })
    
        $('#maxlength_thresholdconfig').maxlength({
            limitReachedClass: "label label-danger",
            threshold: 20
        });
        
        $('#maxlength_defaultconfig2').maxlength({
            limitReachedClass: "label label-danger",
        })
         

        $('#maxlength_alloptions').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            separator: ' out of ',
            preText: 'You typed ',
            postText: ' chars available.',
            validate: true
        });

        $('#maxlength_textarea').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true
        });

        $('#maxlength_placement').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true,
            placement: Metronic.isRTL() ? 'top-right' : 'top-left'
        });
    }

    
    var handleInputMasks = function () {
        $.extend($.inputmask.defaults, {
            'autounmask': true
        });

        $("#mask_date").inputmask("d/m/y", {
            autoUnmask: true
        }); //direct mask        
        $("#mask_date1").inputmask("d/m/y", {
            "placeholder": "*"
        }); //change the placeholder
         $("#raport-tahun").inputmask("y/y", {
            "placeholder": "y"
        });
        $("#raport-tahun-modal").inputmask("y/y", {
            "placeholder": "y"
        });
        $("#mask_date2").inputmask("d/m/y", {
            "placeholder": "dd/mm/yyyy"
        }); //multi-char placeholder
        $("#mask_phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        }); //specifying fn & options
        $("#mask_tin").inputmask({
            "mask": "99-9999999",
            placeholder: "" // remove underscores from the input mask
        }); //specifying options only
        $("#mask_number").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
        $("#mask_decimal").inputmask('decimal', {
            rightAlignNumerics: false
        }); //disables the right alignment of the decimal input
        $("#mask_currency").inputmask('€ 999.999.999,99', {
            numericInput: true
        }); //123456  =>  € ___.__1.234,56

        $("#mask_currency2").inputmask('€ 999,999,999.99', {
            numericInput: true,
            rightAlignNumerics: false,
            greedy: false
        }); //123456  =>  € ___.__1.234,56
        $("#mask_ssn").inputmask("999-99-9999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
        }); //default
    }


    var handlePasswordStrengthChecker = function () {
        var initialized = false;
        var input = $("#password_strength");

        input.keydown(function () {
            if (initialized === false) {
                // set base options
                input.pwstrength({
                    raisePower: 1.4,
                    minChar: 8,
                    verdicts: ["Weak", "Normal", "Medium", "Strong", "Very Strong"],
                    scores: [17, 26, 40, 50, 60]
                });

                // add your own rule to calculate the password strength
                input.pwstrength("addRule", "demoRule", function (options, word, score) {
                    return word.match(/[a-z].[0-9]/) && score;
                }, 10, true);

                // set as initialized 
                initialized = true;
            }
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            
            handleBootstrapMaxlength();
            handleInputMasks();
            handlePasswordStrengthChecker();
            
        }
    };

}();