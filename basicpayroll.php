<!DOCTYPE html>
<html>
<head>
    <title>Template in PHP</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
        }
        table {
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
        }
        .right { text-align: right; width: 150px; }
        .left { text-align: left; width: 150px; }
    </style>
</head>
<body>

<form method="POST">
    <table>
        <thead>
            <tr>
                <th colspan="2" style="font-size: 24px; height: 100px;">Basic Payroll</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="rate">Enter the hourly rate of pay:</label></td>
                <td><input type="number" required id="rate" name="rate" placeholder="Hourly Rate" style="text-align: center;"></td>
            </tr>
            <tr>
                <td><label for="hours">Number of hours worked:</label></td>
                <td><input type="number" required id="hours" name="hours" placeholder="Hours Worked" style="text-align: center;"></td>
            </tr>
        </tbody>
          </table> <br>
        <tfoot>
            <tr>
                <th colspan="2"><input type="submit" value="CALCULATE"></th>
            </tr>
        </tfoot>
  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rate"], $_POST["hours"])) {
    $rate = floatval($_POST["rate"]);
    $hours = floatval($_POST["hours"]);
    
      if ($hours < 40){
                 $bpay = $rate * $hours;
            } else {
                $bpay = $rate * 40;
            }

    if($hours > 40)
            {
                $ot = ($hours - 40) * ($rate * 1.5);
            }else {
                $ot = 0;
            } 
    $gpay = $bpay + $ot;

        if($gpay <= 10000) {
                $deduct = 0;
            }else {
                $deduct = $gpay * .10;
            }
    $netpay = $gpay - $deduct;
?>



<br>
<table>
    <thead>
        <tr>
            <th colspan="2" style="font-size: 24px" height="80px">Payslip</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="left">Hours worked</td>
            <td class="right"><?= $hours ?></td>
        </tr>
        <tr>
            <td class="left">Pay Rate</td>
            <td class="right"><?= number_format($rate, 2) ?></td>
        </tr>
        <tr>
            <td class="left">Basic Pay</td>
            <td class="right"><?= number_format($bpay, 2) ?></td>
        </tr>
        <tr>
            <td class="left">OT Pay</td>
            <td class="right"><?= number_format($ot, 2) ?></td>
        </tr>
        <tr>
            <td class="left">Gross Pay</td>
            <td class="right"><?= number_format($gpay, 2) ?></td>
        </tr>
        <tr>
            <td class="left">Deductions</td>
            <td class="right"><?= number_format($deduct, 2) ?></td>
        </tr>
        <tr>
            <td class="left">Net Pay</td>
            <td class="right"><?= number_format($netpay, 2) ?></td>
        </tr>
    </tbody>
</table>

<?php } ?>

</body>
</html>
