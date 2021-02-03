$(function() {
    var jvalidate = $("#paymentForm").validate({
        ignore: [],
        rules: {
            paymentFor: {
                required: true
            },
            dAmt: {
                number: true,
                min: 1,
                max: 99.99,
            }

        },
        messages: {
            paymentFor: {
                required: "Select doctor from list",
            },
            dAmt: {
                number: "Enter valid amount",
            }
        }
    });
});