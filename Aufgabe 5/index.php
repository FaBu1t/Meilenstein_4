<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://bootswatch.com/5/slate/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <title>Hello, world!</title>
  <?php
    $timestamp;
    
    $entriesPerRow=8;
    $headEntries =["Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag","Sonntag"];

    $currentYear = 2021;


    $monthLength[0]=31; // Januar
    $monthLength[1]=31;
    $monthLength[2]=31;
    $monthLength[3]=31;
    $monthLength[4]=31;
    $monthLength[5]=31;
    $monthLength[6]=31;
    $monthLength[7]=31;
    $monthLength[8]=31;
    $monthLength[9]=31;
    $monthLength[10]=31;
    $monthLength[11]=31;
    $monthLength[12]=31;
  ?>


</head>

<?php
function createCalender()
{   
    //currentMonth();

    global $timestamp;
    global $headEntries;
    $day= date('d',$timestamp);
    $week= date('W',$timestamp);
    $month= date('m',$timestamp);
    $index=1-$day;

    echo "<thead>";
    echo "<th scope=\"col\">Nr.:</th>";
    foreach($headEntries as $d){
        echo "<th scope=\"col\">".$d."</th>";
    }
    echo "</thead>";
    echo "<tbody>";

    echo "<tr>";
        
    $Weekday=date('l',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)));
    echo "<td>".date('W',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
    
    switch ($Weekday){
        case "Monday": 
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Tuesday":
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Wednesday":
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Thursday":
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Friday":
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Saturday":
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
        case "Sunday":
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            break;
    }


    $index++;
    $prevweek=date('W',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)));

    while(date('m',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))==$month){

        if(date('W',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))!==$prevweek){
            echo "</tr>";
            echo "<tr>";
            echo "<td>".date('W',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
            $prevweek=date('W',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)));
        }
        
        
        
        if(mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp))===mktime(0,0,0, date("m"),date("d"),date("Y"))){
            echo "<td style='background-color:#FF0000'><b>".date('d',mktime(0,0,0, date("m"),date("d")+$index,date("Y")))."</b></td>";
        }else{
            echo "<td>".date('d',mktime(0,0,0, date("m",$timestamp),date("d",$timestamp)+$index,date("Y",$timestamp)))."</td>";
        }
        
        $index++;
    }
    echo "</tbody>";


}

function currentMonth(){
    global $timestamp;
    $timestamp=mktime(0,0,0, date("m"),date("d"),date("Y"));
}

// https://www.webmasterpro.de/coding/article/einfacher-php-kalender.html
function monthBack(){
    global $timestamp;
    $timestamp= mktime(0,0,0, date("m",$timestamp)-1,date("d",$timestamp),date("Y",$timestamp) );
}
function yearBack(){
    global $timestamp;
    $timestamp= mktime(0,0,0, date("m",$timestamp),date("d",$timestamp),date("Y",$timestamp)-1 );
}
function monthForward(){
    global $timestamp;
    $timestamp= mktime(0,0,0, date("m",$timestamp)+1,date("d",$timestamp),date("Y",$timestamp) );
}
function yearForward(){
    global $timestamp;
    $timestamp= mktime(0,0,0, date("m",$timestamp),date("d",$timestamp),date("Y",$timestamp)+1 );
}


if( isset($_GET['lastMonth'])){
    
    monthBack();
    //createCalender();
}
if( isset($_GET['curMonth'])){
    
    currentMonth();
    //createCalender();
}
if( isset($_GET['lastYear'])){
    
    yearBack();
    //createCalender();
}
if( isset($_GET['nextMonth'])){
    
    monthForward();
    //createCalender();
}
if( isset($_GET['nextYear'])){
    
    yearForward();
    //createCalender();
}

?>

<body>

<div class="container" style="margin-top: 25px;">
    <div class="row"> 
    <div class="col-2">
        <form method="get">
    <button type="submit" value="curMonth" name="curMonth" class="btn btn-primary">Aktueller Monat</button>
    <button type="submit" value="lastMonth" name="lastMonth" class="btn btn-primary">vorh. Monat</button>
    <button type="submit" value="lastYear" name="lastYear"class="btn btn-primary">vorh. Jahr</button>
    <button type="submit" value="nextMonth" name="lastMonth"class="btn btn-primary">nächster Monat</button>
    <button type="submit" value="nextYear" name="nextYear"class="btn btn-primary">nächstes Jahr</button>
    </form>
    </div>
    <div class="col-10">
    
    <table class="table table-striped" >
      <?php
      createCalender();
      ?>
    </table>
  </div>
  </div>

</body>

</html>