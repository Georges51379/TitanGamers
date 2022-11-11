<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--ICON SECTION-->
  <link href="img/icons/logo.png" rel="shortcut icon">
<!--jQUERY CDN SECTION-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--PRODUCTS.CSS SECTION-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  <link href="css/products.css" rel="stylesheet">
  <link href="css/navbars.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/titan_account.css" rel="stylesheet">
  <link href="css/titan_order_history.css" rel="stylesheet">
    <link href="css/billship.css" rel="stylesheet">
    <link href="css/titan_pending_orders.css" rel="stylesheet">



  <script>
  //FUNCTION TO CHECK THE QUANTITY INSIDE THE CART.
  function checkCart(){
    $.ajax({
      url: "check/checkCart.php",
      data: "cartToken="+$("$_GET['cpt']"),
      type: "POST",
      success:function(data){
        alert(data);
      }
      error:function(){
        alert(data);
      };
    });
  }
  </script>
</head>
