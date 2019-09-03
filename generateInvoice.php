<?php
date_default_timezone_set("Asia/Kolkata");
$dueDate="PAID";
if(strcmp($_POST['dueDateSelect'],"new")==0){
    $date=date_create(trim($_POST['dueDate']));
    $dueDate=date_format($date,"F jS, Y");
}

$productArr=explode("(#)",trim($_POST['productData']));
$priceArr=explode("(#)",trim($_POST['priceData']));
$quantityArr=explode("(#)",trim($_POST['quantityData']));
$noticeArr=explode("(#)",trim($_POST['noticeData']));

$totalProducts=sizeof($productArr);
$totalNotices=sizeof($noticeArr);

$tax=(float)($_POST['taxRate']/100)*$_POST['totalSum'];
$grandTotal=(float)$tax+$_POST['totalSum'];

$currency="₹";
$setCurrency=trim($_POST['currencySymbol']);
if(!empty($setCurrency)){
    $currency=$setCurrency;
}

//foreach ( $_POST as $key => $value) {
//echo '<p>$key - $value</p>';
//echo '<hr />';
//}

?>
<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
<link href='include/style.css' rel='stylesheet'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<div id='invoice'>
    <div class='invoice overflow-auto'>
        <div style='min-width: 600px'>
            <header>
                <div class='row'>
                    <div class='col company-details'>
                        <h2 class='name'><?php echo trim($_POST['companyName']); ?></h2>
                        <div><?php echo trim($_POST['companyAddress']); ?></div>
                        <?php if(strlen(trim($_POST['companyAddress']))>0){ echo "<div>".trim($_POST['companyMobile'])."</div>"; } ?>
                        <div><?php echo trim($_POST['companyEmail']); ?></div>
                        <?php if(strlen(trim($_POST['companyExtraLine']))>0){ echo "<div>".trim($_POST['companyExtraLine'])."</div>"; } ?>
                    </div>
                </div>
            </header>
            <main>
                <div class='row contacts'>
                    <div class='col invoice-to'>
                        <div class='text-gray-light'>INVOICE TO:</div>
                        <h2 class='to'><?php echo trim($_POST['clientName']); ?></h2>
                        <?php if(strlen(trim($_POST['clientAddress']))>0){ echo "<div class='address'>".trim($_POST['clientAddress'])."</div>"; } ?>
                        <?php if(strlen(trim($_POST['clientMobile']))>0){ echo "<div>".trim($_POST['clientMobile'])."</div>"; } ?>
                        <?php if(strlen(trim($_POST['clientEmail']))>0){ echo "<div class='email'><a href='mailto:".trim($_POST['clientEmail'])."'>".trim($_POST['clientEmail'])."</a></div>"; } ?>
                        <?php if(strlen(trim($_POST['clientExtraLine']))>0){ echo "<div>".trim($_POST['clientExtraLine'])."</div>"; } ?>
                    </div>
                    <div class='col invoice-details'>
                        <h1 class='invoice-id'>INVOICE: <?php echo trim($_POST['invoiceNum']); ?></h1>
                        <div class='date'>Date of Invoice: <?php echo date("F jS, Y"); ?></div>
                        <div class='date'>Due Date: <?php echo $dueDate; ?></div>
                    </div>
                </div>
                <table border='0' cellspacing='0' cellpadding='0'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class='text-left'>Product/Service</th>
                            <th class='text-right'>Unit Price</th>
                            <th class='text-right'>Quantity</th>
                            <th class='text-right'>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    
                    $i=0;
                    for($i=0;$i<$totalProducts;$i++){
                        $ttl=(float)$priceArr[$i]*$quantityArr[$i];
                        echo "<tr>
                        <td class='no'>".($i+1)."</td>
                        <td class='text-left'><h3>".$productArr[$i]."</h3></td>
                        <td class='unit'>".$currency.number_format($priceArr[$i],2)."</td>
                        <td class='qty'>".$quantityArr[$i]."</td>
                        <td class='total'>".$currency.number_format($ttl,2)."</td>
                    </tr>";
                    }
                    
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan='2'></td>
                            <td colspan='2'>SUBTOTAL</td>
                            <td><?php echo $currency.number_format($_POST['totalSum'],2); ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'></td>
                            <td colspan='2'><?php echo $_POST['taxName']." @ ".$_POST['taxRate']."%"; ?></td>
                            <td><?php echo $currency.number_format($tax,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan='2'></td>
                            <td colspan='2'>GRAND TOTAL</td>
                            <td><?php echo $currency.number_format($grandTotal,2); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class='thanks'>Thank you!</div>
                <?php 
                
                if($totalNotices>0){
                    echo "<div class='notices'><div>NOTICE:</div>";
                    $i=0;
                    for($i=0;$i<$totalNotices;$i++){
                        echo "<div class='notice'>".$noticeArr[$i]."</div>";
                    }
                    echo "</div>";
                }

                ?>
            </main>
            <footer>
                
            </footer>
        </div>
        <div></div>
    </div>
</div>
