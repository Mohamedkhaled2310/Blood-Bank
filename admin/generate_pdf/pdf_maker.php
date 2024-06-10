<?php    
session_start();            
require '../config.php'; 
include_once('tcpdf/tcpdf.php');

if (isset($_SESSION['login_user'])){
$query = "SELECT * FROM need";             
$results = mysqli_query($con,$query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$row = mysqli_fetch_array($results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('aealarabiya', '', 18);
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>Blood Bank</b></td></tr>
	<tr><td ><b> اسم العامل:' .$_SESSION['name']. ' </b></td><td align="right"><b>تاريخ الطبع: '.date("d-m-Y").'</b> </td></tr>
	<tr><td colspan="2" align="center"><b>تقرير يومي</b></td></tr>
	<tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
		<td>
			نوع العميل
		</td>
		<td align="right">
			العدد
		</td>
	</tr>';
		
	    //For Needs
		$query_need = "SELECT COUNT( id ) FROM need where status != 'done' and order_date = CURDATE()";
		$results_need = mysqli_query($con,$query_need);    
		$need = mysqli_fetch_array($results_need, MYSQLI_ASSOC);

		//For Donors
		$query_donor = "SELECT COUNT( id ) FROM poll where order_date = CURDATE()";
		$results_donor = mysqli_query($con,$query_donor);    
		$donor = mysqli_fetch_array($results_donor, MYSQLI_ASSOC);
		//For Done
		$query_done = "SELECT COUNT( id ) FROM need where status = 'done' and order_date = CURDATE()";
		$results_done = mysqli_query($con,$query_done);    
		$done = mysqli_fetch_array($results_done, MYSQLI_ASSOC);
		
		$content .= '
		  <tr class="itemrows">
			  <td>
				  <b>عدد طلبات المتبرعين المستلمة</b>

			  </td>
			  <td align="right"><b>
				  '.$donor['COUNT( id )'].'
			  </b></td>
		  </tr>
		  <tr class="itemrows">
			  <td>
				  <b>عدد طلبات محتاجي الدم المستلمة</b>

			  </td>
			  <td align="right"><b>
				  '.$need['COUNT( id )'].'
			  </b></td>
		  </tr>
		  <tr class="itemrows">
		  <td>
			  <b>عدد الطلبات المنتهية</b>

		  </td>
		  <td align="right"><b>
			  '.$done['COUNT( id )'].'
		  </b></td>
	      </tr> ';
		
		
		$content .= '<tr class="total"><td colspan="2" align="right">------------------------</td></tr>
	<tr><td colspan="2" align="right"><b>تقرير يومي</b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>شكرا لك !</b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	</table>
</table>'; 
$pdf->writeHTML($content);

$datetime=date('dmY_hms');
$file_name = "daily_report".$datetime.".pdf";
ob_end_clean();


	$pdf->Output($file_name, 'I'); // I means Inline view


//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

}

else{
	header("location:../index.php");
}
?>