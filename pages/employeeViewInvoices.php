 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $userId;
    global $barId;

    ?>
 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Invoice</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Invoice</li>
                 <li class="breadcrumb-item active">View Invoice</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="pagetitle">
         <!-- Recent Sales -->
         <div class="col-12">

             <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                 <?php if ($_GET["redirect"] == "order_attended") : ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <i class="fas fa-check"></i><span class="ml-2">Order has been attended</span>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>

             <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                 <?php if ($_GET["redirect"] == "order_paid") : ?>
                     <div class="alert alert-primary alert-dismissible fade show" role="alert">
                         <i class="fas fa-check"></i><span class="ml-2">Order has been paid</span>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>

             <div class="card recent-sales overflow-auto">

                 <div class="card-body table-responsive">
                     <h5 class="card-title">View Invoices</h5>

                     <?php
                        require_once("../database/dbConnect.php");

                        $sql =
                        "SELECT c.customerFullName, c.customerID,  i.createdAt, i.invoiceId, i.invoiceNumber, i.tableNumber, i.invoiceStatus, sum(i.grant_price) AS totalPrice
                                    FROM invoice i JOIN orders o ON i.invoiceId = o.ordersId
                                    JOIN order_list ol ON o.orderListId = ol.orderListId
                                    JOIN customer c ON ol.customerId = c.customerID 
                                    JOIN product p ON ol.productId = p.productId
                                    JOIN bar b ON p.barID = b.barId
                                    WHERE b.barId = $barId
                                    GROUP BY i.tableNumber
                                    ORDER BY i.invoiceStatus DESC";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                                <thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Customer Name</th>
                                        <th scope='col'>Invoice Number</th>
                                        <th scope='col'>Invoive Date</th>
                                        <th scope='col'>Total Price</th>
                                        <th scope='col'>Table#</th>
                                        <th scope='col'>Status</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                            <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $invoiceId = 'invoiceId' . $count;
                            echo "<tr>
                                    <td scope='row'>" . $count . "</td>
                                    <td>" . $row["customerFullName"] . "</td>
                                    <td>" . $row["invoiceNumber"] . "</td>
                                    <td>" . $row["createdAt"] . "</td>
                                    <td>" . $row["totalPrice"] . "</td>
                                    <td>" . $row["tableNumber"] . "</td>
                                    <td>";
                            if ($row["invoiceStatus"] == 'ACTIVE') {
                                echo "<span class='badge rounded-pill bg-success'>Active</span>";
                            }else {
                                echo "<span class='badge rounded-pill bg-primary'>Paid</span>";
                            }

                            echo "</td>
                                <td>
                                    <a href='print.php?id = " . $row["customerID"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-printer'></i></button></a>
                                </td>
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