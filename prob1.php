<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Printing Cost</title>
</head>
<body>

    <h1>CAMPUS PRINTING COST</h1>

    <?php
    $studentName = "Ana Reyes";
    $numberOfPages = 12;
    $printingType = "Color=";

    if ($printingType == "Black and White") {
        $rate = 2.00;
    } else {
        $rate = 5.00;
    }

    $totalCost = $numberOfPages * $rate;

    echo "Student: " . $studentName . "<br>";
    echo "Printing Type: " . $printingType . "<br>";
    echo "Number of Pages: " . $numberOfPages . "<br>";
    echo "Rate per Page: PHP " . number_format($rate, 2) . "<br>";
    echo "Total Cost: PHP " . number_format($totalCost, 2);
    ?>

</body>
</html>