<?php 
 //paste code
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load PhpSpreadsheet library
        // $this->load->library('PhpSpreadsheet');
    }

    public function index() {
        // Load Composer autoloader
        require_once FCPATH . 'vendor/autoload.php'; // Adjust the path as needed

        // Create a new PhpSpreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set active sheet
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        // Add data to the spreadsheet
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Age');

        $sheet->setCellValue('A2', 'John');
        $sheet->setCellValue('B2', '30');

        $sheet->setCellValue('A3', 'Alice');@
        $sheet->setCellValue('B3', '25');

        // Save the spreadsheet
        $writer = new Xlsx($spreadsheet);
        $filename = 'example.xlsx';
        $writer->save($filename);

        // Download the spreadsheet
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
?>