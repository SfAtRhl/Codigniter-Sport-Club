<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReclamationModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class ExportController extends BaseController
{
    public function exportDatapdf()
    {
        try {
            $reclamationModel = new ReclamationModel();
            $reclamations =
                $reclamationModel->where('Status', 'Pending')->findAll();

            $html = '<h2 style="text-align: center;"> Liste of Reclamation </h2>
            <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th style="padding: 10px; text-align: center; font-weight: bold;">NumReclamation</th>
                                <th style="padding: 10px; text-align: left; font-weight: bold;">CorpReclamation</th>
                                <th style="padding: 10px; text-align: left; font-weight: bold;">DateReclamation</th>
                                <th style="padding: 10px; text-align: left; font-weight: bold;">PseudoNom</th>
                                <th style="padding: 10px; text-align: center; font-weight: bold;">Status</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($reclamations as $reclamation) {
                $html .= '<tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;">' . $reclamation['NumReclamation'] . '</td>
                            <td style="padding: 10px;">' . $reclamation['CorpReclamation'] . '</td>
                            <td style="padding: 10px;">' . $reclamation['DateReclamation'] . '</td>
                            <td style="padding: 10px;">' . $reclamation['PseudoNom'] . '</td>
                            <td style="padding: 10px;">' . $reclamation['Status'] . '</td>
                        </tr>';
            }

            $html .= '</tbody></table>';

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment;filename="reclamations.pdf"');
            header('Cache-Control: max-age=0');

            echo $dompdf->output();
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function exportData()
    {
        try {
            $reclamationModel = new ReclamationModel();
            $reclamations = $reclamationModel->where('Status', 'Pending')->findAll();

            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();

            // Set headers
            $activeWorksheet->setCellValue('A1', 'NumReclamation');
            $activeWorksheet->setCellValue('B1', 'CorpReclamation');
            $activeWorksheet->setCellValue('C1', 'DateReclamation');
            $activeWorksheet->setCellValue('D1', 'PseudoNom');
            $activeWorksheet->setCellValue('E1', 'Status');

            // Set data starting from the second row
            $row = 2;
            foreach ($reclamations as $reclamation) {
                $activeWorksheet->setCellValue('A' . $row, $reclamation['NumReclamation']);
                $activeWorksheet->setCellValue('B' . $row, $reclamation['CorpReclamation']);
                $activeWorksheet->setCellValue('C' . $row, $reclamation['DateReclamation']);
                $activeWorksheet->setCellValue('D' . $row, $reclamation['PseudoNom']);
                $activeWorksheet->setCellValue('E' . $row, $reclamation['Status']);
                $row++;
            }

            // Set headers bold
            $activeWorksheet->getStyle('A1:E1')->getFont()->setBold(true);

            // Set column width
            foreach (range('A', 'E') as $col) {
                $activeWorksheet->getColumnDimension($col)->setWidth(15);
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="reclamations.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
