<?php
session_start();

$result = NULL;

//If activated once form is submited
if( isset($_GET['temp1']) && isset($_GET['temp2']) && isset($_GET['number1'])  ){

    //Setting variables to temperature 1 CONVERT FROM
    $temp1 = $_GET['temp1'];
    $number1 = $_GET['number1'];

    //Setting variables to temperature 2 CONVERT TO
    $temp2 = $_GET['temp2'];

    //for Celcius
    if($temp1 == 'celcius'){
        if($temp2 == 'celcius'){
            // C to C
            $result = $number1;
            $_SESSION['result'] = $number1;
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'fahrenheit'){
            // C to F
            $result = ($number1 * 9/5) + 32;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'kelvin'){
            // C to K
            $result = $number1 + 273.15;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");
        }

    //for Fahrenheit
    }elseif($temp1 == 'fahrenheit'){
        if($temp2 == 'celcius'){
            // F to C
            $result = ($number1 - 32) * 5/9;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'fahrenheit'){
            // F to F
            $result = $number1;
            $_SESSION['result'] = $result;
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'kelvin'){
            // F to K
            $result = ($number1 - 32) * 5/9 + 273.15;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");
        }

    //for Kelvin
    }elseif($temp1 == 'kelvin'){
        if($temp2 == 'celcius'){
            // K to C
            $result = $number1 - 273.15;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'fahrenheit'){
            // K to F
            $result = ($number1 - 273.15) * 9/5 + 32;
            $_SESSION['result'] = round($result, 2);
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");

        }elseif($temp2 == 'kelvin'){
            // K to K
            $result = $number1;
            $_SESSION['result'] = $result;
            $_SESSION['temp2'] = $temp2;
            header("Location: temp.php");
        }
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Temperature conversion</title>
    <link rel= "stylesheet" type= "text/css" href= "main.css" >
    <style type="text/css">
    .content{
      margin-right: auto; /* 1 */
      margin-left:  auto; /* 1 */

      max-width: 500px; /* 2 */

      padding-right: 10px; /* 3 */
      padding-left:  10px; /* 3 */

    }
    .aside {
        float: right;
        width: 250px;
    }
    .aside-one {
        float: left;
        width: 250px;
    }
    .result{
      padding-top: 20px;
    }
    </style>
</head>
<body>
    <main>
        <div class="content">
        <h1>Temperature Conversion</h1>
        <p>Temperature Conversion Type: </p><br>
        <div class="aside-one">
        <form action ="temp.php" method="get">
            <label><strong> Convert from: </strong></label><br>
            <input type="radio" name="temp1" value="celcius"> Celcius<br>
            <input type="radio" name="temp1" value="fahrenheit"> Fahrenheit<br>
            <input type="radio" name="temp1" value="kelvin"> Kevin <br>
            <input type="number" name="number1" /> <br>
          </div>
            <div class="aside">
            <label><strong> Convert To: </strong></label><br>
            <input type="radio" name="temp2" value="celcius"> Celcius<br>
            <input type="radio" name="temp2" value="fahrenheit"> Fahrenheit<br>
            <input type="radio" name="temp2" value="kelvin"> Kevin <br>
            <input type="submit" value="Convert"><br>
            </div>
        </form>

        <!-- This will only display once the $result variable is set. -->
        <!-- The $result variable will be set once the formhandling is done -->
        <br>
        <br>
        <?php
        if(isset($_SESSION['result'])){
            echo'
            <p class="result">The converion is equal to: '. $_SESSION['result'] .' '. $_SESSION['temp2'] .' </p>
            ';
        }
        ?>

      </div>



    </main>
</body>
</html>
