<?php
session_start();

// require once config file
require_once "../database/dbConnect.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {

  // store order id in variable
  $order_id = $_GET['id'];

  $retriveDataSql = "SELECT c.customerID, ol.customerId ,o.ordersId, ol.quantity, p.productId, p.productPrice, b.barName, o.orderStatus, o.tableNumber, ol.totalPrice FROM orders o 
                      JOIN order_list ol ON o.orderListId = ol.orderListId
                      JOIN customer c ON ol.customerId = c.customerID 
                      JOIN product p ON ol.productId = p.productId
                      JOIN bar b ON p.barID = b.barId
                      WHERE o.ordersId = $order_id";

  $results = mysqli_query($mysqli, $retriveDataSql);

  while ($row = mysqli_fetch_array($results)) {
    $invoice_no = rand(10000000, 99999999);
    $customerId = $row["customerID"];
    $tableno = $row["tableNumber"];
    $grand_total = $row["totalPrice"];
    $productId = $row["productId"];
    $productPrice = $row["productPrice"];
    $quantity = $row["quantity"];
  }

  $sqlInvoce = "INSERT INTO invoice (invoiceNumber, orderId, customerId, tableNumber, grant_price) 
			VALUE ('{$invoice_no}','{$order_id}','{$customerId}','{$tableno}','{$grand_total}') ";
  if ($mysqli->query($sqlInvoce)) {
    $sid = $mysqli->insert_id;

    $sql2 = "INSERT INTO invoice_product (`invoiceId`, `productId`, `price`, `quantity`, `total`) 
    values ('{$sid}','{$productId}','{$productPrice}','{$quantity}','{$grand_total}')";

    if ($mysqli->query($sql2)) {
      echo "<div class='alert alert-success'>Invoice Added. <a href='print.php?id={$sid}' target='_BLANK'>Click</a> here to Print Invoice</div>";
    } else {
      echo "<div class='alert alert-danger'>Invoice Product Added Failed.</div>";
    }
   
    
  } else {
    echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
  }

  $sql = "UPDATE orders SET orderStatus = ?, employeeId = ? WHERE ordersId = ?";

  if ($stmt = $mysqli->prepare($sql)) {
    // bind variable
    $stmt->bind_param("sii", $param_order_status, $param_employee_id, $param_orders_id);

    // set parameter
    $param_order_status = "ATTENDED";
    $param_orders_id    = $order_id;
    $param_employee_id  = $_SESSION["id"];

    if ($stmt->execute()) {

      header("Location: ../pages/employeeViewOrders.php?redirect=order_attended");
    } else {
      echo "Failed to execute";
    }

    // close statement
    $stmt->close();
  } else {
    echo "Failed to prepare";
  }
}
