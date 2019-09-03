<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Open Invoice Generator</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='assets/css/styles.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'>
    <style>
        .requiredField{
            color: red;
        }
    </style>
</head>

<body>
    <div class='highlight-clean'>
        <div class='container'>
            <div class='intro'>
                <h2 class='text-center'>Open Invoice Generator</h2>
                <p class='text-center'>Easily generate invoices by entering the information below.</p>
            </div>
        </div>
    </div>

    <form method="POST" action="generateInvoice.php" id="invoiceForm">
    <div class='row' style='padding: 50px;background:#a6ce38;'>
    
        <div class='col-md-6'>
            
            <h4>Company Details:</h4>

            <div class='form-group'>
                <label for='companyName'>Company Name <span class='requiredField'>(*)</span>:</label>
                <input type='text' class='form-control' id='companyName' name='companyName'>
            </div>

            <div class='form-group'>
                <label for='companyAddress'>Company Address <span class='requiredField'>(*)</span>:</label>
                <input type='text' class='form-control' id='companyAddress' name='companyAddress'>
            </div>     
            
            <div class='form-group'>
                <label for='companyMobile'>Company Mobile (with County Code) :</label>
                <input type='text' class='form-control' id='companyMobile' name='companyMobile'>
            </div>  
            
            <div class='form-group'>
                <label for='companyEmail'>Company Email <span class='requiredField'>(*)</span>:</label>
                <input type='email' class='form-control' id='companyEmail' name='companyEmail'>
            </div>

            <div class='form-group'>
                <label for='companyExtraLine'>Extra Line:</label>
                <input type='text' class='form-control' id='companyExtraLine' name='companyExtraLine'>
            </div>  
            
            <h4>Invoice Details:</h4>

            <div class='form-group'>
                <label for='invoiceNum'>Invoice Number <span class='requiredField'>(*)</span>:</label>
                <input type='text' class='form-control' id='invoiceNum' name='invoiceNum'>
            </div>  

            <div class='form-group'>
                <label for='dueDateSelect'>Due Date <span class='requiredField'>(*)</span>:</label>
                <select class='form-control' id='dueDateSelect' name='dueDateSelect'>
                    <option value='paid'>Already Paid</option>
                    <option value='new'>Enter a due date</option>
                </select>
            </div>

            <div class='form-group' style='display: none;' id='dueDateDev'>
                <label for='dueDate'>Enter Due Date <span class='requiredField'>(*)</span>:</label>
                <input type='date' class='form-control' id='dueDate' name='dueDate'>
            </div>

            <div class='form-group'>
                <label for='currencySymbol'>Currency Symbol:</label>
                <input type='text' class='form-control' id='currencySymbol' name='currencySymbol' placeholder='Default: ₹'>
            </div>

        </div>

        <div class='col-md-6'>
            
        <h4>Client Details:</h4>

        <div class='form-group'>
            <label for='clientName'>Client Name <span class='requiredField'>(*)</span>:</label>
            <input type='text' class='form-control' id='clientName' name='clientName'>
        </div>

        <div class='form-group'>
            <label for='clientAddress'>Client Address:</label>
            <input type='text' class='form-control' id='clientAddress' name='clientAddress'>
        </div>
        
        <div class='form-group'>
            <label for='clientEmail'>Client Email:</label>
            <input type='email' class='form-control' id='clientEmail' name='clientEmail'>
        </div>
        
        <div class='form-group'>
            <label for='clientMobile'>Client Mobile (with Country code) :</label>
            <input type='text' class='form-control' id='clientMobile' name='clientMobile'>
        </div> 
        
        <div class='form-group'>
            <label for='clientExtraLine'>Extra Line:</label>
            <input type='text' class='form-control' id='clientExtraLine' name='clientExtraLine'>
        </div>
        
        <h4>Tax Details:</h4>

        <div class='form-group'>
            <label for='taxName'>Tax Name <span class='requiredField'>(*)</span>:</label>
            <input type='text' class='form-control' id='taxName' name='taxName' placeholder='Ex: GST, IGST or Service Tax'>
        </div>

        <div class='form-group'>
            <label for='taxRate'>Tax Rate <span class='requiredField'>(*)</span>:</label>
            <input type='number' class='form-control' id='taxRate' name='taxRate'>
        </div>       

        </div>

    </div>
    <h2 style='padding-left: 50px;padding-top:50px;'>Product/Service Details:</h2>
    <div class='row' style='padding-right: 50px;padding-left: 50px;margin-top:0px;padding-top:10px;'>

        <div class='col-md-4'>

            <div id='productDiv'>
                <div class='form-group' id='product1Div'>
                    <label for='product1'>Service/Product:</label>
                    <input type='text' class='form-control' id='product1' name='product1'>
                <hr></div>
            </div>

        </div>

        <div class='col-md-4'>

            <div id='priceDiv'>
                <div class='form-group' id='price1Div'>
                    <label for='price1'>Unit Price:</label>
                    <input type='number' class='form-control' id='price1' name='price1'>
                <hr></div>
            </div>

        </div>

        <div class='col-md-4'>

            <div id='qtyDiv'>
                <div class='form-group' id='qty1Div'>
                    <label for='qty1'>Quantity:</label>
                    <input type='number' class='form-control' id='qty1' name='qty1'>
                <hr></div>
            </div>

        </div>
        <button type='button' id='addItem' class='btn btn-success'>Add Row</button>
        <button type='button' id='deleteItem' class='btn btn-danger' style='margin-left: 5px;'>Delete Row</button>

            <div class="form-group" style="display: none;">
                <input type="text" class="form-control" id="productData" name="productData">
              </div>
              <div class="form-group" style="display: none;">
                <input type="text" class="form-control" id="priceData" name="priceData">
              </div>
              <div class="form-group" style="display: none;">
                <input type="text" class="form-control" id="quantityData" name="quantityData">
              </div>
              <div class="form-group" style="display: none;">
                <input type="text" class="form-control" id="totalSum" name="totalSum">
              </div>
              <div class="form-group" style="display: none;">
                <input type="text" class="form-control" id="noticeData" name="noticeData">
              </div>
    </div>

    <h2 style='padding-left: 50px;padding-top:50px;'>Notices at the Bottom:</h2>
    <div class='row' style='padding-right: 50px;padding-left: 50px;margin-top:0px;padding-top:10px;margin-bottom:50px;'>

        <div class='col-md-12'>

            <div id='noticeDiv'>
                <div class='form-group' id='notice1Div'>
                    <label for='notice1'>Notice #1:</label>
                    <input type='text' class='form-control' id='notice1' name='notice1' value='Invoice was created on a computer and is valid without the signature and seal.' readonly>
                <hr></div>
            </div>

        </div>
        <button type='button' id='addNotice' class='btn btn-success'>Add Row</button>
        <button type='button' id='deleteNotice' class='btn btn-danger' style='margin-left: 5px;'>Delete Row</button>
        <button type="submit" class="btn btn-info" style="margin-left: 30px;" id="generateInvoice">Generate Invoice</button>

    </div>
    </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js'></script>
    <script>
    
    $(document).ready(function(){

        var totalNotices=1;
        var totalItems=1;

        function showError(error){
            $.confirm({
                title: 'Encountered an error!',
                content: error,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    close: function () {
                    }
                }
            });
            $("#generateInvoice").attr("disabled", false);
        }

        $("#generateInvoice").on('click', function(e){
            e.preventDefault();
            
            $("#generateInvoice").attr("disabled", true);
            if(false){
                showError("Please enter the logo link.");
            }else{
                if($("#companyName").val().trim().length==0){
                    showError("Please enter the company name.");
                }else{
                    if($("#companyAddress").val().trim().length==0){
                        showError("Please enter the company address.");
                    }else{
                        if($("#companyEmail").val().trim().length==0){
                            showError("Please enter the company email.");
                        }else{
                            if($("#invoiceNum").val().trim().length==0){
                                showError("Please enter the invoice number.");
                            }else{
                                let goFurther=true;

                                let dueDateOption=$("#dueDateSelect").val();
                                if(dueDateOption=="new"){
                                    if($("#dueDate").val().trim().length==0){
                                        goFurther=false;
                                        showError("Please select the due date.");
                                    }
                                }

                                if(goFurther){
                                    
                                    if($("#clientName").val().trim().length==0){
                                        showError("Please enter the client name.");
                                    }else{
                                        if($("#taxName").val().trim().length==0){
                                            showError("Please enter the tax name.");
                                        }else{
                                            if($("#taxRate").val().trim().length==0){
                                                showError("Please enter the tax rate.");
                                            }else{
                                                
                                                for(let i=1;i<=totalItems;i++){
                                                    let named1="#product"+i;
                                                    let named2="#price"+i;
                                                    let named3="#qty"+i;
                                                    if($(named1).val().trim().length==0 || $(named2).val().trim().length==0 || $(named3).val().trim().length==0){
                                                        goFurther=false;
                                                        showError("Please fill the product details.");
                                                        break;
                                                    }
                                                }

                                                if(goFurther){

                                                    for(let i=1;i<=totalNotices;i++){
                                                        let named1="#notice"+i;
                                                        if($(named1).val().trim().length==0){
                                                            goFurther=false;
                                                            showError("Either enter the notices or delete the row.");
                                                            break;
                                                        }
                                                    }

                                                    if(goFurther){

                                                        let productArr="";
                                                        let priceArr="";
                                                        let qtyArr="";
                                                        let totalSum=0;
                                                        let noticeArr="";
                                                        for(let i=1;i<=totalItems;i++){
                                                            totalSum+=($("#price"+i).val()*$("#qty"+i).val());
                                                            if(i==totalItems){
                                                                productArr+=$("#product"+i).val();
                                                                priceArr+=$("#price"+i).val();
                                                                qtyArr+=$("#qty"+i).val();
                                                            }else{
                                                                productArr+=$("#product"+i).val()+"(#)";
                                                                priceArr+=$("#price"+i).val()+"(#)";
                                                                qtyArr+=$("#qty"+i).val()+"(#)";
                                                            }
                                                        }

                                                        for(let i=1;i<=totalNotices;i++){
                                                            if(i==totalNotices){
                                                                noticeArr+=$("#notice"+i).val();
                                                            }else{
                                                                noticeArr+=$("#notice"+i).val()+"(#)";
                                                            }
                                                        }

                                                        $("#productData").val(productArr);
                                                        $("#priceData").val(priceArr);
                                                        $("#quantityData").val(qtyArr);
                                                        $("#noticeData").val(noticeArr);
                                                        $("#totalSum").val(totalSum);
                                                        $("#generateInvoice").attr("disabled", false);
                                                        $("#invoiceForm").submit();

                                                    }

                                                }

                                            }
                                        }
                                    }

                                }

                            }
                        }
                    }
                }
            }

        });

        $("#deleteItem").on('click', function(e){

            e.preventDefault();
            if(totalItems==1){
                showError("Enter at least 1 product/service");
            }else{
                $("#product"+totalItems+"Div").remove();
                $("#price"+totalItems+"Div").remove();
                $("#qty"+totalItems+"Div").remove();
                totalItems--;
            }

        });

        $("#addItem").on('click', function(e){

            e.preventDefault();
            totalItems++;
            $("#productDiv").append("<div class='form-group' id='product"+totalItems+"Div'><label for='product"+totalItems+"'>Service/Product:</label><input type='text' class='form-control' id='product"+totalItems+"' name='product"+totalItems+"'><hr></div>");
            $("#priceDiv").append("<div class='form-group' id='price"+totalItems+"Div'><label for='price"+totalItems+"'>Unit Price:</label><input type='number' class='form-control' id='price"+totalItems+"' name='price"+totalItems+"'><hr></div>");
            $("#qtyDiv").append("<div class='form-group' id='qty"+totalItems+"Div'><label for='qty"+totalItems+"'>Quantity:</label><input type='number' class='form-control' id='qty"+totalItems+"' name='qty"+totalItems+"'><hr></div>");

        });

        $("#deleteNotice").on('click',function(e){

            e.preventDefault();
            if(totalNotices==1){
                showError("You cannot delete this notice.");
            }else{
                $("#notice"+totalNotices+"Div").remove();
                totalNotices--;
            }

        });

        $("#addNotice").on('click',function(e){
            
            e.preventDefault();
            totalNotices++;
            $("#noticeDiv").append("<div class='form-group' id='notice"+totalNotices+"Div'><label for='notice"+totalNotices+"'>Notice #"+totalNotices+":</label><input type='text' class='form-control' id='notice"+totalNotices+"' name='notice"+totalNotices+"'><hr></div>");

        });
        
        $('#dueDateSelect').on('change',function(){
            let choice=$('#dueDateSelect').val();
            if(choice=='new'){
                $('#dueDateDev').show();
            }else{
                $('#dueDateDev').hide();
            }
        });

    });
    
    </script>

</body>
</html>