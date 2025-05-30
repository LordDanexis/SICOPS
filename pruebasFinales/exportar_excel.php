<?php
require 'vendor/autoload.php';
include 'db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$where = [];
$params = [];

foreach (['campo1', 'campo2', 'campo3', 'campo4'] as $campo) {
    if (!empty($_GET[$campo])) {
        $where[] = "$campo LIKE :$campo";
        $params[$campo] = '%' . $_GET[$campo] . '%';
    }
}

$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';
$sql = "SELECT * FROM mi_tabla $whereSQL";
$stmt = $pdo->prepare($sql);
foreach ($params as $key => $val) {
    $stmt->bindValue(":$key", $val);
}
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

if ($data) {
    $sheet->fromArray(array_keys($data[0]), NULL, 'A1');
    $sheet->fromArray($data, NULL, 'A2');
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporte.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
