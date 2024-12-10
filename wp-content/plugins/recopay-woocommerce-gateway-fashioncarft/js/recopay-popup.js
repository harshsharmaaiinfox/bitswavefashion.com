jQuery(document).ready(function($) {
    // Function to show the popup

    function showRecopayPopup() {

        $('.recopay-popup').fadeIn();
        $('#recopay-overlay').fadeIn();
    }

    function payment_wait(){
        $('#paymentWaitModal').fadeIn();
    }

    $('.close-popup').click(function() {
        $('#recopay-overlay').fadeOut();
        $('.recopay-popup').fadeOut();
    });

    $('.submit-upi').on('click', function(event) {
        
        let selectedUPI = $('input[name="upi_method"]:checked').val();
        if(selectedUPI){
            payment_wait();
            $('.recopay-popup').fadeOut();
        }else{
            alert('Please select a payment method.')
        }
        
    });


    function getPaymentStatus() {
        $.ajax({
            url: recopay_vars.ajax_url,
            type: 'POST',
            data: {
                action: 'r_payment_status',
                order_key: recopay_vars.order_key,
                nonce: recopay_vars.nonce
            },
            success: function(response) {
                if (response.success === true) {
                    window.location.href = response.redirect_url;
                }    
                // Stop the interval
                clearInterval(paymentStatusInterval);
            },
            error: function() {
                console.error('Failed to fetch payment status.');
            }
        });
    }
    
    // Set an interval to run getPaymentStatus every 20 seconds
    const paymentStatusInterval = setInterval(getPaymentStatus, 20000);
    

    $(document).on('click', '#recopay-confirm-payment', function(){
        showRecopayPopup();
    });

    $("body").on("click", "#recopay-cancel-payment", function (t) {
        t.preventDefault(), (window.location = recopay_vars.cancel_url);
    })

    $('input[name="upi_method"]').change(function() {
        let selectedValue = $(this).val();
        $('.submit-upi').attr('href',selectedValue);
    });
    
});
