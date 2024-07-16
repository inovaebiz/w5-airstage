<?php
$file_url = 'Modelo de comprovante de instalação.docx';

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file_url) . '"');

readfile($file_url);