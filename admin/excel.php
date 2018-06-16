<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
include('classes/PHPExcel.php');

$objPHPExcel = new PHPExcel();
if(isset($_POST["download"]) && $_POST["download"] == "getexcel")
{
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->setTitle('List of Leads');
	$objPHPExcel->setActiveSheetIndex(0);

	// for XLSX
	/*$xlsName = 'lead-list.xlsx';
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');*/

	// for XLS
	$xlsName = 'lead-list.xls';
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	
	
		$count = 1;
		$char = 65; // represent 'A'
		$rownum = 1;
		
		// set the header
		// let's bold and size the header font and write the header
		// we can specify a range of cells, like here: cells from A1 to H1
		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true)->setSize(14);
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Sl. No.');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('ID');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('User Name');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Contact No');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Location');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Latitude');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Longitude');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Date / Time');
		
		$rownum = 2; // now start entering from row number 2
		$char = 65; // reset to 'A' again
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue(1);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('A');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('B');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('C');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('D');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('E');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('F');
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('G');
			$count++;
			$rownum++;
			$char = 65;	// reset to 'A'
	
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="'.$xlsName.'"');
	header('Cache-Control: max-age=0');
	//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	//header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	//header ('Cache-Control: cache, must-revalidate');
	//header ('Pragma: public');

	ob_end_clean();

	$objWriter->save('php://output');

	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />

</head>
<body>
	<div style="width:1220px; margin:0 auto; padding:0 10px 0 0;">
	</div>
	<div><h1 style="color:blue; padding-left:480px;">Test System</h1>
	<br/><br/><br/><br/><br/>
	<form method="post">
		<input type="submit" name="download" value="getexcel" align="right" />
	</form>
	</div>
	
</body>
</html>