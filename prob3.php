<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Online Store Sales Analyzer</title>
</head>
<body>

    <h1>WEEKLY ONLINE STORE SALES ANALYZER</h1>

    <?php
    $dailySales = [
        "Monday" => 4250,
        "Tuesday" => 5100,
        "Wednesday" => 3900,
        "Thursday" => 6200,
        "Friday" => 5600
    ];

    $totalSales = 0;
    $targetDays = 0;

    echo "<h3>Daily Sales</h3>";

    foreach ($dailySales as $day => $sales) {
        echo $day . ": PHP " . number_format($sales, 2) . "<br>";

        $totalSales = $totalSales + $sales;

        if ($sales >= 5000) {
            $targetDays = $targetDays + 1;
        }
    }

    $numberOfDays = count($dailySales);
    $averageSales = $totalSales / $numberOfDays;

    if ($averageSales >= 5000) {
        $performance = "Excellent";
    } elseif ($averageSales >= 4000) {
        $performance = "Satisfactory";
    } else {
        $performance = "Needs Improvement";
    }

    echo "<h3>Sales Summary</h3>";
    echo "Total Sales: PHP " . number_format($totalSales, 2) . "<br>";
    echo "Average Daily Sales: PHP " . number_format($averageSales, 2) . "<br>";
    echo "Days Meeting Target: " . $targetDays . "<br>";
    echo "Performance: " . $performance;
    ?>

</body>
</html>