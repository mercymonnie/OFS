<?php

require('../fpdf.php');
$d = date('d_m_Y');
include('../config.php');
include("../session.php");

class PDF extends FPDF {

    function Header() {
        $this->SetFont('Helvetica', '', 25);
        $this->SetFontSize(40);
        //Move to the right
        $this->Cell(80);
        //Line break
        $this->Ln();
    }

//Page footer
    function Footer() {
        
    }

//Load data
    function LoadData($file) {
        //Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', chop($line));
        return $data;
    }

//Simple table

    function BasicTable($header, $data) {

        $this->SetFillColor(200, 255, 255);
//$this->SetDrawColor(255, 0, 0);
        $w = array(15, 40, 20, 15, 20, 38, 30, 20, 18, 15, 15, 15, 15);


        //Header
        $this->SetFont('Arial', 'B', 8);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 11, $header[$i], 1, 0, 'L', true);
        $this->Ln();

        //Data

        $this->SetFont('Arial', '', 12);
        foreach ($data as $eachResult) { //width
            $emp_id = $_SESSION['user_id'];
            $order_id = $eachResult["order_ID"];
            include('../config.php');
            $qqqry = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                    . " WHERE i.item = p.Product_ID AND i.order_ID = '" . $order_id . "' AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '" . $emp_id . "' GROUP BY date");
            $this->Cell(15, 6, $eachResult["order_ID"], 1);
            $this->Cell(40, 6, $eachResult["Full_Name"], 1);
            $this->Cell(20, 6, $eachResult["Address"], 1);
            $this->Cell(15, 6, $eachResult["Country"], 1);
            $this->Cell(20, 6, $eachResult["City"], 1);
            $this->Cell(38, 6, $eachResult["Phone"], 1);
            $this->Cell(30, 6, $eachResult["Dilivery_Address"], 1);

            if ($qqqry) {
                if ($obj = $qqqry->fetch_object()) {
                    $amount = $obj->price;
                    $this->Cell(20, 6, number_format($amount), 1);
                }
            }

            $this->Ln();
        }
    }

    function BasicTable2($header, $data) {

        $this->SetFillColor(200, 255, 255);
//$this->SetDrawColor(255, 0, 0);
        $w = array(10, 10, 25, 25, 30, 30, 10, 25, 25);


        //Header
        $this->SetFont('Arial', 'B', 8);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 11, $header[$i], 1, 0, 'L', true);
        $this->Ln();

        //Data
        $this->SetFont('Arial', '', 12);
        $count = 0;

        $total = 0;
        $cost = 0;
        $tqty = 0;
        foreach ($data as $eachResult) { //width
            include('../config.php');
            $emp_id = $_SESSION['user_id'];
            $qqqry = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                    . " WHERE i.item = p.Product_ID AND p.Product_ID = '" . $eachResult["item"] . "' AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '" . $emp_id . "' GROUP BY date");
            if ($qqqry) {
                if ($obj = $qqqry->fetch_object()) {
                    $count ++;
                    $this->Cell(10, 6, $count, 1);
                    $this->Cell(10, 6, $eachResult["order_ID"], 1);
                    $this->Cell(25, 6, $eachResult["date"], 1);
                    $this->Cell(25, 6, $eachResult["time"], 1);

                    $pname = $obj->productName;
                    //$scategory = $obj->sub_name;
                    //$category = $obj->Category_Name;
                    $bal = $obj->balance;
                    $cp = $obj->cost_price;
                    $bname = $obj->Warehouse;
                    $this->Cell(30, 6, $pname, 1);
                    $this->Cell(30, 6, $bname, 1);
                    $cost += ($eachResult["qty"] * $cp);



                    $this->Cell(10, 6, $eachResult["qty"], 1);
                    $this->Cell(25, 6, number_format($eachResult["unit_price"]), 1);
                    $this->Cell(25, 6, number_format($eachResult["price"]), 1);
                    $total += $eachResult["price"];
                    $tqty += $eachResult["qty"];
                    $this->Ln();
                }
            }
        }

        $this->Ln();
        $this->Ln();
        $this->Write(5, ' Qty:       ' . $tqty . '');
        $this->Ln();
        $this->Ln();
        $this->Write(5, ' T-Price:  ' . number_format($total) . '');
        $this->Ln();
        $this->Ln();
        $this->Write(5, ' T-Profit:  ' . number_format($total - $cost) . '');
    }

//Better table
}

$pdf = new PDF();



$header = array('Order ID', 'Full_Name', 'Address', 'Country', 'City', 'Phone', 'Delivery Address', 'Ammount');

$header2 = array('#', 'Order', 'Date', 'Time', 'item', "Boutique", 'qty', 'unit_price(Ugx)', 'TotalPrice(UGX)');

//Data loading
//*** Load MySQL Data ***//
//db settings


$currMonth = date('m');
$emp_id = $_SESSION['user_id'];
$strSQL = "SELECT * FROM payment p,invoice_items i,product pd WHERE p.order_ID = i.order_ID AND i.item = pd.Product_ID AND pd.Employee_ID = '" . $emp_id . "' GROUP BY i.order_ID";
$objQuery = mysqli_query($mysqli, $strSQL);

$resultData = array();

$strSQL2 = "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
        . " WHERE i.item = p.Product_ID AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '" . $emp_id . "'";
$objQuery2 = mysqli_query($mysqli, $strSQL2);
$resultData2 = array();
for ($i = 0; $i < mysqli_num_rows($objQuery); $i++) {
    $result = mysqli_fetch_array($objQuery);
    array_push($resultData, $result);
}

for ($i = 0; $i < mysqli_num_rows($objQuery2); $i++) {
    $result2 = mysqli_fetch_array($objQuery2);
    array_push($resultData2, $result2);
}
//************************//
//***********************///	
//*** Table 1 ***//
$pdf->AddPage();

$pdf->SetFont('Helvetica', 'b', 14);
$pdf->Cell(50);
$pdf->Write(5, 'OFS Order Detail Management');
$pdf->Ln();

$pdf->SetFont('Helvetica', 'b', 12);
$pdf->Cell(70);
$pdf->Write(7, 'ORDER REPORTS');
$pdf->Ln();

$pdf->Cell(22);
$pdf->SetFontSize(7);
$pdf->Cell(57);
$result = mysqli_query($mysqli, "select date_format(now(), '%W, %M %d, %Y') as date");
while ($row = mysqli_fetch_array($result)) {
    $pdf->Write(5, $row['date']);
}
$pdf->Ln();

$pdf->Cell(0);
$pdf->SetFontSize(10);
$pdf->Cell(54);
//$get_user = $_GET['username'];
//$pdf->Write(5, 'Printed By: '.$get_user.'');
$pdf->Ln(-1);

//display numbers of reports
$emp_id = $_SESSION['user_id'];
$result = mysqli_query($mysqli, "SELECT * FROM payment p,invoice_items i,product pd WHERE p.order_ID = i.order_ID AND i.item = pd.Product_ID AND pd.Employee_ID = '" . $emp_id . "' GROUP BY i.order_ID ") or die("Database query failed: $query" . mysql_error());

$count = mysqli_num_rows($result);

$result2 = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
        . " WHERE i.item = p.Product_ID AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '" . $emp_id . "'") or die("Database query failed: " . mysql_error());
$count2 = mysqli_num_rows($result2);

$pdf->Cell(0);
$pdf->Write(5, ' All Total Customer Orders : ' . $count . '');
$pdf->Ln();

$pdf->Ln(5);

$pdf->Ln(0);
$pdf->BasicTable($header, $resultData);
$pdf->Ln();
$pdf->Write(5, ' Items Table : ' . $count2 . '');
$pdf->Ln();
$pdf->Ln();
$pdf->BasicTable2($header2, $resultData2);
//forme();
//$pdf->Output("$d.pdf","F");
$pdf->Output();
?>

