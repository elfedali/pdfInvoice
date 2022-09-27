<?php

require 'vendor/autoload.php';

use App\Controller\wo;

$wo = new wo();

//$html_file_path = __DIR__ . '/index2.html';
$total = 0;
$products = $_POST['products'];

//  Generate PDF from HTML
$html  = '<html>
<head>
  <style>
        body {
            font-family: sans-serif;
        }

        .fw-normal {
            font-weight: 400;
        }

        .fw-bold {
            font-weight: 700;
        }

        .sep {
            height: 16px;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-md {
            font-size: 1.125rem;
        }

        .text-lg {
            font-size: 1.5rem;
        }

        .text-xl {
            font-size: 2rem;
        }

        .text-2xl {
            font-size: 2.5rem;
        }

        .img-logo {
            width: 100px;
            height: auto;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .w-100 {
            width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;


        }

        .table td {
            border: 1px solid #ddd;
            padding: 5px;


        }

        .table th {
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #f2f2f2;
        }

        .bg-gray-100 {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- <img class="img-logo" src="https://weboven.ma/images/favicon.png" alt=""> -->
    <h1 class="text-2xl">Invoice</h1>
    <p>' . $_POST['name'] . '</p>
    <p>
        <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a>
    </p>
    <div class="sep"></div>

    <table class="w-100">
        <tr>
            <td>
                <h3>Bill to:</h3>
                <p>' . $_POST['name_client'] . '</p>
               
                <p>
                    <a href="mailto:' . $_POST['email_client'] . '">' . $_POST['email_client'] . '</a>
                </p>
            </td>

            <td>
                <div class="float-right">
                    <h3>Invoice: ' . $_POST['invoice_id'] . '</h3>
                    <p>Invoice Date: ' . $_POST['invoice_date'] . '</p>
                    <p>Due Date: ' . $_POST['invoice_due_date'] . '</p>
                </div>
            </td>

        </tr>

    </table>
    <div class="sep"></div>
    <!-- table  of bill -->
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                 <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        ';

// loop on items
foreach ($_POST['products'] as $item) {
    $sub_total = $item['price'] * $item['quantity'];
    $html .= '<tr>
                <td>' . $item['name'] . '</td>
                <td>' . $item['quantity'] . '</td>
                <td>' . $item['price'] . '</td>
                <td>' .  $sub_total . '</td>
            </tr>';
    $total += $item['price'] * $item['quantity'];
}

$html .= '<!-- total td -->
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td class="bg-gray-100"><b>' . $total . '</b></td>
            </tr>
        </tbody>

    </table>
    <div class="sep"></div>
    <div class="sep"></div>
    <p align="center">
        <small>
             Thanks, we are happy to work with you.<br>
            <a href="https://weboven.ma">weboven.ma</a>
            
        </small>
    </p>

</body>

</html>
';

//var_dump($html);

$wo->html2pdf($html);