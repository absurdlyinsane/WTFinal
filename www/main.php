<?php

$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$division = $_POST['division'];
$country = $_POST['country'];
$dob = $_POST['dob'];

$birth = new DateTime($dob);
$today = new DateTime();
$diff = $today->diff($birth);
$years = $diff->y;
$months = $diff->m;
$days = $diff->d;

$countTotal = 0;
$countMale = 0;
$countFemale = 0;

function pcount($gen, &$countTotal, &$countMale, &$countFemale){
    global $countTotal, $countMale, $countFemale;
    if($gen == 'male'){
        $countTotal++;
        $countMale++;
    } elseif($gen == 'female'){
        $countTotal++;
        $countFemale++;
    } else{
        echo "Error! Invalid gender input.";
    }
}

if($years <= 5){
    pcount($gender, $countTotal, $countMale, $countFemale);
    echo "You are eligible for vaccination.<br><br>";
    echo "Name: $name<br>";
    echo "Gender: $gender<br>";
    echo "Address: $address<br>";
    echo "Division: $division<br>";
    echo "Country: $country<br>";
    echo "Age: $years years $months months $days days<br><br>";
    echo "Total: $countTotal<br>Male: $countMale<br>Female: $countFemale";
} else{
    echo "You are NOT eligible for vaccination.<br><br>";
}

?>