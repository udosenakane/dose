export default () => ({
    email:'',
    amount:'',
    key: import.meta.env.SCRIPT_PAYSTACK_PUB_KEY,
    currency:'',
    ref:'',

    reference(){
        let text = "";
        let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( let i=0; i < 10; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    },

    payWithPaystack() {
        var handler = PaystackPop.setup({
            key: 'YOUR_PUBLIC_KEY', // Replace with your public key
            email: this.email,
            amount: this.amount, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: this.currency, // Use GHS for Ghana Cedis or USD for US Dollars
            ref: this.reference(), // Replace with a reference you generated
            callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                alert('Payment complete! Reference: ' + reference);
                // Make an AJAX call to your server with the reference to verify the transaction
            },
            onClose: function() {
                alert('Transaction was not completed, window closed. Any challenge?');
            },
        });
        handler.openIframe();
    }
})