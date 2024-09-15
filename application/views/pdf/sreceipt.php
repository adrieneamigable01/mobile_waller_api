<?php

    // $item = json_decode($data_value->transaction);
    // foreach ($item as $key => $value) {
    //     # code...
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
/* @page { size: 10cm 15cm; } */
/* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
* {
    margin: 0;
    padding: 0;
    /* font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; */
    box-sizing: border-box;
    /* font-size: 14px; */
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
    
}

.body-wrap {
    background-color: #ffffff;
    width: 100%;
	height:297px;
	font-weight:bold;
}

.container {
    display: block !important;
    max-width: 100% !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    max-width: 100% !important;
    display: block;
    padding: 0px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    /* border: 1px solid #e9e9e9; */
    border-radius: 3px;
}

.content-wrap {
    padding: 0px;
}

.content-block {
    padding: 0 0 4px;
}

.header {
    width: 100%;
    margin-bottom: 4px;
}

.footer {
    width: 100%;
    clear: both;
    color: #000000;
    padding: 4px;
    /* font-size:8px !important; */
    position:absolute;
    bottom:0;
}
.footer a {
    color: #000000;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    /* font-size:8px; */
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    /* font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; */
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    /* font-size: 8px !important; */
    font-weight: 500;
}

h2 {
    font-size: 10px !important;
}

h3 {
    font-size: 10px !important;
}

h4 {
    font-size: 10px !important;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 4px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 4px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 4px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 2px auto;
    text-align: left;
    width: 100%;
}
.invoice td {
    padding: 3px !important;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: .5px solid #333;
    border-bottom: .5px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 4px !important;
    }

    h1 {
        font-size: 6px !important;
    }

    h2 {
        font-size: 6px !important;
    }

    h3 {
        font-size: 6px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        /* padding: 1px !important; */
    }

    .invoice {
        width: 100% !important;
    }
}
<?php
    function numberFormat($number){
        $formatted =  number_format($number,2,".",",");
        return $formatted;
    }
    function numberFormatWithSign($number){
        $formatted =  number_format($number,2,".",",");
        return "Php. ".$formatted;
    }
    function acn($product){
        switch ($product) {
            case 'SALARY PRINCIPAL + INTEREST':
                return 'SP+I';
                break;
            case 'SALARY INTEREST ONLY':
                return 'SIO';
                break;
            case 'CLOTHING ALLOWANCE':
                return 'CLOTH-ALL';
                break;
            case 'CHALK ALLOWANCE':
                return 'CHA-AL';
                break;
            case 'PBB':
                return 'PBB';
                break;
            case 'GSIS':
                return 'GS';
                break;
            case 'PAGIBIG':
                return 'PI';
                break;
            case 'MID YEAR BONUS':
                return 'MYB';
                break;
            case 'YEAR END BONUS':
                return 'YEB';
                break;
            case 'PEI':
                return 'PEI';
                break;
            case 'CASH CARD':
                return 'CC';
                break;
            case 'Mid Year Cash Advance':
                return 'MYCA';
                break;
            case 'Year End Cash Advance':
                return 'YECA';
                break;
            case 'Teacher`s day cash gift':
                return 'TDCG';
                break;
            case 'OTHERS':
                return 'OTHERS';
                break;
            default:
                return $product;
                break;
        }
    }
?>
</style>
<style>
    .text-center{
        text-align:center
    }
    .text-right{
        text-align:right;
    }
    .text-left{
        text-align:left;
    }
	hr.dashed {
		border:none;
		border-top:1px dashed #000000;
		color:#fff;
		background-color:#fff;
		height:.5px;
	}
	hr.line{
		border:none;
		border-top:1px solid #000000;
		color:#fff;
		background-color:#fff;
		height:.1px;
	}
	.content{
		font-weight:bold;
	}
</style>
</head>
    <?php

        function stringToBool($str) {
            // Trim whitespace
            $str = trim($str);

            // Convert specific values to boolean true
            if ($str === 'true' || $str === '1' || strtolower($str) === 'yes') {
                return true;
            }
            
            // Convert specific values to boolean false
            if ($str === 'false' || $str === '0' || strtolower($str) === 'no' || $str === '') {
                return false;
            }
            
            // Default case
            return false;
        }
        $showPrice = false;
        if(isset($_GET['showPrice'])){
            $showPrice = stringToBool($_GET['showPrice']);
        }
        
  
    ?>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<body class="body-wrap" style="padding:10px;">
		<tt>
			<div class="text-center" style="width:85%">
				<tt style="font-size:5px;font-weight:bold"><?php echo $data_value->storeName ?></tt>
				<div style="font-size:4px !important;">
                    <tt>
                        <div><?php echo $data_value->email ?></div>
                        <!-- <div>https://meeow.doitcebu.com</div> -->
                        <div><?php echo $data_value->telephone ?></div>
                        <div> <?php echo $data_value->contact ?></div>
                        <div class=""><?php echo date("F m, Y H:i:s") ?></div>
                        <div class=""><?php echo date("H:i:s") ?></div>
                    </tt>
                </div>
                <table class="" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="content-wrap aligncenter">
                                <hr class="dashed"/>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="content-block text-left">
                                                <div style="font-size:4px !important;font-weight:bold;">
                                                    <tt>    
                                                        <div class="">OR #: <?php echo strtoupper($data_value->ornumber) ?></div>
                                                        <div class="">Staff : <?php echo property_exists($data_value,'name') ?  strtoupper($data_value->name) : 'Cashier Name' ?></div>
                                                    </tt>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="line"/>
                                <div class="text-left" style="font-size:3px">Items Count : <?php echo isset($data_value->data) ? count( (array) json_decode($data_value->data)) : sizeof($data_value->data) ?> </div>
                                <table style="width:100%;">
                                    <thead>
                                        <tr style='font-size:4px;font-weight:bold'>
                                            <?php
                                                if($showPrice == false){
                                                    echo '
                                                        <th class="text-left" Transactio>Qty.</th>
                                                        <th class="text-left" Transactio>Description</th>
                                                    ';
                                                }else{
                                                    echo '
                                                        <th class="text-left" Transactio>Qty.</th>
                                                        <th class="text-left" Transactio>Description</th>
                                                        <th class="text-left" Transactio>Amount</th>
                                                    ';
                                                }
                                            ?>
                                            
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        <?php         
                                        $total2 = 0;
                                        
                                        if(isset($data_value->data)){ 
                                            $item = json_decode($data_value->data);
                                            
                                            foreach ($item as $key => $value) {
                                                $total2 += floatval($value->total_price);
                                                
                                                
                                                if($showPrice == false){
                                                    echo "<tr style='font-size:4px;font-weight:bold' class='text-center'>
                                                        <td class='text-left'>".$value->quantity."(".$value->abbreviations.")"."</td>
                                                        <td class='text-left'>".$value->productType." ".$value->product_name."</td>
                                                    </tr>";
                                                }else{
                                                    echo "<tr style='font-size:4px;font-weight:bold' class='text-center'>
                                                       <td class='text-left'>".$value->quantity."(".$value->abbreviations.")"."</td>
                                                        <td class='text-left'>".$value->productType." ".$value->product_name." <br> ".numberFormatWithSign($value->price,2,".",",")."</td>
                                                        <td class='text-left'>".numberFormatWithSign($value->total_price,2,".",",")."</td>
                                                    </tr>";
                                                }
                                               
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                   if($showPrice){
                                   $change =  floatval($data_value->cash) - floatval($total2);
                                ?>
                                <hr class="line"/>
                                <table style="width:100%;">
                                    <tbody>
                                        <tr style='font-size:4px;font-weight:bold'>
                                            <td class="text-right">TOTAL : <?php echo numberFormatWithSign($total2,2,".",",")?></td>
                                        </tr>
                                        <?php if($data_value->cash > 0){?>
                                        <tr style='font-size:4px;font-weight:bold'>
                                            <td class="text-right">CASH : <?php echo numberFormatWithSign($data_value->cash,2,".",",")?></td>
                                        </tr>
                                        <tr style='font-size:4px;font-weight:bold'>
                                            <td class="text-right">CHANGE : <?php echo numberFormatWithSign($change,2,".",",")?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <hr class="line"/>
                                <table style="width:100%;">
                                    <tbody>
                                        <?php
                                            echo "<tr style='font-size:4px;' class='text-left'> 
                                                <td class='text-left'>Note: ".$data_value->note."</td>
                                            </tr>";
                                        ?>
                                    </tbody>
                                </table>
                                <hr class="line"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="">
                    <div class="text-center mt-3" style="font-size:4px;font-weight:bold">
                        <span>Thank you for visiting</span><br>
                        <span>Please come again!</span>
                    </div>
                </div>
            </div>
		</tt>
	</body>

</html>
