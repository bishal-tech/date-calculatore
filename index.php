<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/image/favicon.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Days Calculator</title>

</head>

<body>
    <section class="bg">
        <div class="container">
            <h1 class="text">Count your days from 1600 years to 2099 years</h1>

            <div class="main-container">
                <div class="calculator-box">

                    <h1>Days Calculator</h1>
                    <small>Your results are at your fingertips within seconds</small> <br>
                    <form class="cl-form" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                        <br>


                        <label for="">Day</label>
                        <input type="number" placeholder="Day" min="1" max="31" name="day" required>



                        <label for="">Months</label>
                        <input type="number" placeholder="Month" min="1" max="12" name="month" required>



                        <label for="">Year</label>
                        <input type="number" placeholder="Year" min="1600" max="2100" name="year" required>



                        <br>
                        <input type="submit" name="submit" value="Calculate" class="btn btn-primary">
                    </form>
                    <?php
                    $day = array("0" => "Saturday", "1" => "Sunday", "2" => "Monday", "3" => "Tuesday", "4" => "Wednesday", "5" => "Thursday", "6" => "Friday");
                    $index = 6;

                    $month = array("1" => "1", "2" => "4", "3" => "4", "4" => "0", "5" => "2", "6" => "5", "7" => "0", "8" => "3", "9" => "6", "10" => "1", "11" => "4", "12" => "6");
                    $index1 = 6;


                    //!Here is Calculation code.....

                    if (isset($_POST["submit"])) {
                        $daynumber = $_POST['day'];
                        $monthnumber = $_POST['month'];
                        $year = $_POST['year'];

                        //! Yearly Code....

                        if ($year >= 1600 && $year <= 1699) {
                            $yearcode = 6;
                        } elseif ($year >= 1700 && $year <= 1799) {
                            $yearcode = 4;
                        } elseif ($year >= 1800 && $year <= 1899) {
                            $yearcode = 2;
                        } elseif ($year >= 1900 && $year <= 1999) {
                            $yearcode = 0;
                        } elseif ($year >= 2000 && $year <= 2099) {
                            $yearcode = 6;
                        } else {
                            echo "Please Enter A Valid Year";
                        }
                        //! Month Code ....
                        if ($monthnumber >= 0 && $monthnumber <= 1) {
                            if ($yearcode = 6) {
                                $monthcode = 0;
                            } else {
                                $monthcode = 1;
                            }
                        } elseif ($monthnumber >= 1 && $monthnumber <= 2) {
                            if ($yearcode = 6) {
                                $monthcode = 3;
                            } else {
                                $monthcode = 4;
                            }
                        } elseif ($monthnumber >= 2 && $monthnumber <= 3) {
                            $monthcode = 4;
                        } elseif ($monthnumber >= 3 && $monthnumber <= 4) {
                            $monthcode = 0;
                        } elseif ($monthnumber >= 4 && $monthnumber <= 5) {
                            $monthcode = 2;
                        } elseif ($monthnumber >= 5 && $monthnumber <= 6) {
                            $monthcode = 5;
                        } elseif ($monthnumber >= 6 && $monthnumber <= 7) {
                            $monthcode = 0;
                        } elseif ($monthnumber >= 7 && $monthnumber <= 8) {
                            $monthcode = 3;
                        } elseif ($monthnumber >= 8 && $monthnumber <= 9) {
                            $monthcode = 6;
                        } elseif ($monthnumber >= 9 && $monthnumber <= 10) {
                            $monthcode = 1;
                        } elseif ($monthnumber >= 10 && $monthnumber <= 11) {
                            $monthcode = 4;
                        } elseif ($monthnumber >= 11 && $monthnumber <= 12) {
                            $monthcode = 6;
                        } else {
                            echo "Please Enter A Valid Month";
                        }


                        //! Day Code... 
                        $day = array("0" => "Saturday", "1" => "Sunday", "2" => "Monday", "3" => "Tuesday", "4" => "Wednesday", "5" => "Thursday", "6" => "Friday");

                        //! Last Two Digit of Year ...

                        $yearresult = str_split($year, 2);
                        $yr  = $yearresult[1];

                        //! Division By Leapyear...

                        $leapyear = 4;
                        $intdiv = intdiv($yr, $leapyear);
                        $daycode = $daynumber + $monthcode + $yearcode + $yr + $intdiv;
                        $totaldays = 7;
                        $result = $daycode - $totaldays * $intdiv;
                        $subsday = intdiv($daycode, $totaldays);
                        $finalresult = $daycode - $totaldays * $subsday;

                        //    echo "<pre>";
                        //   print_r();
                        //    echo "</pre>";
                    ?>
                        <h2>Result: <?php echo $daynumber . "/" . $monthnumber . "/" . $year . "   ::   " . $day[$finalresult]; ?></h2>
                    <?php
                    } else {
                    }
                    ?>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>