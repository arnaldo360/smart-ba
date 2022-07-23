
<?php
require("../fpdf/fpdf.php");
require("word.php");
require("../database/dbConnect.php");
include('../auth/authentication.php');
include_once("../backend/employeeController.php");
include_once("../backend/customerController.php");
include_once("../backend/managerController.php");

global $role;
global $username;
global $userId;
global $barId;
$tNum = $_GET['tnumber'];

//sum total
$sum = [
  "total" => "",
  "words" => "",
];

//Select Invoice Product Details From Database
$sqlTotal = "SELECT sum(i.grant_price) AS totalPrice , i.grant_price FROM invoice_product ip 
          JOIN invoice i ON ip.invoiceId = i.invoiceId 
          JOIN product p ON p.productId = ip.productId 
          WHERE i.customerId = $userId AND i.tableNumber = $tNum ";

$result = $mysqli->query($sqlTotal);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $obj = new TanzanianCurrency($row["totalPrice"]);

    $sum = [
      "total" => $row["totalPrice"],
      "words" => $obj->get_words(),
    ];
  }
}

//customer and invoice details
$info = [
  "customer" => "",
  "tableno" => "",
  "invoice_no" => "",
  "invoice_date" => "",
  "total_amt" => "",
];

//Select Invoice Details From Database
$sql = "SELECT c.customerFullName, i.invoiceNumber, i.createdAt,i.tableNumber, i.grant_price FROM invoice i JOIN customer c ON i.customerId = c.customerID 
WHERE i.customerID = $userId AND i.invoiceStatus = 'PAID' AND i.tableNumber = $tNum ;";

$res = $mysqli->query($sql);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc();

  $info = [
    "customer" => $row["customerFullName"],
    "tableno" => $row["tableNumber"],
    "invoice_no" => $row["invoiceNumber"],
    "invoice_date" => date("d-m-Y", strtotime($row["createdAt"])),
    "total_amt" => $row["grant_price"],
    
  ];
}

//invoice Products
$products_info = [];

//Select Invoice Product Details From Database
$sql = "SELECT p.productName,ip.price, ip.quantity FROM invoice_product ip 
          JOIN invoice i ON ip.invoiceId = i.invoiceId 
          JOIN product p ON p.productId = ip.productId 
          WHERE i.customerId = $userId AND i.tableNumber = $tNum ;";

$res = $mysqli->query($sql);
if ($res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    $products_info[] = [
      "name" => $row["productName"],
      "price" => $row["price"],
      "qty" => $row["quantity"],
      "total" => $row["price"]*$row["quantity"],
    ];
  }
}



class PDF extends FPDF
{

  function Header()
  {

    //Display Company Info
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(50, 10, "SMART-BAR", 0, 1);
    $this->SetFont('Arial', '', 14);
    $this->Cell(50, 7, "Simplified", 0, 1);
    $this->Cell(50, 7, "Services for you", 0, 1);

    //Display INVOICE text
    $this->SetY(15);
    $this->SetX(-40);
    $this->SetFont('Arial', 'B', 18);
    $this->Cell(50, 10, "INVOICE", 0, 1);

    //Display Horizontal line
    $this->Line(0, 48, 210, 48);
  }

  function body($info, $products_info, $sum)
  {
    //Billing Details
    $this->SetY(55);
    $this->SetX(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, "Bill To: ", 0, 1);
    $this->SetFont('Arial', '', 12);
    $this->Cell(50, 7, $info["customer"], 0, 1);
    $this->Cell(50, 7, "Table number:" . $info["tableno"], 0, 1);

    //Display Invoice no
    $this->SetY(55);
    $this->SetX(-60);
    $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

    //Display Invoice date
    $this->SetY(63);
    $this->SetX(-60);
    $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

    //Display Table headings
    $this->SetY(95);
    $this->SetX(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(80, 9, "DESCRIPTION", 1, 0);
    $this->Cell(40, 9, "PRICE", 1, 0, "C");
    $this->Cell(30, 9, "QTY", 1, 0, "C");
    $this->Cell(40, 9, "TOTAL", 1, 1, "C");
    $this->SetFont('Arial', '', 12);

    //Display table product rows
    foreach ($products_info as $row) {
      $this->Cell(80, 9, $row["name"], "LR", 0);
      $this->Cell(40, 9, $row["price"], "R", 0, "R");
      $this->Cell(30, 9, $row["qty"], "R", 0, "C");
      $this->Cell(40, 9, $row["total"], "R", 1, "R");
    }
    //Display table empty rows
    for ($i = 0; $i < 12 - count($products_info); $i++) {
      $this->Cell(80, 9, "", "LR", 0);
      $this->Cell(40, 9, "", "R", 0, "R");
      $this->Cell(30, 9, "", "R", 0, "C");
      $this->Cell(40, 9, "", "R", 1, "R");
    }
    //Display table total row
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(150, 9, "TOTAL", 1, 0, "R");
    $this->Cell(40, 9, $sum["total"], 1, 1, "R");

    //Display amount in words
    $this->SetY(225);
    $this->SetX(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 9, "Amount in Words ", 0, 1);
    $this->SetFont('Arial', '', 12);
    $this->Cell(0, 9, $sum["words"], 0, 1);
  }
  function Footer()
  {

    //set footer position
    $this->SetY(-50);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 10, "for SMART-BARS", 0, 1, "R");
    $this->Ln(15);
    $this->SetFont('Arial', '', 12);
    $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
    $this->SetFont('Arial', '', 10);

    //Display Footer Text
    $this->Cell(0, 10, "This is a computer generated invoice", 0, 1, "C");
  }
}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info, $sum);
$pdf->Output();
?>