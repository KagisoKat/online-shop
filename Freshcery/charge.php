<?php require "./includes/header.php"; ?>



<div class="banner">
  <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
    <div class="container">
      <h1 class="pt-5">
        Payment page
      </h1>
      <p class="lead">
        Save time and leave the groceries to us.
      </p>

      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id=ASVtPN63L2GHO-tpCxKfo1deIaWboVVCPiTAN9NBrjXP5gCpYYgwjzByNne_4RgPBdwpB08NlCB13rOq&currency=USD"></script>
      <!-- Set up a container element for the button -->
      <div id="paypal-button-container"></div>
      <script>
        paypal.Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '<?php echo $_SESSION['total_price']; ?>'
                }
              }]
            });
          },
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            })
          }
        }).render('#paypal-button-container');
        // Order is created on the server and the order id is returned
        // createOrder() {
        //   return fetch("/my-server/create-paypal-order", {
        //     method: "POST",
        //     headers: {
        //       "Content-Type": "application/json",
        //     },
        //     // use the "body" param to optionally pass additional order information
        //     // like product skus and quantities
        //     body: JSON.stringify({
        //       cart: [
        //         {
        //           sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
        //           quantity: "YOUR_PRODUCT_QUANTITY",
        //         },
        //       ],
        //     }),
        //   })
        //   .then((response) => response.json())
        //   .then((order) => order.id);
        // },
        // Finalize the transaction on the server after payer approval
        //   onApprove(data) {
        //     return fetch("/my-server/capture-paypal-order", {
        //       method: "POST",
        //       headers: {
        //         "Content-Type": "application/json",
        //       },
        //       body: JSON.stringify({
        //         orderID: data.orderID
        //       })
        //     })
        //     .then((response) => response.json())
        //     .then((orderData) => {
        //       // Successful capture! For dev/demo purposes:
        //       console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        //       const transaction = orderData.purchase_units[0].payments.captures[0];
        //       alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        //       // When ready to go live, remove the alert and show a success message within this page. For example:
        //       // const element = document.getElementById('paypal-button-container');
        //       // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        //       // Or go to another URL:  window.location.href = 'thank_you.html';
        //     });
        //   }
        // }).render('#paypal-button-container');
      </script>

    </div>
  </div>
</div>

<?php require "./includes/footer.php"; ?>