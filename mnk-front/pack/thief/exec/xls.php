<?php
$mnk 		= new mnk;

extract($_GET);

$path  = pathinfo($file);

// mnk::debug($path);

$ext 		= ".xls";
$name 		= $path['filename'];
$filename 	= $name.$ext;
$title 		= "";



$dir 		= DIR_USER."/0/thief/".$file;
$json 		= $mnk -> load_json($dir);
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2013 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.9, 2013-06-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once DIR_INCLUDE.'/plug-ins/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// // Set document properties
// $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
// 							 ->setLastModifiedBy("Maarten Balliauw")
// 							 ->setTitle("Office 2007 XLSX Test Document")
// 							 ->setSubject("Office 2007 XLSX Test Document")
// 							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
// 							 ->setKeywords("office 2007 openxml php")
// 							 ->setCategory("Test result file");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1', 'Rang Année')
            ->setCellValue('C1', 'Raison Sociale')
            ->setCellValue('D1', 'Effectifs (moyen)')
            ->setCellValue('E1', 'Activité principale')
            ->setCellValue('F1', 'Adresse')
            ->setCellValue('G1', 'Dirigeant')
            ->setCellValue('H1', 'Téléphone');


// mnk::debug($json);
$i=2;
foreach ($json as $key => $value) {
		// Miscellaneous glyphs, UTF-8

	$line = $i++;


	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('B'.$line, $value['Rang Année'])
	            ->setCellValue('C'.$line, $value['Raison Sociale'])
	            ->setCellValue('D'.$line, $value['Effectifs (moyen)'])
	            ->setCellValue('E'.$line, $value['Activité principale'])
	            ->setCellValue('F'.$line, $value['Adresse'].$value['Adresse 2'])
	            ->setCellValue('G'.$line, $value['Dirigeant'])
	            ->setCellValue('H'.$line, $value['Téléphone']);


$objPHPExcel->getActiveSheet()
    ->getRowDimension($line)
    ->setRowHeight(30);
	}

// mnk::debug($json);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($title);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$sheet = $objPHPExcel->getActiveSheet();

// title Style
	$styleA1 = $sheet->getStyle("B1:I1");
	$styleFont = $styleA1->getFont();
	$styleFont->setBold(true);
	$styleFont->setSize(14);
	$styleFont->setName('Arial');
	$styleFont->getColor()->setARGB("#242424");
	$styleA1->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$styleA1->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$styleA1->getAlignment()->setWrapText(true);
	//$styleFont->getBgColor()->setARGB("#242424");
$objPHPExcel->getActiveSheet()
    ->getRowDimension("1")
    ->setRowHeight(70);
	

// title Style
	$styleJ = $sheet->getStyle("B2:H".$i);
	$styleColFont = $styleJ->getFont();
	$styleColFont->setBold(false);
	$styleColFont->setSize(11);
	$styleColFont->setName('Arial');
	$styleColFont->getColor()->setARGB("#242424");
	$styleJ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$styleJ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$styleJ->getAlignment()->setWrapText(true);




$sheet->getStyle("H2:H".$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);


//col
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
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
