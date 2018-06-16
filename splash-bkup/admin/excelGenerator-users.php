<?php 
error_reporting(E_ALL);
include("classes/connection.php");
$obj = new Connection();
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once 'classes/PHPExcel.php';
require_once 'classes/PHPExcel/Worksheet/Drawing.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("")
							 ->setLastModifiedBy("")
							 ->setTitle("")
							 ->setSubject("")
							 ->setDescription("")
							 ->setKeywords("")
							 ->setCategory("");
//for border
 $styleArray = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );
$objPHPExcel->getDefaultStyle()->applyFromArray($styleArray);
//for center alignment
 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
	$objPHPExcel->getActiveSheet(0)->getStyle("A1:E1")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->SetCellValue('A1' , 'Sl. No.');
	$objPHPExcel->getActiveSheet()->SetCellValue('B1' , 'Email Addess');
	$objPHPExcel->getActiveSheet()->SetCellValue('C1' , 'Country');
	$objPHPExcel->getActiveSheet()->SetCellValue('D1' , 'Date');

$s_no=1;
$count=2;

$userQuery = mysql_query("SELECT * FROM sr_user_notify order by datetime desc");
while($userResult = mysql_fetch_assoc($userQuery)) {
	
	$email_id=$userResult['email_id'];
	$country=$userResult['country'];
	$datetime=date('d-m-Y h:i' , strtotime($userResult['datetime']));
	
	$objPHPExcel->getActiveSheet()->SetCellValue("A$count", "$s_no");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$count", "$email_id");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$count", "$country");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$count", "$datetime");
	
	$count++;
	$s_no++;
	
}


//}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle("Get Notified Users");


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Get Notified Users.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
