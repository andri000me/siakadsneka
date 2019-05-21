var ComponentsFormTools = function () {

    

    var handleBootstrapSwitch = function() {

        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioState');
        });

        // or
        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioStateAllowUncheck');
        });

        // or
        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioStateAllowUncheck', false);
        });

    }

    var handleBootstrapTouchSpin = function() {

        $("#touchspin_demo1").TouchSpin({          
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        }); 
        
        $("#touchspin_demo2").TouchSpin({
            buttondown_class: 'btn blue',
            buttonup_class: 'btn blue',
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });         

        $("#touchspin_demo3").TouchSpin({          
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            prefix: "$",
            postfix: "%"
        });
    }

    var handleBootstrapMaxlength = function() {
        $('#maxlength_defaultconfig').maxlength({
            limitReachedClass: "label label-danger",
        })
    
        $('#maxlength_thresholdconfig').maxlength({
            limitReachedClass: "label label-danger",
            threshold: 20
        });

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
         $("#ofani").inputmask("y/y", {
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

         $("#mask_number_nis").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"

         $("#mask_number_nomorijazah").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
         

         
       $(".datanis-siswa-tambah").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        });
         

         $("#mask_number_nisn").inputmask({
            "mask": "9",
            "repeat": 15,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"

         $("#mask_handphonesiswa").inputmask({
            "mask": "9",
            "repeat": 14,
            "greedy": false
        });
         $("#mask_handphoneayah").inputmask({
            "mask": "9",
            "repeat": 14,
            "greedy": false
        });

         $("#mask_handphoneibu").inputmask({
            "mask": "9",
            "repeat": 14,
            "greedy": false
        });

         $("#mask_handphonewali").inputmask({
            "mask": "9",
            "repeat": 14,
            "greedy": false
        });

         $("#mask_telprumah").inputmask({
            "mask": "9",
            "repeat": 12,
            "greedy": false
        });

         $("#mask_tahunijazah").inputmask({
            "mask": "9",
            "repeat": 4,
            "greedy": false
        });

          $("#mask_absen").inputmask({
            "mask": "9",
            "repeat": 2,
            "greedy": false
        });

           $("#mask_jumlahsiswa").inputmask({
            "mask": "9",
            "repeat": 2,
            "greedy": false
        });





    
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
    
            handleBootstrapSwitch();
            handleBootstrapTouchSpin();
            handleBootstrapMaxlength();
            handleInputMasks();
            handlePasswordStrengthChecker();
           
        }
    };

}();