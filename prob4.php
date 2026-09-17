<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Decision Analyzer</title>
</head>
<body>

    <h1>SCHOLARSHIP DECISION ANALYZER</h1>

    <form method="POST" action="">
        <label>Applicant Name:</label>
        <input type="text" name="applicantName">
        <br><br>

        <label>Quiz:</label>
        <input type="number" name="quiz">
        <br><br>

        <label>Activity:</label>
        <input type="number" name="activity">
        <br><br>

        <label>Examination:</label>
        <input type="number" name="examination">
        <br><br>

        <label>Attendance:</label>
        <input type="number" name="attendance">
        <br><br>

        <label>Enrollment Status:</label>
        <select name="enrollmentStatus">
            <option value="">Select</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <br><br>

        <label>Disciplinary Case:</label>
        <select name="disciplinaryCase">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>

        <input type="submit" name="submit" value="Analyze Scholarship">
    </form>

    <?php
    if (isset($_POST["submit"])) {

        $applicantName = $_POST["applicantName"];
        $attendance = $_POST["attendance"];
        $enrollmentStatus = $_POST["enrollmentStatus"];
        $disciplinaryCase = $_POST["disciplinaryCase"];

        $grades = [
            "Quiz" => $_POST["quiz"],
            "Activity" => $_POST["activity"],
            "Examination" => $_POST["examination"]
        ];

        /*
         * STEP 1: Check if required fields are blank
         */
        if (
            empty($applicantName) ||
            empty($grades["Quiz"]) ||
            empty($grades["Activity"]) ||
            empty($grades["Examination"]) ||
            empty($attendance) ||
            empty($enrollmentStatus) ||
            empty($disciplinaryCase)
        ) {

            echo "<p>Please complete all required fields.</p>";

        } else {

            /*
             * STEP 2: Validate grades using foreach
             */
            $invalidInput = false;
            $totalGrades = 0;

            foreach ($grades as $subject => $grade) {

                if ($grade < 0 || $grade > 100) {
                    $invalidInput = true;
                }

                $totalGrades = $totalGrades + $grade;
            }

            if ($attendance < 0 || $attendance > 100) {
                $invalidInput = true;
            }

            if ($invalidInput) {

                echo "<p>Invalid grade or attendance value.</p>";

            } else {

                /*
                 * Calculate average after valid input
                 */
                $average = $totalGrades / count($grades);

                /*
                 * Display applicant information
                 */
                echo "<h3>Applicant Information</h3>";
                echo "Applicant Name: " . $applicantName . "<br>";

                foreach ($grades as $subject => $grade) {
                    echo $subject . ": " . $grade . "<br>";
                }

                echo "Average: " . number_format($average, 2) . "<br>";
                echo "Attendance: " . $attendance . "%<br>";
                echo "Enrollment Status: " . $enrollmentStatus . "<br>";
                echo "Disciplinary Case: " . $disciplinaryCase . "<br>";

                /*
                 * Scholarship Decision
                 */
                echo "<h3>Final Decision</h3>";

                if ($enrollmentStatus == "Inactive") {

                    echo "Not qualified: Applicant is inactive.";

                } elseif ($disciplinaryCase == "Yes") {

                    echo "Not qualified: Disciplinary case found.";

                } elseif ($attendance < 80) {

                    echo "Not qualified: Attendance requirement not met.";

                } elseif ($average >= 90) {

                    echo "Qualified: Full scholarship.";

                } elseif ($average >= 85 && $average < 90) {

                    echo "Qualified: Partial scholarship.";

                } else {

                    echo "Not qualified: Academic requirement not met.";
                }
            }
        }
    }
    ?>

</body>
</html>