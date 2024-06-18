<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?php
            echo "BMI Calculator";
        ?>
    </title>
</head>

<body>
    <?php
        // Assign user input to $length
        !empty(($_POST["length"])) ? $length = ($_POST["length"]) : $length = null;

        // Calculate BMI
        function calculateBMI($length, $weight) {
            return round(($weight / ($length * $length)), 2);
        }

        // Set message
        function setMessage($bmi) {
            switch ($bmi)
            {
                case ($bmi < 18.5):
                    return "ondergewicht";
                case ($bmi >= 18.5 && $bmi < 25):
                    return "gezond gewicht";
                case ($bmi >= 25 && $bmi <= 30);
                    return "overgewicht";
                case ($bmi > 30):
                    return "ernstig overgewicht";
                default:
                    return "niet bekend";
            }
        }
        
        // Input form
        $input_form = <<<_END
            <form method="post" action="index.php">
                <label for="length">
                    Wat is je lengte (in meters)?
                </label>
                <br /><br />
                <input type="number" step="0.01" name="length" id="length" />
                <br /><br />
                <input type="submit" />
            </form>
        _END;

        // Output
        $output_contents = "";

        if ($length) {
            for ($i = 40; $i <= 150; $i +=10) {
                $bmi = calculateBMI($length, $i);
                $message = setMessage($bmi);
                $output_contents .= "Bij een gewicht van $i kg is de BMI $bmi, $message. <br />";
            }
        }

        $output = <<<_END
            <article>
                <header>
                    <hgroup>
                        <h1>BMI Calculator</h1>
                        <p>BMI overzicht bij een lengte van $length m:</p>
                    </hgroup>
                </header>
                <hr />
                <p>
                    $output_contents
                </p>
            </article>
        _END;

        // Display input form
        echo $input_form;

        // Display output
        if ($length) {
            echo $output;
        }
    ?>
</body>

</html>