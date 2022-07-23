 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $user_id;
    global $barId;

    ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Report</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item active">View Report</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="pagetitle">
         <!-- Recent Sales -->
         <div class="col-12">
             <div class="card recent-sales overflow-auto">

                 <div class="card-body">
                     <h5 class="card-title">View Report</h5>

                      <?php
                        require_once("../database/dbConnect.php");

                        $sql = "SELECT b.barName, i.createdAt, sum(i.grant_price) AS totalAmt, i.invoiceStatus FROM bar b 
                                JOIN product p ON p.barID = b.barId 
                                JOIN order_list ol ON ol.productId = p.productId
                                JOIN orders o ON o.orderListId = ol.orderListId
                                JOIN invoice i ON i.orderId = o.ordersId
                                JOIN customer c ON c.customerID = i.customerId
                                WHERE i.customerId = 1 AND i.invoiceStatus = 'PAID'
                                GROUP BY i.tableNumber
                                ORDER BY i.createdAt ASC";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                         <thead>
                             <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>Bar Name</th>
                                 <th scope='col'>Date</th>
                                 <th scope='col'>Amount</th>
                                 <th scope='col'>Status</th>
                             </tr>
                         </thead>
                         <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $barID = 'barID' . $count;
                            echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                 <th>" . $row["barName"] . "</th>
                                 <td>" . $row["createdAt"] . "</td>
                                 <td>" . number_format($row["totalAmt"]) . " /= Tsh</td>
                                 <td>" . $row["invoiceStatus"] . "</td>
                             </tr>";
                            $count = $count + 1;
                        }
                        echo " </tbody>
                     </table>";

                     ?>

                 </div>

             </div>
         </div><!-- End Recent Sales -->

     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>