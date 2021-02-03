<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

$html = '<link rel="stylesheet" href="dompdf/style.css">
<div class="receipt-content">
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-wrapper">

                <div class="">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="aloha" alt="">
                        </div>
                        <div class="col-sm-6 text-right">

                            <strong>
                        DR RITUPARNA SHINDE
                    </strong>
                            <p>
                                MBBS, M.D(Med), DNB(Card) <br> FACC FSCAI(USA), FESC FISE <br> Reg. No. 2000/02/0865<br> Consultant & Interventional Cardiologist<br> Medical Director LDR Clinics
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        VIJAY JOSHI <span>Reg No. : 262 </span><span> Cell No : 9422060420</span>
                        <br> Age : 77/Male<span> Weight : 60.65 Kg   </span><span> BMI : 22.009726 </span> <span> HB1C : 10.13</span><span> GFR : Infinity</span>
                    </div>
                    <div class="col-sm-4 text-right">
                        <span>Date : Mon - 23 Sep 2019</span>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="clinical-notes">
                        <strong>Clinical Notes:</strong><br> lorem lorem

                    </div>
                    <div class="clinical-notes">
                        <strong>Clinical Diagnosis:</strong><br> lorem lorem

                    </div>
                </div>

                <div class="line-items">
                    <div class="headers clearfix">
                        <div class="row">
                            <strong><div class="col-xs-2">Medicine</div></strong>
                            <strong><div class="col-xs-2">Morning</div></strong>
                            <strong><div class="col-xs-2">Afternoon</div></strong>
                            <strong><div class="col-xs-2">Night</div></strong>
                            <strong><div class="col-xs-2">Remarks</div></strong>
                            <strong><div class="col-xs-2 text-right">Days</div></strong>
                        </div>
                    </div>
                    <div class="items">
                        <div class="row item">
                            <div class="col-xs-2 desc">
                                Tab. ACILOC 150
                            </div>
                            <div class="col-xs-2 qty">
                                2
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                After Dinner
                            </div>
                            <div class="col-xs-2 amount text-right">
                                10
                            </div>
                        </div>
                        <div class="row item">
                            <div class="col-xs-2 desc">
                                Tab. ACILOC 150
                            </div>
                            <div class="col-xs-2 qty">
                                2
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                After Dinner
                            </div>
                            <div class="col-xs-2 amount text-right">
                                10
                            </div>
                        </div>
                        <div class="row item">
                            <div class="col-xs-2 desc">
                                Tab. ACILOC 150
                            </div>
                            <div class="col-xs-2 qty">
                                2
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                After Dinner
                            </div>
                            <div class="col-xs-2 amount text-right">
                                10
                            </div>
                        </div>

                        <div class="row item">
                            <div class="col-xs-2 desc">
                                Tab. ACILOC 150
                            </div>
                            <div class="col-xs-2 qty">
                                2
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                After Dinner
                            </div>
                            <div class="col-xs-2 amount text-right">
                                10
                            </div>
                        </div>
                        <div class="row item">
                            <div class="col-xs-2 desc">
                                Tab. ACILOC 150
                            </div>
                            <div class="col-xs-2 qty">
                                2
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                0
                            </div>
                            <div class="col-xs-2 qty">
                                After Dinner
                            </div>
                            <div class="col-xs-2 amount text-right">
                                10
                            </div>
                        </div>

                    </div>
                    <div>
                        <p class="extra-notes">
                            <strong>Advice:</strong> Leptin,OGTT PLUS,

                        </p>
                        <div>Next visit date : Tue - 08 Oct 2019 / <span>as necessary [Please confirm appointment 2 days prior]</span> </div>
                    </div>
                    <div class="col-sm-12 text-right ">
                        <strong>DR RITUPARNA SHINDE</strong>
                    </div>

                    <div class="print">
                        <a href="#">
                            <i class="fa fa-print"></i> Print this receipt
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer">
                Copyright © 2014. company name
            </div>
        </div>
    </div>
</div>
</div>';

$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("payment.pdf", array(
    "Attachment" => false
));

exit(0);
?> 