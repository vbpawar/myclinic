<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['fat']) && isset($_POST['metabolicAge'])  && isset($_POST['chest']) && isset($_POST['waist']) && isset($_POST['hip']) && isset($_POST['thighR']) &&
isset($_POST['viceral']) && isset($_POST['thighL']) && isset($_POST['waistRatio']) && isset($_POST['noFamilyMembers']) && isset($_POST['dm']) && isset($_POST['htn']) &&
isset($_POST['vericose']) && isset($_POST['irregularMenses']) && isset($_POST['thyroid']) && isset($_POST['joint']) && isset($_POST['constipation']) && isset($_POST['pedalEndema']) &&
isset($_POST['pcod']) && isset($_POST['backAche']) && isset($_POST['acidity']) && isset($_POST['gases']) && isset($_POST['heartDisease']) && isset($_POST['Dislipidemia']) &&
isset($_POST['breathlessness']) && isset($_POST['bloating']) && isset($_POST['surgicalHistory']) && isset($_POST['likes']) && isset($_POST['dislike']) &&
 isset($_POST['dietRecall']) && isset($_POST['sweetCraving'])) {
    

 
 
    $fat  = isset($_POST['fat']) ? $_POST['fat'] : 'NULL';
    $metabolicAge  = isset($_POST['metabolicAge']) ? $_POST['metabolicAge'] : 'NULL';
    $chest  = isset($_POST['chest']) ? $_POST['chest'] : 'NULL';
    $waist   = isset($_POST['waist ']) ? $_POST['waist '] : 'NULL';
    $hip   = isset($_POST['hip']) ? $_POST['hip'] : 'NULL';
    $thighR   = isset($_POST['thighR']) ? $_POST['thighR'] : 'NULL';
    $viceral   = isset($_POST['viceral']) ? $_POST['viceral'] : 'NULL';
    $thighL   = isset($_POST['thighL']) ? $_POST['thighL'] : 'NULL';
    $waistRatio   = isset($_POST['waistRatio']) ? $_POST['waistRatio'] : 'NULL';
    $noFamilyMembers   = isset($_POST['noFamilyMembers']) ? $_POST['noFamilyMembers'] : 'NULL';
    $dm   = isset($_POST['dm']) ? $_POST['dm'] : 'NULL';
    $htn   = isset($_POST['htn']) ? $_POST['htn'] : 'NULL';
    $vericose   = isset($_POST['vericose']) ? $_POST['vericose'] : 'NULL';
    $irregularMenses   = isset($_POST['irregularMenses']) ? $_POST['irregularMenses'] : 'NULL';
    $thyroid   = isset($_POST['thyroid']) ? $_POST['thyroid'] : 'NULL';
    $joint   = isset($_POST['joint']) ? $_POST['joint'] : 'NULL';
    $constipation   = isset($_POST['constipation']) ? $_POST['constipation'] : 'NULL';
    $pedalEndema   = isset($_POST['pedalEndema']) ? $_POST['pedalEndema'] : 'NULL';
    $pcod   = isset($_POST['pcod']) ? $_POST['pcod'] : 'NULL';
    $backAche   = isset($_POST['backAche']) ? $_POST['backAche'] : 'NULL';
    $acidity   = isset($_POST['acidity']) ? $_POST['acidity'] : 'NULL';
    $gases   = isset($_POST['gases']) ? $_POST['gases'] : 'NULL';
    $heartDisease   = isset($_POST['heartDisease']) ? $_POST['heartDisease'] : 'NULL';
    $Dislipidemia   = isset($_POST['Dislipidemia']) ? $_POST['Dislipidemia'] : 'NULL';
    $breathlessness   = isset($_POST['breathlessness']) ? $_POST['breathlessness'] : 'NULL';
    $bloating   = isset($_POST['bloating']) ? $_POST['bloating'] : 'NULL';
    $surgicalHistory   = isset($_POST['surgicalHistory']) ? $_POST['surgicalHistory'] : 'NULL';
    $likes   = isset($_POST['likes']) ? $_POST['likes'] : 'NULL';
    $dislike   = isset($_POST['dislike']) ? $_POST['dislike'] : 'NULL';
    $dietRecall   = isset($_POST['dietRecall']) ? $_POST['dietRecall'] : 'NULL';
    $sweetCraving   = isset($_POST['sweetCraving']) ? $_POST['sweetCraving'] : 'NULL';


    $sql = "INSERT INTO patient_diet_master (fat,metabolicAge,chest,waist,hip,thighR,viceral,thighL,waistRatio,noFamilyMembers,dm,htn,vericose,irregularMenses,thyroid,joint,
    constipation,pedalEndema,pcod,backAche,acidity,gases,heartDisease,Dislipidemia,breathlessness,bloating,surgicalHistory,likes,dislike,dietRecall,sweetCraving)
     VALUES ('$fat','$metabolicAge','$chest','$waist','$hip','$thighR','$viceral','$thighL','$waistRatio','$noFamilyMembers','$dm','$htn','$vericose','$irregularMenses','$thyroid',
     '$joint','$constipation','$pedalEndema','$pcod','$backAche','$acidity','$gases','$heartDisease','$Dislipidemia','$breathlessness','$bloating','$surgicalHistory','$likes',
     '$dislike','$dietRecall','$sweetCraving')";
    
    $query = mysqli_query($conn, $sql);                                                                                                                                 
    
    $rowsAffected = mysqli_affected_rows($conn);


    if ($rowsAffected == 1) {
        // $patientId = $conn->insert_id;
        // $academicQuery = mysqli_query($conn, "SELECT * FROM patient_diet_master where patientId = $patientId");
        // if ($academicQuery != null) {
        //     $academicAffected = mysqli_num_rows($academicQuery);
        //     if ($academicAffected > 0) {
        //         $academicResults = mysqli_fetch_assoc($academicQuery);
        //         $records         = $academicResults;
        //     }
        // }
        $response = array(
            'Message' => "Added Successfull",
            "Data" => $sql,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500,
            "Data" => $sql
        );
    }
} else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
        
    );
}
mysqli_close($conn);
print json_encode($response);

?> 