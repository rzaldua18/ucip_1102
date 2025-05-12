<html>
    <head>
        <?php ?>
        <title>Sales Invoice</title>
        <style type="text/css">
            body{
                font-family:Verdana, Ganeva, Tahoma, sans-serif;
                font-size: 20;
            }
        </style>
    </head>
    <body>
        <h1>SALES INVOICE </h1>
        <?php
            //declare variables
            $fname = "RALF JAYRALD ZALDUA";
            $address = "654 WOODLANDS RING ROAD SINGAPORE";
            $contact = "+65 91990434";

            $q1 ="5";

            //customer information
            echo "<br><h2>CUSTOMER INFORMATION</h2>";
            echo "FULL NAME: $fname <br>" ;
            echo "ADDRESS: $address <br>" ;
            echo "CONTACT DETAILS: $contact <br>";

           
           
        ?>

        <?php

            //declare variable for table

            $quantity1 = "5";
            $quantity2 = "9";
            $description1 = "SHORT BOND PAPERS";
            $description2 = "PENCILS";

            define("UNIT_SELLING_PRICE1", 275.89);
            define('UNIT_SELLING_PRICE2', 95.5);

            $totalsales1 = UNIT_SELLING_PRICE1 * $quantity1;
            $totalsales2 = UNIT_SELLING_PRICE2 * $quantity2;

            //create table header
            echo "<br><table border='1' cellpadding='5'>"; 
            echo "<tr style='text-align:center;'>
                <th>QUANTITY OF ITEM SOLD</th>
                <th>DESCRIPTION OF ITEM SOLD</th>
                <th>UNIT SELLING PRICE</th>
                <th>TOTAL SALES PER ITEM</th>
                </tr>";
            //first row data cell
            echo "<tr style='text-align:center;'>
                <td>$quantity1</td>
                <td>$description1</td>
                <td>". UNIT_SELLING_PRICE1 ."</td>
                <td>$totalsales1</td>
                </tr>";
            //second row data cell
             echo "<tr style='text-align:center;'>
                <td>$quantity2</td>
                <td>$description2</td>
                <td>". UNIT_SELLING_PRICE2 ."</td>
                <td>$totalsales2</td>
                </tr>";

echo "</table>";   

        ?>

            <?php

            //declare values
            //VATABLE SALES
            $vatablesales1 = $totalsales1 /1.12;
            $vatablesales2 = $totalsales2 /1.12;
            //VAT AMOUNT
            $vatamount1 = $vatablesales1 * 0.12;
            $vatamount2 = $vatablesales2 * 0.12;
            //TOTAL SALES VAT INCLUSIVE
            $totalsalesvat1 = $vatablesales1 + $vatamount1;
            $totalsalesvat2 = $vatablesales2 + $vatamount2;
            //LESS VAT
            $lessvat1 = $vatablesales1 * 0.12;
            $lessvat2 = $vatablesales2 * 0.12;
            //NET VAT AMOUNT
            $netvat1 = $totalsalesvat1 / 1.12;
            $netvat2 = $totalsalesvat2 / 1.12;
            //LESS: SC/PWD DISCOUNT
            $discount1 = $netvat1 * 0.2;
            $discount2 = $netvat2 * 0.2;
            //LESS WITHOLDING TAX
            $lesstax1 = $vatablesales1 * 0.02;
            $lesstax2 = $vatablesales2 * 0.02;
            //TOTAL AMOUNT DUE
            $totalamount1 = $netvat1 - $discount1 - $lesstax1;
            $totalamount2 = $netvat2 - $discount2 - $lesstax2;

        echo "<style>
                th {
                text-align: left;
                }
                td {
                text-align: center;
                }
            </style>";

                echo "<br><table border='1' cellpadding = '5'>";
                echo "<tr>
                    <th>TOTAL SALES VAT INCLUSIVE</th>
                    <td>".number_format($totalsalesvat1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>TOTAL SALES VAT INCLUSIVE</th>
                    <td>".number_format($totalsalesvat2,2)."</td>
                    </tr>";   

                echo "<tr>
                    <th>LESS VAT </th>
                    <td>".number_format($lessvat1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>LESS VAT </th>
                    <td>".number_format($lessvat2,2)."</td>
                    </tr>";

                echo "<tr>
                    <th>NET VAT AMOUNT </th>
                    <td>".number_format($netvat1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>NET VAT AMOUNT </th>
                    <td>".number_format($netvat2,2)."</td>
                    </tr>";
                
                echo "<tr>
                    <th style='color:red;'>LESS: SC/PWD DISCOUNT </th>
                    <td>".number_format($discount1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style='color:red;'>LESS: SC/PWD DISCOUNT </th>
                    <td>".number_format($discount2,2)."</td>
                    </tr>";

                echo "<tr>
                    <th style='color:red;'>LESS WITHOLDING TAX </th>
                    <td>".number_format($lesstax1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style='color:red;'>LESS WITHOLDING TAX </th>
                    <td>".number_format($lesstax2,2)."</td>
                    </tr>";

                echo "<tr>
                    <th>ADD VAT </th>
                    <td></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>ADD VAT </th>
                    <td></td>
                    </tr>";
                
                echo "<tr>
                    <th style ='background-color:gray;'>AMOUNT DUE</th>
                    <td style ='background-color:gray;'></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style ='background-color:gray;'>AMOUNT DUE</th>
                    <td style ='background-color:gray;'></td>
                </tr>";

                echo "<tr>
                    <th style ='color:red;'>VATABLE SALES </th>
                    <td>".number_format($vatablesales1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style ='color:red;'>VATABLE SALES </th>
                    <td>".number_format($vatablesales2,2)."</td>
                </tr>";

                echo "<tr>
                    <th>VAT EXEMPT SALES </th>
                    <td></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>VAT EXEMPT SALES </th>
                    <td></td>
                </tr>";

                echo "<tr>
                    <th>ZERO RATED SALES</th>
                    <td></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th>ZERO RATED SALES</th>
                    <td></td>
                </tr>";
                 
                echo "<tr>
                    <th style='color:red;'>VAT AMOUNT</th>
                    <td>".number_format($vatamount1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style='color:red;'>VAT AMOUNT</th>
                    <td>".number_format($vatamount2,2)."</td>
                </tr>";

                echo "<tr>
                    <th style='background-color:green;'>TOTAL AMOUNT DUE</th>
                    <td style='background-color:green;'>".number_format($totalamount1,2)."</td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    <th style='background-color:green;'>TOTAL AMOUNT DUE</th>
                    <td style='background-color:green;'>".number_format($totalamount2,2)."</td>
                </tr>";

echo "</table>";   

        ?>
    </body>
</html>