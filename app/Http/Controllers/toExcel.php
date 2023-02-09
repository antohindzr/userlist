<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Exceluser;
        
        $spreadsheet = new Spreadsheet();
        $toExcel = new Xlsx($spreadsheet);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'name');
        $sheet->setCellValue('C1', 'number');
        $sheet->setCellValue('D1', 'email');
        $sheet->setCellValue('E1', 'email_verified_at');
        $sheet->setCellValue('F1', 'password');
        $sheet->setCellValue('G1', 'remember_token');
        $sheet->setCellValue('H1', 'created_at');
        $sheet->setCellValue('I1', 'updated_at');

        $row = 2;
        $exceldata=Exceluser::all();
        foreach($exceldata as $content){
        $sheet->setCellValue('A' . $row, $content['id']);
        $sheet->setCellValue('B' . $row, $content['name']);
        $sheet->setCellValue('C' . $row, $content['number']);
        $sheet->setCellValue('D' . $row, $content['email']);
        $sheet->setCellValue('E' . $row, $content['email_verified_at']);
        $sheet->setCellValue('F' . $row, $content['password']);
        $sheet->setCellValue('G' . $row, $content['remember_token']);
        $sheet->setCellValue('H' . $row, $content['created_at']);
        $sheet->setCellValue('I' . $row, $content['updated_at']);
        $row++;}
        $toExcel->save('listuserto.xlsx');