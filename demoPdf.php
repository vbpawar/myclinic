<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

$html = '
<html>
<head>
    <style>
        @font-face {
            font-family: "Firefly";
            font-style: normal;
            font-weight: normal;
            src: url(http://example.com/fonts/firefly.ttf) format("truetype");
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <p style="font-family: firefly, DejaVu Sans, sans-serif;">献给母亲的爱</p>
</body>
</html>';
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array(
    "Attachment" => false
));

exit(0);
?>