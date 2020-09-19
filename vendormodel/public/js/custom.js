$(document).ready(function(){


    
     ///
     $('[name="terms_condition"]').click(function () {
            if ($(this).prop("checked") == true) {
                $('#first_next').addClass('trans-btn');
                $('#first_next').removeAttr('disabled', 'disabled');
                $('#first_next').removeClass('disabled');
            } else if ($(this).prop("checked") == false) {
                $('#first_next').removeClass('trans-btn');
                $('#first_next').attr('disabled', 'disabled');
                $('#first_next').addClass('disabled');
            }
        });

        ///
        disable_letter();
        function disable_letter(){
            $('#customer_number').keydown(function(e)
            {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });
        }
        ///
     $('#first_next').click(function(){

        if(!$('#brand_name').val()){

            swal({
                title: "Something Missing",
                text: "Please provide Brand Name!",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#5D926E",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Okay",
                closeOnConfirm: false
              })
        }else{
            $('#registration_form_first').submit();
        }
    
    
    })
    $('#second_next').click(function(){
        var number = $('#customer_number').val();
        console.log(number);
        if(!$('#customer_name').val() || !$('#customer_email').val() || !$('#customer_number').val()) {
            // alert('Make sure to fill the data');
            swal({
                title: "Something Missing",
                text: "Make sure to fill all the data",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#5D926E",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Okay",
                closeOnConfirm: false
              })
        }else if(number.length < 10){
            // alert('Please Enter Valid Number')
            swal({
                title: "Oops Invalid!",
                text: "Please Enter Valid Number.",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#5D926E",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Okay",
                closeOnConfirm: false
              })
        }

        else{
            // $('#third_form, #third_p_bar').removeClass('d-none');
            // $('#second_form, #second_p_bar').addClass('d-none');
            $('#registration_form_second').submit();
        }
    })
    $('#third_next').click(function(){
        
        if(!$('#mobile_otp').val() || !$('#mobile_otp').val() || !$('#mobile_otp').val()) {
            swal({
                title: "Something Missing",
                text: "Make sure to fill all the data",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#5D926E",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Okay",
                closeOnConfirm: false
              })
        }else{
            // $('#fourth_form, #fourth_p_bar').removeClass('d-none');
            // $('#third_form, #third_p_bar').addClass('d-none');
            $('#registration_form_third').submit();

        }
    })
    $('#back_third').click(function(){
        // $('#second_form, #second_p_bar').removeClass('d-none');
        // $('#third_form, #third_p_bar').addClass('d-none');
        window.location.href = "/vendormodel/public/step-2";
    })
    $('#fourth_next').click(function(){
        if(!$('#product_address').val()) {
            swal({
                title: "Something Missing",
                text: "Make sure to fill all the data",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#5D926E",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Okay",
                closeOnConfirm: false
              })
        }
        else{
        // $('#fifth_form, #fifth_p_bar').removeClass('d-none');
        // $('#fourth_form, #fourth_p_bar').addClass('d-none');
        $('#registration_form_fourth').submit();

        }
    })
    $('#submitnow').click(function(){
        // $('#registration_form_fifth').submit();
        console.log('hi');
    })
})