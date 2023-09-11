<?php
#ARTICLE

use function PHPSTORM_META\type;

$result_article = 0;
$var_bigest = 0;
$array = [];
$profile_article = [];
$profile_NATO = [];
$timing = $_POST["16"];
require_once("Assist/dbconnection.php");

//print_r($_POST);
$GCS = $_POST[13] + $_POST[14] + $_POST[15];


if ($GCS >= 3 && $GCS <= 5) {
    $Score_GCS = 3;
} elseif ($GCS >= 6 && $GCS <= 14) {
    $Score_GCS = 2;
} elseif ($GCS >= 13 && $GCS < 15) {
    $Score_GCS = 1;
} elseif ($GCS == 15) {
    $Score_GCS = 0;
}

//echo "GCS: " . $Score_GCS . "<br>";

for ($i = 1; $i < 7; $i++) {
    $temp = strval($i);
    $result_article +=  intval($_POST[$temp]);
}
$final_result = $result_article + $Score_GCS;
//echo "result_article: " . $final_result . "<br>";



if ($timing == 1) {
    array_push($array, 1);
} elseif ($timing == 2) {
    array_push($array, 3);
} elseif ($timing == 3) {
    array_push($array, 5);
    array_push($array, 7);
} elseif ($timing == 4) {
    array_push($array, 21);
    array_push($array, 23);
    array_push($array, 24);
} elseif ($timing == 5) {
    array_push($array, 66);
    array_push($array, 68);
} elseif ($timing == 6) {
    array_push($array, 106);
    array_push($array, 158);
    array_push($array, 248);
} elseif ($timing == 7) {
    array_push($array, 1002);
    array_push($array, 1006);
    array_push($array, 1008);
} elseif ($timing == 8) {
    array_push($array, 1944);
    array_push($array, 1948);
} elseif ($timing == 9) {
    array_push($array, 8648);
    array_push($array, 8646);
    array_push($array, 20168);
}
//print_r($array);

for ($i = 0; $i < count($array); $i++) {
    $var_temp = intval($array[$i]) . "<br>";
    $var_temp = intval($var_temp);

    $query = "SELECT `profile_id` FROM `pofiles` WHERE `total`=$final_result AND `time`=$var_temp;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result);

    if ($rows != 0) {
        while ($res = $result->fetch_assoc()) {
            //echo "article_profile" .$res["profile_id"];
            array_push($profile_article, $res["profile_id"]);
        }
    } else {
        echo "";
    }
}
//print_r($profile_article);



#NATO
for ($i = 7; $i < 13; $i++) {
    $temp = strval($i);
    if ($var_bigest < $_POST[$temp]) {
        $var_bigest = $_POST[$temp];
    }
}
//echo "biggest value in NATO" . $var_bigest;
if ($var_bigest == 0) {
    array_push($profile_NATO, 1);
    //echo "NATO" . "profile 1";
} elseif ($var_bigest == 1) {
    array_push($profile_NATO, 2);
    array_push($profile_NATO, 3);
    //echo "NATO" . "profile 2,3";
} elseif ($var_bigest == 2) {
    array_push($profile_NATO, 3);
    array_push($profile_NATO, 4);
    //echo "NATO" . "profile 3,4";
} elseif ($var_bigest == 3) {
    array_push($profile_NATO, 4);
    array_push($profile_NATO, 5);
    //echo "NATO" . "profile 4,5";
} elseif ($var_bigest == 4) {
    array_push($profile_NATO, 5);
    array_push($profile_NATO, 6);
    //echo "NATO" . "profile 5,6";
}
foreach ($profile_NATO as $value) {
    array_push($profile_article, $value);
}
sort($profile_article);
print_r($profile_article);
?>
<input type="hidden" name="result1" value="<?php echo $profile_article[count($profile_article) - 2] ?>">
<input type="hidden" name="result2" value="<?php echo $profile_article[count($profile_article) - 1] ?>">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <title>final result</title>
</head>
<style>
    body {
        background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-10 mx-auto border border-light border-3 rounded-2 p-0">
                <table class="p-0">
                    <thead>
                        <tr>
                            <th class=" text-capitalize fs-5 border border-2 border-primary border-top-0 border-bottom-0 border-start-0 border-end-0  py-2 text-center">poisning status</th>
                            <th class=" text-capitalize fs-5 border border-2 border-primary border-top-0 border-bottom-0 border-end-0 py-2 text-center">description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td class=" p-0 text-center border border-2 border-primary profile">
                                <p class=" fs-5 text-capitalize py-3">poisning status1</p>
                            </td>
                            <td id="1" class=" status1_text">
                                <ul>
                                    <li>A short episode of eye-related symptoms (such as pain and constricted pupils) only.</li>
                                    <li>Spontaneous recovery occurred after 6 hours.</li>
                                    <li>The exposure levels ranged from 0.2 to 1 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0 text-center border border-2 border-primary profile">
                                <p class= " fs-5 text-capitalize py-3">poisning status2</p>
                            </td>
                            <td id="2" class="status2_text">
                                <ul>
                                    <li> Mild eye and respiratory symptoms (such as wheezing and shortness of breath).</li>
                                    <li>Respiratory symptoms improved after 1.5 hours, and eye symptoms improved after approximately 16 hours but persisted for several weeks.</li>
                                    <li>The exposure range was between 1 and 6.5 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0 text-center border border-2 border-primary profile">
                                <p class="fs-5 text-capitalize py-3">poisning status3</p>
                            </td>
                            <td id="3" class="status3_text">
                                <ul>
                                    <li> Moderate poisoning with mild gastrointestinal and respiratory symptoms.</li>
                                    <li>These symptoms lasted for about a week, with eye symptoms persisting longer.</li>
                                    <li>The exposure range was 6.5 to 12 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0 text-center border border-2 border-primary profile">
                                <p class="fs-5 text-capitalize py-3">poisning status4</p>
                            </td>
                            <td id="4" class="status4_text ">
                                <ul>
                                    <li> Moderate poisoning with severe excessive bronchial secretions, respiratory distress, and mild neurological symptoms (agitation, anxiety, muscle twitching, and seizures).</li>
                                    <li> Improvement occurred after 60 to 90 minutes, but mild eye, respiratory, and gastrointestinal symptoms continued for several days to weeks.</li>
                                    <li>The exposure range was 12 to 25 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0 text-center border border-2 border-primary profile">
                                <p class="fs-5 text-capitalize py-3">poisning status5</p>
                            </td>
                            <td id="5" class="status5_text ">
                                <ul>
                                    <li>Severe poisoning with respiratory insufficiency (both central and muscular), seizures, and severe eye and gastrointestinal symptoms.</li>
                                    <li> Brief seizures or coma lasting approximately 15 minutes, but severe respiratory, muscular, and neurological symptoms persisted for 1 to 2 hours, gradually improving for days to weeks.</li>
                                    <li>The exposure range was 25 to 30 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-0 text-center border border-2 border-primary profile">
                                <p class="fs-5 text-capitalize py-3">poisning status6</p>
                            </td>
                            <td id="6" class=" status6_text">
                                <ul>
                                    <li>The most severe form of poisoning, characterized by all symptoms reaching their utmost severity.</li>
                                    <li>Without treatment, death is expected after 15 minutes, primarily due to a combination of muscle weakness, respiratory failure, and prolonged seizures or coma.</li>
                                    <li>The exposure range was over 30 mg/min/m−3.</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="Script/result.js"></script>

</html>