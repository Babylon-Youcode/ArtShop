@extends('layouts.app')

@section('content')
<style>
    #paypal-button-container{
        text-align: center;
        margin-top: 150px;
    }
</style>

    <div id="paypal-button-container"></div>

     

     <!-- Include the PayPal JavaScript SDK -->
     <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
 
     <script>
         // Render the PayPal button into #paypal-button-container
         paypal.Buttons({
 
             // Set up the transaction
             createOrder: function(data, actions) {
                 return actions.order.create({
                     purchase_units: [{
                         amount: {
                             value: '88.44'
                         }
                     }]
                 });
             },
 
             // Finalize the transaction
             onApprove: function(data, actions) {
                 return actions.order.capture().then(function(orderData) {
                     // Successful capture! For demo purposes:
                     console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                     var transaction = orderData.purchase_units[0].payments.captures[0];
                     alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                 });
             }
 
 
         }).render('#paypal-button-container');
     </script>

@endsection 