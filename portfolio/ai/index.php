<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <!--//------------------------ใส่ ไอคอน-->
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/5/5116.png">
    <!--..............................................................................................................-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Genetic Algorithm</title>
    <style type='text/css'>

  body {
    font-family: 'Kanit', sans-serif;
    }
    .btnsub {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
  border-radius: 10px;

  display: block;
  margin-right: auto;
  margin-left: auto;
}
.form-style-5{
	max-width: 85%;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 15px;

}
.center{
  display: block;
  margin-right: auto;
  margin-left: auto;
}
input{
    textAlign: center;
}
.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}

</style>
</head>
<body>
        <?php
error_reporting(0);

$Distance = array(
    array("", "Amman", "Lrbid", "Al-Mafraq", "Al-Salt", "Al-Aqabah", "Al-Karak")
    , array("Amman", 0, 90, 100, 35, 300, 200)
    , array("Lrbid", 90, 0, 60, 120, 400, 290)
    , array("Al-Mafraq", 100, 60, 0, 70, 480, 225)
    , array("Al-Salt", 35, 120, 70, 0, 320, 150)
    , array("Al-Aqabah", 300, 400, 480, 320, 0, 290)
    , array("Al-Karak", 200, 290, 225, 150, 290, 0),
);

?>
<br>
<div class="form-style-5">
               <center> <h2>Distance/Cost Matrix For TSP</h2></center>
                    <table border="1" align="center" width="1024" text-align="center">
              <!--          <tr  align="center" >
                            <th></th>
                            <th>Amman 1</th>
                            <th>Lrbid 2</th>
                            <th>Al-Mafraq 3</th>
                            <th>Al-Salt 4</th>
                            <th>Al-Aqabah 5</th>
                            <th>Al-Karak 6</th>
                        </tr>
            -->
                        <?php
for ($row = 0; $row < 7; $row++) {
    echo '<tr  align="center" >';
    for ($col = 0; $col < 7; $col++) {
        echo '<td>' . $Distance[$row][$col] . '</td>';
    }
    echo '</tr>';
}
?>
                    </table>
<br>
<center> <h2>Input Path.</h2></center>
<form action="" method="POST" >
<input type="hidden" name="chksubmit" value=1>
    <table border="1" align="center" width="1024" text-align="center">
            <tr  align="center" >
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
             </tr>
            <tr  align="center"  height="40px" >
                <th>P1 :</th>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G1" value="2"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G2" value="1"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G3" value="3"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G4" value="4"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G5" value="5"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr1G6" value="6"></td>
            </tr>
            <tr  align="center"  height="40px">
                <th>P2 :</th>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G1" value="1"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G2" value="2"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G3" value="3"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G4" value="5"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G5" value="4"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr2G6" value="6"></td>
            </tr>
            <tr  align="center"  height="40px">
                <th>P3 :</th>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G1" value="1"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G2" value="4"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G3" value="3"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G4" value="2"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G5" value="6"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr3G6" value="5"></td>
            </tr>
            <tr  align="center"  height="40px">
                <th>P4 :</th>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G1" value="5"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G2" value="3"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G3" value="2"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G4" value="1"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G5" value="4"></td>
                <td><input type='number'  maxlength="1"  style="width: 8em" name="Chr4G6" value="6"></td>
            </tr>
        </table>
        
        <br>
        <center>  <input type="checkbox" name="ChkRandom" value="1"> Random All Genes in Chromosome  <br></center>
      <center>  จำนวน Genneration :<input type='number'  maxlength="5"  style="width: 8em" name="num" class="center" value="1"></center>
            <input type="submit" class="btnsub">
            </form>
            </div>
            <hr>
            <?php

//----------------------------------------------------------------------------------------------------------------------------------------




if ($_POST['chksubmit'] == 1) {
  
//-----------------------------ถ้าเลือก Random
    if($_POST['ChkRandom']==1){
        $RandomValueP1=array(1,2,3,4,5,6);
        shuffle($RandomValueP1);
        $RandomValueP2=array(1,2,3,4,5,6);
        shuffle($RandomValueP2);
        $RandomValueP3=array(1,2,3,4,5,6);
        shuffle($RandomValueP3);
        $RandomValueP4=array(1,2,3,4,5,6);
        shuffle($RandomValueP4);
        $ValueP1 = array(
            $Distance[$RandomValueP1[0]][$RandomValueP1[1]]
            , $Distance[$RandomValueP1[1]][$RandomValueP1[2]]
            , $Distance[$RandomValueP1[2]][$RandomValueP1[3]]
            , $Distance[$RandomValueP1[3]][$RandomValueP1[4]]
            , $Distance[$RandomValueP1[4]][$RandomValueP1[5]]
            , $Distance[$RandomValueP1[5]][$RandomValueP1[0]],
        );
        $ValueP2 = array(
            $Distance[$RandomValueP2[0]][$RandomValueP2[1]]
            , $Distance[$RandomValueP2[1]][$RandomValueP2[2]]
            , $Distance[$RandomValueP2[2]][$RandomValueP2[3]]
            , $Distance[$RandomValueP2[3]][$RandomValueP2[4]]
            , $Distance[$RandomValueP2[4]][$RandomValueP2[5]]
            , $Distance[$RandomValueP2[5]][$RandomValueP2[0]],
        );
        $ValueP3 = array(
            $Distance[$RandomValueP3[0]][$RandomValueP3[1]]
            , $Distance[$RandomValueP3[1]][$RandomValueP3[2]]
            , $Distance[$RandomValueP3[2]][$RandomValueP3[3]]
            , $Distance[$RandomValueP3[3]][$RandomValueP3[4]]
            , $Distance[$RandomValueP3[4]][$RandomValueP3[5]]
            , $Distance[$RandomValueP3[5]][$RandomValueP3[0]],
        );
        $ValueP4 = array(
            $Distance[$RandomValueP4[0]][$RandomValueP4[1]]
            , $Distance[$RandomValueP4[1]][$RandomValueP4[2]]
            , $Distance[$RandomValueP4[2]][$RandomValueP4[3]]
            , $Distance[$RandomValueP4[3]][$RandomValueP4[4]]
            , $Distance[$RandomValueP4[4]][$RandomValueP4[5]]
            , $Distance[$RandomValueP4[5]][$RandomValueP4[0]],
        );
        $DistancePathP1 = $RandomValueP1;
        $DistancePathP2 = $RandomValueP2;;
        $DistancePathP3 = $RandomValueP3;
        $DistancePathP4 = $RandomValueP4;



        echo' <br><center> <h2>--------------------------- Show Data Random Is  Chromosome --------------------------- </h2></center><br>';
      echo  '<table border="1" align="center" width="1024" text-align="center">';
      for ($row = 0; $row < 4; $row++) {
        echo '<tr  align="center" >';
        echo '<td>P' . ($row + 1) . '</td>';
        for ($col = 0; $col < 6; $col++) {
            if ($row == 0) {
                echo '<td>' . $DistancePathP1[$col] . '</td>';
            } else if ($row == 1) {
                echo '<td>' . $DistancePathP2[$col] . '</td>';
            } else if ($row == 2) {
                echo '<td>' . $DistancePathP3[$col] . '</td>';
            } else if ($row == 3) {
                echo '<td>' . $DistancePathP4[$col] . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table><br>';


    }else{

    $ValueP1 = array(
        $Distance[$_POST['Chr1G1']][$_POST['Chr1G2']]
        , $Distance[$_POST['Chr1G2']][$_POST['Chr1G3']]
        , $Distance[$_POST['Chr1G3']][$_POST['Chr1G4']]
        , $Distance[$_POST['Chr1G4']][$_POST['Chr1G5']]
        , $Distance[$_POST['Chr1G5']][$_POST['Chr1G6']]
        , $Distance[$_POST['Chr1G6']][$_POST['Chr1G1']],
    );
    $ValueP2 = array(
        $Distance[$_POST['Chr2G1']][$_POST['Chr2G2']]
        , $Distance[$_POST['Chr2G2']][$_POST['Chr2G3']]
        , $Distance[$_POST['Chr2G3']][$_POST['Chr2G4']]
        , $Distance[$_POST['Chr2G4']][$_POST['Chr2G5']]
        , $Distance[$_POST['Chr2G5']][$_POST['Chr2G6']]
        , $Distance[$_POST['Chr2G6']][$_POST['Chr2G1']],
    );
    $ValueP3 = array(
        $Distance[$_POST['Chr3G1']][$_POST['Chr3G2']]
        , $Distance[$_POST['Chr3G2']][$_POST['Chr3G3']]
        , $Distance[$_POST['Chr3G3']][$_POST['Chr3G4']]
        , $Distance[$_POST['Chr3G4']][$_POST['Chr3G5']]
        , $Distance[$_POST['Chr3G5']][$_POST['Chr3G6']]
        , $Distance[$_POST['Chr3G6']][$_POST['Chr3G1']],
    );
    $ValueP4 = array(
        $Distance[$_POST['Chr4G1']][$_POST['Chr4G2']]
        , $Distance[$_POST['Chr4G2']][$_POST['Chr4G3']]
        , $Distance[$_POST['Chr4G3']][$_POST['Chr4G4']]
        , $Distance[$_POST['Chr4G4']][$_POST['Chr4G5']]
        , $Distance[$_POST['Chr4G5']][$_POST['Chr4G6']]
        , $Distance[$_POST['Chr4G6']][$_POST['Chr4G1']],
    );

    $DistancePathP1 = array($_POST['Chr1G1'], $_POST['Chr1G2'], $_POST['Chr1G3'], $_POST['Chr1G4'], $_POST['Chr1G5'], $_POST['Chr1G6']);
$DistancePathP2 = array($_POST['Chr2G1'], $_POST['Chr2G2'], $_POST['Chr2G3'], $_POST['Chr2G4'], $_POST['Chr2G5'], $_POST['Chr2G6']);
$DistancePathP3 = array($_POST['Chr3G1'], $_POST['Chr3G2'], $_POST['Chr3G3'], $_POST['Chr3G4'], $_POST['Chr3G5'], $_POST['Chr3G6']);
$DistancePathP4 = array($_POST['Chr4G1'], $_POST['Chr4G2'], $_POST['Chr4G3'], $_POST['Chr4G4'], $_POST['Chr4G5'], $_POST['Chr4G6']);
}
//--------------------------------------------------------------------------------------สลับ สุ่ม array



    

    $numgen=1;
    $CountGeneration = $_POST['num'];
    while($numgen <= $CountGeneration) {



    ?>
  <center> <h2>--------------------- Generation#<?php echo $numgen;?> Fitness Function & Percent Random --------------------- </h2></center>
                    <table border="1" align="center" width="1024" text-align="center">

         <?php

/////echo '<h2>--------------------- Convert Min To Max % ----------------------- </h2>';
    $Sumgeneration = array_sum($ValueP1) + array_sum($ValueP2) + array_sum($ValueP3) + array_sum($ValueP4);
    $GenerationValue = array(
        'p1' => 100 * (1 - (array_sum($ValueP1) / $Sumgeneration)) / 3//  ValueP1 = ค่า fitness ของ p1 
        , 'p2' => 100 * (1 - (array_sum($ValueP2) / $Sumgeneration)) / 3
        , 'p3' => 100 * (1 - (array_sum($ValueP3) / $Sumgeneration)) / 3
        , 'p4' => 100 * (1 - (array_sum($ValueP4) / $Sumgeneration)) / 3,
    );

    for ($row = 0; $row < 4; $row++) {
        echo '<tr  align="center" >';
        echo '<td>P' . ($row + 1) . '</td>';
        for ($col = 0; $col < 6; $col++) {
            if ($row == 0) {
                echo '<td>' . $DistancePathP1[$col] . '</td>';
            } else if ($row == 1) {
                echo '<td>' . $DistancePathP2[$col] . '</td>';
            } else if ($row == 2) {
                echo '<td>' . $DistancePathP3[$col] . '</td>';
            } else if ($row == 3) {
                echo '<td>' . $DistancePathP4[$col] . '</td>';
            }
        }

        if ($row == 0) {
            echo '<td>Fitness : ' . array_sum($ValueP1) . '</td>';
            echo '<td>Percent Random : ' . $GenerationValue[p1] . '</td>';
        } else if ($row == 1) {
            echo '<td>Fitness : ' . array_sum($ValueP2) . '</td>';
            echo '<td>Percent Random : ' . $GenerationValue[p2] . '</td>';
        } else if ($row == 2) {
            echo '<td>Fitness : ' . array_sum($ValueP3) . '</td>';
            echo '<td>Percent Random : ' . $GenerationValue[p3] . '</td>';
        } else if ($row == 3) {
            echo '<td>Fitness : ' . array_sum($ValueP4) . '</td>';
            echo '<td>Percent Random : ' . $GenerationValue[p4] . '</td>';
        }

        echo '</tr>';
    }
    echo '</table><br>';
    echo '<div align="center">';
    // echo '<h2>--------------------- Convert To % ----------------------- </h2>';
    /*
    $Sumgeneration = array_sum($ValueP1) + array_sum($ValueP2) + array_sum($ValueP3) + array_sum($ValueP4);
    $GenerationValue = array(
    'p1' => 100 * (1 - (array_sum($ValueP1) / $Sumgeneration)) / 3
    , 'p2' => 100 * (1 - (array_sum($ValueP2) / $Sumgeneration)) / 3
    , 'p3' => 100 * (1 - (array_sum($ValueP3) / $Sumgeneration)) / 3
    , 'p4' => 100 * (1 - (array_sum($ValueP4) / $Sumgeneration)) / 3,
    );
     */
    //echo "<div id='test' style='width: 420px; height: 420px ;'> </div>";
    echo  "<div id='".$numgen."test' style='width: 420px; height: 420px ; '>";
    echo '</div>';

    ?>
<Script type="text/javascript">

//---------------------------------------------------------------------------------------
anychart.onDocumentReady(function() {

// set the data
var data = [

  <?php

    foreach ($GenerationValue as $x => $x_value) {
        echo '{x:"' . $x . '",value:' . $x_value . '},';
    }

    ?>
/*

    {x: "White", value: 10},
    {x: "Black or African American", value: 10},
    {x: "American Indian and Alaska Native", value: 10},
    {x: "Asian", value: 10},
    {x: "Native Hawaiian and Other Pacific Islander", value: 10},
    {x: "Some Other Race", value: 10},
    {x: "Two or More Races", value: 10}

    */
];

// create the chart
var chart = anychart.pie();

// set the chart title
chart.title(" Chromosome Generation#<?php echo $numgen?>");

// add the data
chart.data(data);

// display the chart in the container
chart.container('<?php echo $numgen?>test');
chart.draw();
});

</Script>

<?php

    echo '<h2><<----------------------- ช่วงของ ตัวเลข ------------------------->></h2>';
    $number[0] = $GenerationValue[p1];
    $number[1] = $number[0] + $GenerationValue[p2];
    $number[2] = $number[1] + $GenerationValue[p3];
    $number[3] = $number[2] + $GenerationValue[p4];
    // echo $number[0] . '<br>' . $number[1] . '<br>' . $number[2] . '<br>' . $number[3];

    echo 'P1 : 1 - ' . $number[0] . '<br>';
    echo 'P2 : > ' . ($number[0]) . ' - ' . $number[1] . '<br>';
    echo 'P3 : > ' . ($number[1]) . ' - ' . $number[2] . '<br>';
    echo 'P4 : >' . ($number[2]) . ' - ' . $number[3] . '<br>';

    echo '<h2><<--------------------- พ่อ แม่ คู่ ที่ 1 และลูก ----------------------->></h2>';
    $random1 = rand(1, 100);
    //echo 'พ่อแรนดอมได้ : ' . $random1 . '<br>';
    echo '<table border="1" align="center" width="1024" text-align="center">';
    echo '<tr  align="center" >';
    if ($random1 >= 1 && $random1 <= $number[0]) {
        $FatherValue1 = $ValueP1;
        $FatherPath1 = $DistancePathP1;
        // echo 'พ่อ : P1';
        $FatherName1 = 'p1';
    } else if ($random1 > $number[0] && $random1 <= $number[1]) {
        $FatherValue1 = $ValueP2;
        $FatherPath1 = $DistancePathP2;
        // echo 'พ่อ : P2';
        $FatherName1 = 'p2';
    } else if ($random1 > $number[1] && $random1 <= $number[2]) {
        $FatherValue1 = $ValueP3;
        $FatherPath1 = $DistancePathP3;
        //echo 'พ่อ : P3';
        $FatherName1 = 'p3';
    } else if ($random1 > $number[2] && $random1 <= $number[3]) {
        $FatherValue1 = $ValueP4;
        $FatherPath1 = $DistancePathP4;
        //echo 'พ่อ : P4';
        $FatherName1 = 'p4';
    }
    echo '<td> พ่อ : ' . $FatherName1 . '</td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td bgcolor="#c5fbef">' . $FatherPath1[$col] . '</td>';
    }
    //  echo '</tr></table>';

    //echo '<h2>--------------------- random แม่----------------------- </h2>';

    $random2 = rand(1, 100);
    //echo 'แม่แรนดอมได้ : ' . $random2 . '<br>';
    // echo '<table border="1" align="center" width="1024" text-align="center">';
    echo '<tr  align="center" >';
    if ($random2 >= 1 && $random2 <= $number[0]) {
        $momValue1 = $ValueP1;
        $momPath1 = $DistancePathP1;
        //   echo 'แม่ : P1';
        $momName1 = 'p1';
    } else if ($random2 > $number[0] && $random2 <= $number[1]) {
        $momValue1 = $ValueP2;
        $momPath1 = $DistancePathP2;
        //  echo 'แม่ : P2';
        $momName1 = 'p2';
    } else if ($random2 > $number[1] && $random2 <= $number[2]) {
        $momValue1 = $ValueP3;
        $momPath1 = $DistancePathP3;
        //   echo 'แม่ : P3';
        $momName1 = 'p3';
    } else if ($random2 > $number[2] && $random2 <= $number[3]) {
        $momValue1 = $ValueP4;
        $momPath1 = $DistancePathP4;
        //  echo 'แม่ : P4';
        $momName1 = 'p4';
    }

    while ($FatherName1 == $momName1) {
        //echo " : แม่ซ้ำกับพ่อ ทำใหม่<br>";

        $random2 = rand(1, 100);
        // echo 'แม่แรนดอมได้ : ' . $random2 . '<br>';

        if ($random2 >= 1 && $random2 <= $number[0]) {
            $momValue1 = $ValueP1;
            $momPath1 = $DistancePathP1;
            // echo 'แม่ : P1';
            $momName1 = 'p1';
        } else if ($random2 > $number[0] && $random2 <= $number[1]) {
            $momValue1 = $ValueP2;
            $momPath1 = $DistancePathP2;
            //  echo 'แม่ : P2';
            $momName1 = 'p2';
        } else if ($random2 > $number[1] && $random2 <= $number[2]) {
            $mom = $ValueP3;
            $momPath1 = $DistancePathP3;
            //  echo 'แม่ : P3';
            $momName1 = 'p3';
        } else if ($random2 > $number[2] && $random2 <= $number[3]) {
            $momValue1 = $ValueP4;
            $momPath1 = $DistancePathP4;
            //   echo 'แม่ : P4';
            $momName1 = 'p4';
        }

    }
    echo '<td> แม่ : ' . $momName1 . '</td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td bgcolor="#ffe1ff">' . $momPath1[$col] . '</td>';
    }

//-------------------------------------------------------ลูกคนที่1
    for ($i = 3; $i < 6; $i++) {
        $childPath1[$i] = $FatherPath1[$i];
    }

    for ($k = 0; $k < 3; $k++) {

        for ($j = 0; $j < 6; $j++) {
            if ($k == 0 && $momPath1[$j] != $childPath1[3] && $momPath1[$j] != $childPath1[4] && $momPath1[$j] != $childPath1[5]) {
                $childPath1[$k] = $momPath1[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath1[$k] != '') {
                    break;
                }
            }
            if ($k == 1 && $momPath1[$j] != $childPath1[0] && $momPath1[$j] != $childPath1[3] && $momPath1[$j] != $childPath1[4] && $momPath1[$j] != $childPath1[5]) {
                $childPath1[$k] = $momPath1[$j];
                //  echo 'J : ' . $j . ' ';
                if ($childPath1[$k] != '') {
                    break;
                }
            }
            if ($k == 2 && $momPath1[$j] != $childPath1[0] && $momPath1[$j] != $childPath1[1] && $momPath1[$j] != $childPath1[3] && $momPath1[$j] != $childPath1[4] && $momPath1[$j] != $childPath1[5]) {
                $childPath1[$k] = $momPath1[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath1[$k] != '') {
                    break;
                }
            }

        }

    }

    echo '<tr  align="center" ><td> ลูกคนที่ 1</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col < 3) {
            $color = 'bgcolor="#ffe1ff"';
        } else if ($col > 2) {
            $color = 'bgcolor="#c5fbef"';
        }
        echo '<td ' . $color . '>' . $childPath1[$col] . '</td>';
    }
//-------------------------------------------------------ลูกคนที่2

    for ($i = 0; $i < 3; $i++) {
        $childPath2[$i] = $momPath1[$i];
    }

    for ($k = 3; $k < 6; $k++) {

        for ($j = 0; $j < 6; $j++) {
            if ($k == 3 && $momPath1[$j] != $childPath2[0] && $momPath1[$j] != $childPath2[1] && $momPath1[$j] != $childPath2[2]) {
                $childPath2[$k] = $momPath1[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath2[$k] != '') {
                    break;
                }
            }
            if ($k == 4 && $momPath1[$j] != $childPath2[0] && $momPath1[$j] != $childPath2[1] && $momPath1[$j] != $childPath2[2] && $momPath1[$j] != $childPath2[3]) {
                $childPath2[$k] = $momPath1[$j];
                //  echo 'J : ' . $j . ' ';
                if ($childPath2[$k] != '') {
                    break;
                }
            }
            if ($k == 5 && $momPath1[$j] != $childPath2[0] && $momPath1[$j] != $childPath2[1] && $momPath1[$j] != $childPath2[2] && $momPath1[$j] != $childPath2[3] && $momPath1[$j] != $childPath2[4]) {
                $childPath2[$k] = $momPath1[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath2[$k] != '') {
                    break;
                }
            }

        }

    }

    echo '<tr  align="center" ><td> ลูกคนที่ 2</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col < 3) {
            $color = 'bgcolor="#c5fbef"';
        } else if ($col > 2) {
            $color = 'bgcolor="#ffe1ff"';
        }
        echo '<td ' . $color . '>' . $childPath2[$col] . '</td>';
    }
//-------------------------------------------------------------------Mutation1
    $Mutation1 = $childPath1;
    $randomMutation1_1 = rand(0, 5);
    //  echo 'randomMutation1 1:' . $randomMutation1_1 . '<br>';
    $randomMutation1_2 = rand(0, 5);

    //  echo 'randomMutation1 2:' . $randomMutation1_2 . '<br>';
    while ($randomMutation1_1 == $randomMutation1_2) {
        $randomMutation1_2 = rand(0, 5);
        //   echo 'randomMutation1 2:' . $randomMutation1_2 . '<br>';
    }
    $ValueMutation1_1 = $Mutation1[$randomMutation1_1];
    $ValueMutation1_2 = $Mutation1[$randomMutation1_2];

    $Mutation1[$randomMutation1_1] = $ValueMutation1_2;
    $Mutation1[$randomMutation1_2] = $ValueMutation1_1;

//$Mutation1[$randomMutation1]= rand(1,100);

    echo '<tr  align="center" ><td> Mutation 1</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col == $randomMutation1_1) {
            $color = 'bgcolor="#ff3333"';
        } else if ($col == $randomMutation1_2) {
            $color = 'bgcolor="#ff3333"';
        } else {
            $color = 'bgcolor="#ffffff"';
        }
        echo '<td ' . $color . '>' . $Mutation1[$col] . '</td>';
    }
///-------------------------------------------------------------------Mutation2
    $Mutation2 = $childPath2;
    $randomMutation2_1 = rand(0, 5);
    //echo 'randomMutation2 1:' . $randomMutation2_1 . '<br>';
    $randomMutation2_2 = rand(0, 5);

    //  echo 'randomMutation2 2:' . $randomMutation2_2 . '<br>';
    while ($randomMutation2_1 == $randomMutation2_2) {
        $randomMutation2_2 = rand(0, 5);
        //  echo 'randomMutation2 2:' . $randomMutation2_2 . '<br>';
    }
    $ValueMutation2_1 = $Mutation2[$randomMutation2_1];
    $ValueMutation2_2 = $Mutation2[$randomMutation2_2];

    $Mutation2[$randomMutation2_1] = $ValueMutation2_2;
    $Mutation2[$randomMutation2_2] = $ValueMutation2_1;

    echo '<tr  align="center" ><td> Mutation 2</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col == $randomMutation2_1) {
            $color = 'bgcolor="#ff3333"';
        } else if ($col == $randomMutation2_2) {
            $color = 'bgcolor="#ff3333"';
        } else {
            $color = 'bgcolor="#ffffff"';
        }
        echo '<td ' . $color . '>' . $Mutation2[$col] . '</td>';
    }

    echo '</tr></table>';

    echo '<h2><<--------------------- พ่อ แม่ คู่ ที่ 2 และลูก ----------------------->></h2>';
    //echo 'พ่อแรนดอมได้ : ' . $random1 . '<br>';
    echo '<table border="1" align="center" width="1024" text-align="center">';
    echo '<tr  align="center" >';

    if (($FatherName1 == 'p2' || $FatherName1 == 'p3' || $FatherName1 == 'p4') && ($momName1 == 'p2' || $momName1 == 'p3' || $momName1 == 'p4')) {
        $FatherValue2 = $ValueP1;
        $FatherPath2 = $DistancePathP1;
        $FatherName2 = 'p1';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p3' || $FatherName1 == 'p4') && ($momName1 == 'p1' || $momName1 == 'p3' || $momName1 == 'p4')) {
        $FatherValue2 = $ValueP2;
        $FatherPath2 = $DistancePathP2;
        $FatherName2 = 'p2';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p2' || $FatherName1 == 'p4') && ($momName1 == 'p1' || $momName1 == 'p2' || $momName1 == 'p4')) {
        $FatherValue2 = $ValueP3;
        $FatherPath2 = $DistancePathP3;
        $FatherName2 = 'p3';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p2' || $FatherName1 == 'p3') && ($momName1 == 'p1' || $momName1 == 'p2' || $momName1 == 'p3')) {
        $FatherValue2 = $ValueP4;
        $FatherPath2 = $DistancePathP4;
        $FatherName2 = 'p4';
    }
    echo '<td> พ่อ : ' . $FatherName2 . '</td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td bgcolor="#66b5e5">' . $FatherPath2[$col] . '</td>';
    }
    //  echo '</tr></table>';

    //echo '<h2>--------------------- random แม่----------------------- </h2>';
    //echo 'แม่แรนดอมได้ : ' . $random2 . '<br>';
    // echo '<table border="1" align="center" width="1024" text-align="center">';
    echo '<tr  align="center" >';
    if (($FatherName1 == 'p2' || $FatherName1 == 'p3' || $FatherName1 == 'p4') && ($momName1 == 'p2' || $momName1 == 'p3' || $momName1 == 'p4') && ($FatherName2 == 'p2' || $FatherName2 == 'p3' || $FatherName2 == 'p4')) {
        $momValue2 = $ValueP1;
        $momPath2 = $DistancePathP1;
        $momName2 = 'p1';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p3' || $FatherName1 == 'p4') && ($momName1 == 'p1' || $momName1 == 'p3' || $momName1 == 'p4') && ($FatherName2 == 'p1' || $FatherName2 == 'p3' || $FatherName2 == 'p4')) {
        $momrValue2 = $ValueP2;
        $momPath2 = $DistancePathP2;
        $momName2 = 'p2';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p2' || $FatherName1 == 'p4') && ($momName1 == 'p1' || $momName1 == 'p2' || $momName1 == 'p4') && ($FatherName2 == 'p1' || $FatherName2 == 'p2' || $FatherName2 == 'p4')) {
        $momValue2 = $ValueP3;
        $momPath2 = $DistancePathP3;
        $momName2 = 'p3';
    } else if (($FatherName1 == 'p1' || $FatherName1 == 'p2' || $FatherName1 == 'p3') && ($momName1 == 'p1' || $momName1 == 'p2' || $momName1 == 'p3') && ($FatherName2 == 'p1' || $FatherName2 == 'p2' || $FatherName2 == 'p3')) {
        $momValue2 = $ValueP4;
        $momPath2 = $DistancePathP4;
        $momName2 = 'p4';
    }
    echo '<td> แม่ : ' . $momName2 . '</td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td bgcolor="#ea8a9d">' . $momPath2[$col] . '</td>';
    }

    //-------------------------------------------------------ลูกคนที่1
    for ($i = 3; $i < 6; $i++) {
        $childPath3[$i] = $FatherPath2[$i];
    }

    for ($k = 0; $k < 3; $k++) {

        for ($j = 0; $j < 6; $j++) {
            if ($k == 0 && $momPath2[$j] != $childPath3[3] && $momPath2[$j] != $childPath3[4] && $momPath2[$j] != $childPath3[5]) {
                $childPath3[$k] = $momPath2[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath3[$k] != '') {
                    break;
                }
            }
            if ($k == 1 && $momPath2[$j] != $childPath3[0] && $momPath2[$j] != $childPath3[3] && $momPath2[$j] != $childPath3[4] && $momPath2[$j] != $childPath3[5]) {
                $childPath3[$k] = $momPath2[$j];
                //  echo 'J : ' . $j . ' ';
                if ($childPath3[$k] != '') {
                    break;
                }
            }
            if ($k == 2 && $momPath2[$j] != $childPath3[0] && $momPath2[$j] != $childPath3[1] && $momPath2[$j] != $childPath3[3] && $momPath2[$j] != $childPath3[4] && $momPath2[$j] != $childPath3[5]) {
                $childPath3[$k] = $momPath2[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath3[$k] != '') {
                    break;
                }
            }

        }

    }

    echo '<tr  align="center" ><td> ลูกคนที่ 1</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col < 3) {
            $color = 'bgcolor="#ea8a9d"';
        } else if ($col > 2) {
            $color = 'bgcolor="#66b5e5"';
        }
        echo '<td ' . $color . '>' . $childPath3[$col] . '</td>';
    }
//-------------------------------------------------------ลูกคนที่2

    for ($i = 0; $i < 3; $i++) {
        $childPath4[$i] = $momPath2[$i];
    }

    for ($k = 3; $k < 6; $k++) {

        for ($j = 0; $j < 6; $j++) {
            if ($k == 3 && $momPath2[$j] != $childPath4[0] && $momPath2[$j] != $childPath4[1] && $momPath2[$j] != $childPath4[2]) {
                $childPath4[$k] = $momPath2[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath4[$k] != '') {
                    break;
                }
            }
            if ($k == 4 && $momPath2[$j] != $childPath4[0] && $momPath2[$j] != $childPath4[1] && $momPath2[$j] != $childPath4[2] && $momPath2[$j] != $childPath4[3]) {
                $childPath4[$k] = $momPath2[$j];
                //  echo 'J : ' . $j . ' ';
                if ($childPath4[$k] != '') {
                    break;
                }
            }
            if ($k == 5 && $momPath2[$j] != $childPath4[0] && $momPath2[$j] != $childPath4[1] && $momPath2[$j] != $childPath4[2] && $momPath2[$j] != $childPath4[3] && $momPath2[$j] != $childPath4[4]) {
                $childPath4[$k] = $momPath2[$j];
                // echo 'J : ' . $j . ' ';
                if ($childPath4[$k] != '') {
                    break;
                }
            }

        }

    }

    echo '<tr  align="center" ><td> ลูกคนที่ 2</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col < 3) {
            $color = 'bgcolor="#66b5e5"';
        } else if ($col > 2) {
            $color = 'bgcolor="#ea8a9d"';
        }
        echo '<td ' . $color . '>' . $childPath4[$col] . '</td>';
    }
//-------------------------------------------------------------------Mutation1
    $Mutation3 = $childPath3;
    $randomMutation1_1 = rand(0, 5);
//  echo 'randomMutation1 1:' . $randomMutation1_1 . '<br>';
    $randomMutation1_2 = rand(0, 5);

//  echo 'randomMutation1 2:' . $randomMutation1_2 . '<br>';
    while ($randomMutation1_1 == $randomMutation1_2) {
        $randomMutation1_2 = rand(0, 5);
        //   echo 'randomMutation1 2:' . $randomMutation1_2 . '<br>';
    }
    $ValueMutation1_1 = $Mutation3[$randomMutation1_1];
    $ValueMutation1_2 = $Mutation3[$randomMutation1_2];

    $Mutation3[$randomMutation1_1] = $ValueMutation1_2;
    $Mutation3[$randomMutation1_2] = $ValueMutation1_1;

//$Mutation3[$randomMutation1]= rand(1,100);

    echo '<tr  align="center" ><td> Mutation 3</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col == $randomMutation1_1) {
            $color = 'bgcolor="#e52d2d"';
        } else if ($col == $randomMutation1_2) {
            $color = 'bgcolor="#e52d2d"';
        } else {
            $color = 'bgcolor="#ffffff"';
        }
        echo '<td ' . $color . '>' . $Mutation3[$col] . '</td>';
    }
///-------------------------------------------------------------------Mutation2
    $Mutation4 = $childPath4;
    $randomMutation2_1 = rand(0, 5);
//echo 'randomMutation2 1:' . $randomMutation2_1 . '<br>';
    $randomMutation2_2 = rand(0, 5);

//  echo 'randomMutation2 2:' . $randomMutation2_2 . '<br>';
    while ($randomMutation2_1 == $randomMutation2_2) {
        $randomMutation2_2 = rand(0, 5);
        //  echo 'randomMutation2 2:' . $randomMutation2_2 . '<br>';
    }
    $ValueMutation2_1 = $Mutation4[$randomMutation2_1];
    $ValueMutation2_2 = $Mutation4[$randomMutation2_2];

    $Mutation4[$randomMutation2_1] = $ValueMutation2_2;
    $Mutation4[$randomMutation2_2] = $ValueMutation2_1;

    echo '<tr  align="center" ><td> Mutation 4</td>';

    for ($col = 0; $col < 6; $col++) {
        if ($col == $randomMutation2_1) {
            $color = 'bgcolor="#e52d2d"';
        } else if ($col == $randomMutation2_2) {
            $color = 'bgcolor="#e52d2d"';
        } else {
            $color = 'bgcolor="#ffffff"';
        }
        echo '<td ' . $color . '>' . $Mutation4[$col] . '</td>';
    }

    echo '</tr></table>';
    echo '<h2><<--------------------- Generation ----------------------->></h2>';

    echo ' <div class="container-fluid">';
    echo '<div class="container">';
    echo '<div class="row">';

    echo '<div class="col-6" style="background-color:lavender;">'; /////////////////////////////////////////////////col
    echo '<h3>None Ranking</h3>';
    echo '<table border="1" align="center" width="500" text-align="center">';

    for ($row = 0; $row < 4; $row++) {
        echo '<tr  align="center" >';
        echo '<td>P' . ($row + 1) . '</td>';
        for ($col = 0; $col < 6; $col++) {
            if ($row == 0) {
                echo '<td>' . $DistancePathP1[$col] . '</td>';
            } else if ($row == 1) {
                echo '<td>' . $DistancePathP2[$col] . '</td>';
            } else if ($row == 2) {
                echo '<td>' . $DistancePathP3[$col] . '</td>';
            } else if ($row == 3) {
                echo '<td>' . $DistancePathP4[$col] . '</td>';
            }
        }

        if ($row == 0) {
            echo '<td>Fitness : ' . array_sum($ValueP1) . '</td>';
        } else if ($row == 1) {
            echo '<td>Fitness : ' . array_sum($ValueP2) . '</td>';
        } else if ($row == 2) {
            echo '<td>Fitness : ' . array_sum($ValueP3) . '</td>';
        } else if ($row == 3) {
            echo '<td>Fitness : ' . array_sum($ValueP4) . '</td>';
        }

    }
    //-----------------------------------------------------------
    echo '<tr  align="center" >';
    echo '<td>Mutation 1 </td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td>' . $Mutation1[$col] . '</td>';
    }
    $MutationValue1 = array(
        $Distance[$Mutation1[0]][$Mutation1[1]]
        , $Distance[$Mutation1[1]][$Mutation1[2]]
        , $Distance[$Mutation1[2]][$Mutation1[3]]
        , $Distance[$Mutation1[3]][$Mutation1[4]]
        , $Distance[$Mutation1[4]][$Mutation1[5]]
        , $Distance[$Mutation1[5]][$Mutation1[0]],
    );
    echo '<td>Fitness : ' . array_sum($MutationValue1) . '</td></tr>';
    //-----------------------------------------------------------
    echo '<tr align="center"><td>Mutation 2 </td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td>' . $Mutation2[$col] . '</td>';
    }
    $MutationValue2 = array(
        $Distance[$Mutation2[0]][$Mutation2[1]]
        , $Distance[$Mutation2[1]][$Mutation2[2]]
        , $Distance[$Mutation2[2]][$Mutation2[3]]
        , $Distance[$Mutation2[3]][$Mutation2[4]]
        , $Distance[$Mutation2[4]][$Mutation2[5]]
        , $Distance[$Mutation2[5]][$Mutation2[0]],
    );
    echo '<td>Fitness : ' . array_sum($MutationValue2) . '</td></tr>';
    //-----------------------------------------------------------
    echo '<tr align="center"><td>Mutation 3 </td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td>' . $Mutation3[$col] . '</td>';
    }
    $MutationValue3 = array(
        $Distance[$Mutation3[0]][$Mutation3[1]]
        , $Distance[$Mutation3[1]][$Mutation3[2]]
        , $Distance[$Mutation3[2]][$Mutation3[3]]
        , $Distance[$Mutation3[3]][$Mutation3[4]]
        , $Distance[$Mutation3[4]][$Mutation3[5]]
        , $Distance[$Mutation3[5]][$Mutation3[0]],
    );
    echo '<td>Fitness : ' . array_sum($MutationValue3) . '</td></tr>';
    //-----------------------------------------------------------
    echo '<tr align="center"><td>Mutation 4 </td>';
    for ($col = 0; $col < 6; $col++) {
        echo '<td>' . $Mutation4[$col] . '</td>';
    }
    $MutationValue4 = array(
        $Distance[$Mutation4[0]][$Mutation4[1]]
        , $Distance[$Mutation4[1]][$Mutation4[2]]
        , $Distance[$Mutation4[2]][$Mutation4[3]]
        , $Distance[$Mutation4[3]][$Mutation4[4]]
        , $Distance[$Mutation4[4]][$Mutation4[5]]
        , $Distance[$Mutation4[5]][$Mutation4[0]],
    );
    echo '<td>Fitness : ' . array_sum($MutationValue4) . '</td></tr>';
    echo '</table>';

    echo ' </div>';

    echo '<div class="col-6" style="background-color:lavenderblush;"><h3>Ranking</h3>'; /////////////////////////col
    $GenerationRankingValue = array(
        'p1' => array_sum($ValueP1)
        , 'p2' => array_sum($ValueP2)
        , 'p3' => array_sum($ValueP3)
        , 'p4' => array_sum($ValueP4)
        , 'Mutation1' => array_sum($MutationValue1)
        , 'Mutation2' => array_sum($MutationValue2)
        , 'Mutation3' => array_sum($MutationValue3)
        , 'Mutation4' => array_sum($MutationValue4),
    );
    asort($GenerationRankingValue);

    $GenerationRankingPath = array(
        'p1' => $DistancePathP1
        , 'p2' => $DistancePathP2
        , 'p3' => $DistancePathP3
        , 'p4' => $DistancePathP4
        , 'Mutation1' => $Mutation1
        , 'Mutation2' => $Mutation2
        , 'Mutation3' => $Mutation3
        , 'Mutation4' => $Mutation4,
    );
 
    echo '<table border="1" align="center" width="500" text-align="center">';
    //-------------------------------------------------------------------------------------------------------------------------------------------------------
    unset($TopRanking);
    unset($TopRankingPath);

    $Chknum = 1;
    foreach ($GenerationRankingValue as $p => $x_valueV) {
        //echo  $Chknum;
        if ($Chknum == 1) {
            $TopRanking[$p] = $GenerationRankingValue[$p];
            $TopRankingPath[$p] = $GenerationRankingPath[$p];
        } else if ($Chknum == 2) {
            $TopRanking[$p] = $GenerationRankingValue[$p];
            $TopRankingPath[$p] = $GenerationRankingPath[$p];
        } else if ($Chknum == 3) {
            $TopRanking[$p] = $GenerationRankingValue[$p];
            $TopRankingPath[$p] = $GenerationRankingPath[$p];
        } else if ($Chknum == 4) {
            $TopRanking[$p] = $GenerationRankingValue[$p];
            $TopRankingPath[$p] = $GenerationRankingPath[$p];
        }

        echo '<tr  align="center" >';
        echo ' <td > ' . $p . ' </td>';
        if ($p == 'p1') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $DistancePathP1[$i] . '</td>';
            }
        }
        if ($p == 'p2') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $DistancePathP2[$i] . '</td>';
            }
        }
        if ($p == 'p3') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $DistancePathP3[$i] . '</td>';
            }
        }
        if ($p == 'p4') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $DistancePathP4[$i] . '</td>';
            }
        }
        if ($p == 'Mutation1') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $Mutation1[$i] . '</td>';
            }
        }
        if ($p == 'Mutation2') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $Mutation2[$i] . '</td>';
            }
        }
        if ($p == 'Mutation3') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $Mutation3[$i] . '</td>';
            }
        }
        if ($p == 'Mutation4') {
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . $Mutation4[$i] . '</td>';
            }
        }
        echo ' <td > Fitness : ' . $x_valueV . ' </td>';
        echo '</tr>';
        $Chknum++;
    }
    $Chknum = 1;
    echo '</table><br>';
    echo ' </div>';
    echo ' </div>'; //row
    echo ' </div>'; //con
    echo ' </div><br>'; //confull
    echo '</div>'; ///////////////////center
   
    $ChkNewPath = 1;
    foreach ($TopRanking as $p => $x_value) {

        //  echo $p . ' : ' . $x_value . ' | ';
        foreach ($TopRankingPath[$p] as $N => $x_valueV) {
            //echo $x_valueV . ' | ';
            if ($ChkNewPath == 1) {
                $DistancePathP1 = $TopRankingPath[$p];
            } 
            if ($ChkNewPath == 2) {
                $DistancePathP2 = $TopRankingPath[$p];
            } 
            if ($ChkNewPath == 3) {
                $DistancePathP3 = $TopRankingPath[$p];
            } 
            if ($ChkNewPath == 4) {
                $DistancePathP4 = $TopRankingPath[$p];
            }
        }
        // echo '<br>';
        $ChkNewPath++;
    }
    $ChkNewPath = 1;
    //---------------------ทดสอบ ค่า เพี้ยน--------------------------------------------------------------------------
    /*
    for ($i = 0; $i < 6; $i++) {
        echo $DistancePathP1[$i];
    }
    echo '<br>';
    for ($i = 0; $i < 6; $i++) {
        echo $DistancePathP2[$i];
    }
    echo '<br>';
    for ($i = 0; $i < 6; $i++) {
        echo $DistancePathP3[$i];
    }
    echo '<br>';
    for ($i = 0; $i < 6; $i++) {
        echo $DistancePathP4[$i];
    }
    echo '<br>';
*/
    $ValueP1 = array(
        $Distance[$DistancePathP1[0]][$DistancePathP1[1]]
        , $Distance[$DistancePathP1[1]][$DistancePathP1[2]]
        , $Distance[$DistancePathP1[2]][$DistancePathP1[3]]
        , $Distance[$DistancePathP1[3]][$DistancePathP1[4]]
        , $Distance[$DistancePathP1[4]][$DistancePathP1[5]]
        , $Distance[$DistancePathP1[5]][$DistancePathP1[0]],
    );
    $ValueP2 = array(
        $Distance[$DistancePathP2[0]][$DistancePathP2[1]]
        , $Distance[$DistancePathP2[1]][$DistancePathP2[2]]
        , $Distance[$DistancePathP2[2]][$DistancePathP2[3]]
        , $Distance[$DistancePathP2[3]][$DistancePathP2[4]]
        , $Distance[$DistancePathP2[4]][$DistancePathP2[5]]
        , $Distance[$DistancePathP2[5]][$DistancePathP2[0]],
    );
    $ValueP3 = array(
        $Distance[$DistancePathP3[0]][$DistancePathP3[1]]
        , $Distance[$DistancePathP3[1]][$DistancePathP3[2]]
        , $Distance[$DistancePathP3[2]][$DistancePathP3[3]]
        , $Distance[$DistancePathP3[3]][$DistancePathP3[4]]
        , $Distance[$DistancePathP3[4]][$DistancePathP3[5]]
        , $Distance[$DistancePathP3[5]][$DistancePathP3[0]],
    );
    $ValueP4 = array(
        $Distance[$DistancePathP4[0]][$DistancePathP4[1]]
        , $Distance[$DistancePathP4[1]][$DistancePathP4[2]]
        , $Distance[$DistancePathP4[2]][$DistancePathP4[3]]
        , $Distance[$DistancePathP4[3]][$DistancePathP4[4]]
        , $Distance[$DistancePathP4[4]][$DistancePathP4[5]]
        , $Distance[$DistancePathP4[5]][$DistancePathP4[0]],
    );
    echo'<hr><br>';
    $numgen++;
}
}

?>
</body>
</html>