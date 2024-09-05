<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Export Controller
 *
 * @author TechArise Team
 *
 * 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('Main_controller.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Export extends Main_controller {
	// construct
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	
    public function createXLS($test_date=0) {
        
         $date= date('dmY-Hms' ,time());
        if ($test_date!=0) 
            {
                $fileName = 'test_'.$test_date.'_'.$date.'.xlsx';  
                $student = $this->main_model->get_data('admission',
                                                   array('admission_test_date'=>$test_date));
            }
            else
            {
                $fileName = 'All-Data_'.$date.'.xlsx';  
                $student = $this->main_model->get_data('admission');
            }

            
        $objPHPExcel = new Spreadsheet();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Registration No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Registration Fee');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Program Code');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Present Class');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Reg By Admin');       
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Student Name');       
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Mobile No');       
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'D.O.B');       
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Gender');       
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Father Name');       
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mother Name');       
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Address');       
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Pin');       
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Nationality');       
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Last Exam Marks');       
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'C G P A');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Adhar Number');       
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'School');       
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Board');       
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Admission Test Date');       
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Center Code');       
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Father Qualification');       
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Mother Qualification');       
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Father Occupation');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Mother Occupation');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Father Organization');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Mother Organization');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Father Designation In Organization');    
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Mother Designation In Organization');  
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Father Contact No');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Mother Contact No');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Father Email');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Mother Email');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Submitted Date');            
        // set Row
        $rowCount = 2;
        foreach ($student as $row) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, $row->registration_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, $row->registration_fee);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, $row->program_code);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, $row->present_class);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'. $rowCount, $row->reg_by_admin);       
            $objPHPExcel->getActiveSheet()->SetCellValue('F'. $rowCount, $row->student_name);       
            $objPHPExcel->getActiveSheet()->SetCellValue('G'. $rowCount, $row->mobile_no);       
            $objPHPExcel->getActiveSheet()->SetCellValue('H'. $rowCount, $row->dob);       
            $objPHPExcel->getActiveSheet()->SetCellValue('I'. $rowCount, $row->gender);       
            $objPHPExcel->getActiveSheet()->SetCellValue('J'. $rowCount, $row->father_name);       
            $objPHPExcel->getActiveSheet()->SetCellValue('K'. $rowCount, $row->mother_name);       
            $objPHPExcel->getActiveSheet()->SetCellValue('L'. $rowCount, $row->address);       
            $objPHPExcel->getActiveSheet()->SetCellValue('M'. $rowCount, $row->pin);       
            $objPHPExcel->getActiveSheet()->SetCellValue('N'. $rowCount, $row->nationality);       
            $objPHPExcel->getActiveSheet()->SetCellValue('O'. $rowCount, $row->last_exam_marks);       
            $objPHPExcel->getActiveSheet()->SetCellValue('P'. $rowCount, $row->c_g_p_a);       
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'. $rowCount, $row->adhar_number);       
            $objPHPExcel->getActiveSheet()->SetCellValue('R'. $rowCount, $row->school);       
            $objPHPExcel->getActiveSheet()->SetCellValue('S'. $rowCount, $row->board);       
            $objPHPExcel->getActiveSheet()->SetCellValue('T'. $rowCount, $row->admission_test_date);  
            $objPHPExcel->getActiveSheet()->SetCellValue('U'. $rowCount, $row->center_code);       
            $objPHPExcel->getActiveSheet()->SetCellValue('V'. $rowCount, $row->father_qualification);  
            $objPHPExcel->getActiveSheet()->SetCellValue('W'. $rowCount, $row->mother_qualification);  
            $objPHPExcel->getActiveSheet()->SetCellValue('X'. $rowCount, $row->father_occupation);      
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'. $rowCount, $row->mother_occupation);     
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'. $rowCount, $row->father_organization);  
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'. $rowCount, $row->mother_organization);   
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'. $rowCount, $row->father_designation_in_organization);  
            $objPHPExcel->getActiveSheet()->SetCellValue('AC'. $rowCount, $row->mother_designation_in_organization);  
            $objPHPExcel->getActiveSheet()->SetCellValue('AD'. $rowCount, $row->father_contact_no);  
            $objPHPExcel->getActiveSheet()->SetCellValue('AE'. $rowCount, $row->mother_contact_no);  
            $objPHPExcel->getActiveSheet()->SetCellValue('AF'. $rowCount, $row->father_email);       
            $objPHPExcel->getActiveSheet()->SetCellValue('AG'. $rowCount, $row->mother_email);       
            $objPHPExcel->getActiveSheet()->SetCellValue('AH'. $rowCount, $row->submitted_date);  
            $rowCount++;
        }
        $objWriter = new Xlsx($objPHPExcel);
        $objWriter->save(base_url().'results_xlsx/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url().'results_xlsx/'.$fileName);        
    }
    
}
?>