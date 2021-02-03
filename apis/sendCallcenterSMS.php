<?php
function sendSMS($patientId)
{
    date_default_timezone_set('Asia/Kolkata');
    include "../connection.php";
    $response = false;
    $sql      = "SELECT firstName,surname,mobile1 FROM patient_master WHERE patientId = $patientId";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $Name            = $academicResults['firstName'] . ' ' . $academicResults['surname'];
            $contactNumber   = $academicResults['mobile1'];
            $message = "Hello Mr/Mrs $Name.
    Your today's appointment with 360° Spinal wellness & Rehabilitation is booked at ______. Kindly be on time.
    Thank you!
    360° Spinal wellness & Rehabilitation
    (SHIVAJI NAGAR)
    Crescent Exclusee, Flat No.2, Revenue Colony, Shivaji Nagar, Pune- 411005
    (PIMPLE SAUDAGAR)
    Royal Tranquil, Office No.303, Kokane Chowk,Pimple Saudagar, Pimpri Chinchwad- 411027
    (VIMAN NAGAR)
    Bhakti nest Appartment, Office No.3, Bhakti nest Appartment, First Floar, Opp. to Khalsa, Datta Mandir Chowk, Viman Nagar, Pune- 411014
    (NIGDI)
    Nlivein @Lokmanya hospital, Nigdi Pradhikaran
    (KOCHI)
    48/1744 C 47, 7th Floor, Jomer Symphony, Ponnurunni, Vyttila Kochi- 682019
    +91 80988 00080
    +91 80987 00080";
            
           $message = urlencode($message);
            $url     = "http://sms.messageindia.in/sendSMS?username=360spn&message=$message&sendername=SPNWEL&smstype=TRANS&numbers=$contactNumber&apikey=947be38e-f04b-4521-8067-da881e5dd3f5";
            $json = file_get_contents($url);
            $json = json_decode($json, true);
            if ($json[0]['responseCode'] == 'Message SuccessFully Submitted') {
                $response = true;
            } else {
                $response = false;
            }
        } else {
            $response = false;
        }
    }
    return $response;
}
?>