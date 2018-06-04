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
        $w = array(8, 30, 20, 33, 15, 10, 33, 15, 15, 10, 10);


        //Header
        $this->SetFont('Arial', 'B', 12);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'L', true);
        $this->Ln();

        //Data
        $this->SetFont('Arial', '', 12);
        $no = 0;
        $tSold = 0;
        $tBal = 0;
        $tCost = 0;
        $tPrice = 0;
        foreach ($data as $eachResult) { //width
            $no ++;
            $this->Cell(8, 6, $no, 1);
            $this->Cell(30, 6, $eachResult["productName"], 1);
            $this->Cell(20, 6, $eachResult["Category_Name"], 1);
            $this->Cell(33, 6, $eachResult["sub_name"], 1);
            $this->Cell(15, 6, $eachResult["Model"], 1);
            $this->Cell(10, 6, $eachResult["Type"], 1);

            include('../config.php');
            $id = $eachResult["Product_ID"];
            $qqqry = mysqli_query($mysqli, "SELECT * FROM invoice_items i WHERE i.item = '" . $id . "'");
            $sold = 0;
            $cost = 0;
            if ($qqqry) {
                while ($obj = $qqqry->fetch_object()) {
                    //$qty = $obj->productName;
                    $sold += $obj->qty;

                    //$cost += ($eachResult["qty"] * $cp) ;
                }
            }
            $tSold += $sold;
            $tBal += $eachResult["balance"];
            $tCost += $eachResult["cost_price"] * $eachResult["balance"];
            $tPrice += $eachResult["Price"] * $eachResult["balance"];

            $this->Cell(33, 6, $eachResult["Warehouse"], 1);
            $this->Cell(15, 6, number_format($eachResult["cost_price"]), 1);
            $this->Cell(15, 6, number_format($eachResult["Price"]), 1);
            $this->Cell(10, 6, $sold, 1);
            $this->Cell(10, 6, $eachResult["balance"], 1);
            $this->Ln();
        }
        $this->Ln();
        $this->Ln();
        $this->Write(5, ' Total Sold:   ' . $tSold);
        $this->Ln();
       
        $this->Write(5, ' Total Bal:   ' . $tBal);
        $this->Ln();
        $this->Write(5, ' Expected Sales:   ' . number_format($tPrice));
        $this->Ln();
       
        $profit = $tPrice - $tCost;
        $this->Write(5, ' Expected Profit:    ' . number_format($profit));
        
        
    }

//Better table
}

$pdf = new PDF();
$header = array('#', 'Product', 'Cat', "Sub-Category", 'Color', 'Size', 'Boutique', 'Cost#', "Price#", "sold", "Bal");
//Data loading
//*** Load MySQL Data ***//
//db settings
$currDate = date('Y-m-d');
$emp_id = $_SESSION['user_id'];
$strSQL = "Select* from product p, category c, sub_category s,boutique b  where p.Category_ID = s.sub_category_id AND"
        . " s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND Employee_ID = '" . $emp_id . "' ";
$objQuery = mysqli_query($mysqli, $strSQL);
$resultData = array();
for ($i = 0; $i < mysqli_num_rows($objQuery); $i++) {
    $result = mysqli_fetch_array($objQuery);
    array_push($resultData, $result);
}
//************************//
//*** Table 1 ***//
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'b', 14);
$pdf->Cell(55);
$pdf->Write(5, ' OFS PRODUCT DATA REPORT ');
$pdf->Ln();

$pdf->SetFont('Helvetica', 'b', 12);
$pdf->Cell(75);
$pdf->Write(5, 'PRODUCT REPORT');
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
$result = mysqli_query($mysqli, "Select * from product") or die("Database query failed: $query" . mysqli_error());

$count = mysqli_num_rows($result);
$pdf->Cell(0);
$pdf->Write(5, ' Product Report: ' . $count . '');
$pdf->Ln();

$pdf->Ln(5);

$pdf->Ln(0);
$pdf->BasicTable($header, $resultData);
//forme();
//$pdf->Output("$d.pdf","F");
$pdf->Output();
?>