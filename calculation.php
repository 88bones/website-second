<!DOCTYPE html>
<html>

<head>
    <title>EMI Calculator</title>
    <link rel="stylesheet" href="calculation.css?v=<?php echo time(); ?> ">

</head>

<body>
    <?php

    session_start();
    include 'menu.php';
    ?>
    <div class="container">
        <h1 align="center">EMI Calculator</h1>
        <form id="emi" name="emi" method="post" action="">
            <table>
                <tr>
                    <td>Down Payment: </td>
                    <td>&#8377; <input type="number" name="down_payment" min="0" required></td>
                </tr>
                <tr>
                    <td>Interest Rate (%): </td>
                    <td>
                        <input type="range" name="interest_rate" min="0" max="15" step="0.1" value="10">
                        <span id="interest_rate_value">10</span>%
                    </td>
                </tr>
                <tr>
                    <td>Loan Period (Months): </td>
                    <td>
                        <input type="number" name="loan_period" min="1" required>
                    </td>
                </tr>
                <div class="calc-btn">

                    <tr>
                        <td><input id="calc-btn" type="submit" name="calculate" value="Calculate"></td>
                </div>
                </tr>
            </table>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $on_road_price = 0; // Replace with logic to get on-road price based on brand, model, variant (API/database lookup)
            $down_payment = $_POST["down_payment"];
            $interest_rate = $_POST["interest_rate"] / 100; // Convert to decimal
            $loan_period = $_POST["loan_period"];

            // Calculate total loan amount
            $total_loan_amount = abs($on_road_price - $down_payment);

            // Calculate EMI using the EMI formula
            $monthly_interest_rate = $interest_rate / 12;
            $emi = abs(($total_loan_amount * $monthly_interest_rate * (1 + $monthly_interest_rate) ** $loan_period) / ((1 + $monthly_interest_rate) ** $loan_period - 1));

            // Calculate payable amount and extra amount paid
            $payable_amount = $emi * $loan_period;
            $extra_amount_paid = abs($payable_amount - $total_loan_amount);

            echo "<h2>Results:</h2>";
            echo "<table cellspacing = 1>";
            //echo "<tr><td>On-road Price: </td><td>&#8377; $on_road_price</td></tr>";
            echo "<tr><td>Total Loan Amount </td><td>&#8377;" . number_format($total_loan_amount, 2) . "</td></tr>";
            echo "<tr><td>Payable Amount </td><td>&#8377;" . number_format($payable_amount, 2) . "</td></tr>";
            echo "<tr><td>Extra Interest Paid </td><td>&#8377;" . number_format($extra_amount_paid, 2) . "</td></tr>";
            echo "<tr><td>EMI per Month </td><td>&#8377;" . number_format($emi, 2) . "</td></tr>";
            echo "</table>";
        }
        ?>
    </div>

    <script>
        document.querySelector("input[name='interest_rate']").addEventListener('input', function() {
            document.getElementById('interest_rate_value').textContent = this.value;
        });
    </script>

</body>

</html>