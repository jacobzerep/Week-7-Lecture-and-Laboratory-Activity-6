<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment Checker</title>
</head>
<body>

    <h1>COURSE ENROLLMENT CHECKER</h1>

    <form method="POST" action="">
        <label>Student Name:</label>
        <input type="text" name="studentName">
        <br><br>

        <label>Age:</label>
        <input type="number" name="age">
        <br><br>

        <label>Final Grade:</label>
        <input type="number" name="finalGrade">
        <br><br>

        <label>Prerequisite Completed:</label>
        <select name="prerequisite">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>

        <label>Enrollment Status:</label>
        <select name="enrollmentStatus">
            <option value="">Select</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <br><br>

        <input type="submit" name="submit" value="Check Eligibility">
    </form>

    <?php
    if (isset($_POST["submit"])) {

        $studentName = $_POST["studentName"];
        $age = $_POST["age"];
        $finalGrade = $_POST["finalGrade"];
        $prerequisite = $_POST["prerequisite"];
        $enrollmentStatus = $_POST["enrollmentStatus"];

        if (
            empty($studentName) ||
            empty($age) ||
            empty($finalGrade) ||
            empty($prerequisite) ||
            empty($enrollmentStatus)
        ) {

            echo "<p>Please complete all required fields.</p>";

        } elseif (
            $age < 16 ||
            $age > 100 ||
            $finalGrade < 0 ||
            $finalGrade > 100
        ) {

            echo "<p>Invalid numeric input.</p>";

        } elseif ($prerequisite == "No") {

            echo "<p>Not eligible: Prerequisite not completed.</p>";

        } elseif ($enrollmentStatus == "Inactive") {

            echo "<p>Not eligible: Student is inactive.</p>";

        } elseif ($finalGrade < 80) {

            echo "<p>Not eligible: Grade requirement not met.</p>";

        } else {

            echo "<p>Eligible for enrollment.</p>";
        }

        if (
            !empty($studentName) &&
            !empty($age) &&
            !empty($finalGrade) &&
            !empty($prerequisite) &&
            !empty($enrollmentStatus) &&
            $age >= 16 &&
            $age <= 100 &&
            $finalGrade >= 0 &&
            $finalGrade <= 100
        ) {
            echo "<h3>Entered Student Information</h3>";
            echo "Student: " . $studentName . "<br>";
            echo "Age: " . $age . "<br>";
            echo "Final Grade: " . $finalGrade . "<br>";
            echo "Prerequisite Completed: " . $prerequisite . "<br>";
            echo "Enrollment Status: " . $enrollmentStatus . "<br>";
        }
    }
    ?>

</body>
</html>