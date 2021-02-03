<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

extract($_POST);

$visitDate =$_POST['cvisitDate'];
$patientId=  $_POST['cpatientId'];

function loaddata($patientId,$visitDate)
{
    include 'connection.php';
    $output = '';
    $sql    = "SELECT * FROM consent_form_master cfm 
     WHERE cfm.u_patientId = $patientId AND cfm.visitDate = '$visitDate'";

$jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $deseaseNew = $academicResults['deseaseNew'];
            $sinceDays = $academicResults['sinceDays'];
            $relativeName = $academicResults['relativeName'];
            $medicalTreatment = $academicResults['medicalTreatment'];
            $treatmentName = $academicResults['treatmentName'];
            $hospitalCenterName = $academicResults['hospitalCenterName'];
            $output.='  <p style="font-size: 16px; margin-left:10px">I <b><u>'.$academicResults['patientName'].'
                    </u></b> am a patient of  <b> <u>'.$deseaseNew.'</u></b>
                     since <b><u>'.$sinceDays.'</u></b> .</p>';
                    
             $output.='  <p  style="font-size: 16px; margin-left:10px">I have approached 360° Spinal Wellness and Rehabilitation for the treatment of the same.</p>';  
             $output.=' <p style="font-size: 16px; margin-left:10px">I am aware that my complaints are lifestyle based / degenerative in nature that has accumulated over time due to a wrong lifestyle / posture / age factor, etc. The doctor / therapist has examined me and explained about problems and treatment options.</p>';
             $output.=' <p style="font-size: 16px; margin-left:10px"> I am aware that non-surgical and / or complementary and alternative methods require its own course of time as they offer progressive wellness and relief. I have been explained clearly and properly by the doctors / staff of the therapeutic centre, about the treatment options, indications and contra-indications. </p>
             <p style="font-size: 16px; margin-left:10px"> I shall abstain from physical and mental stress.</p>';
             $output.=' <p style="font-size: 16px; margin-left:10px">I was explained and am aware from counselling that non-invasive and conventional treatment offered has a success rate of 80-90%. I am aware and agree that there are chances that I may not get benefit from the therapy due to any underlying anatomical / physiological / lifestyle / medical conditions.</p>';
               $output.='<p style="font-size: 16px; margin-left:10px"> I agree with good conscience to undergo the therapy / program offered. I will not hold responsible doctor / therapist / technician / other staff for the treatment results. I assure complete co-operation to the doctor / therapist during the course of the treatment and the following post treatment recurrence management program which includes but not limited to ergonomic/ postural correction, nutrition planning and active life style modifications</p>';
                $output.='<p style="font-size: 16px; margin-left:10px">I also agree to use my treatment reports for patient registry documentation purposes and for clinical studies for the betterment of humankind.</p>';
                $output.='<p style="font-size: 16px; margin-left:10px">Signature of Patient:<input type="text" style="margin-top:20px"></p> ';
                $output.='<img class="img-fluid" src="img/concent.jpg" width="100% " height="30%">';
                $output.=' <h3><center><b>PATIENT ATTENDANT CONSENT</b></center></h3>';
                $output.= '<p style="font-size: 16px; margin-left:10px">I  <b><u>'.$relativeName.'</u></b>  am a relative / friend to the patient  <b><u>'.$academicResults['patientName'].'</u>.</b>';
                $output.=' We have been explained about the therapy and agree for <b><u>'.$medicalTreatment.'</u></b>';
                $output.=' to undergo <b><u>'.$treatmentName.'</u></b>. We will not hold any doctor / therapist / staff of the hospital / medical centre regarding the treatment and treatment results.</p>
                 
                </p>';
                $output.='<p style="font-size: 16px; margin-left:10px"> The Doctor at  <b><u>'.$hospitalCenterName.'</u></b> centre have explained myself and the patient in detail the nature of the treatment. I hereby give consent for the patient to undergo the treatment.  </p>';
                $output.='<p style="font-size: 16px; margin-left:10px">Relation to Patient:<input type="text" style="margin-top:16px"></p>';
                $output.='<p style="font-size: 16px; margin-left:10px">Signature of Attendant:<input type="text" style="margin-top:16px"></p>';
            }
    }
    return $output;
}
$html = '
<html>
<link rel="stylesheet" href="mpdf/style.css">
<div class="container-fluid">                                    
<div class="row">

<img class="img-fluid" src="img/concent.jpg" width="100% " height="30%">

    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body form-group">
               
                <h3><center><b>CONSENT FORM</b></center></h3>
            
                     '.loaddata($patientId,$visitDate).' 
                  
                    </div>
                </div>

        </div>
    </div>

        </div>
</html>';
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml(html_entity_decode($html));
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("payment.pdf", array(
    "Attachment" => false
));

exit(0);
?>