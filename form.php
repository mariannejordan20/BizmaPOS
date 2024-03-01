<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QFORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <div class="container5">
           <div class="container">
            <div class="container">
                <div class="container">
                <div class="container shadow mt-5 p-5">
                <h2 class="text-center">Quotation Form</h2><br>
                <p class="mt-2 ms-4 "><b>Specifications:</b></p>
            <form action="" class="d-flex">
                <div class="container">
                    <div class="container">
                    <div class="mb-3">
                        <label for="qty" class="form-label">QUANTITY:</label>
                        <input type="qty" name="qty" class="form-control" id="qty" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="form-label">UNIT:</label>
                        <input type="text" class="form-control" id="unit" name="unit" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="item" class="form-label">ITEM NAME/DESCRIPTION:</label>
                        <textarea class="form-control" id="" name=""></textarea>
                        
                       
                    </div>
                    <div id="dynamicTextboxesContainer"></div>
               <script>
                    function addTextboxes() {
                        var specsCount = parseInt($('#specs').val());
                        specsCount = isNaN(specsCount) ? 0 : specsCount;

                        // Ensure the count is between 1 and 20
                        specsCount = Math.max(1, Math.min(20, specsCount));

                        // Clear existing textboxes
                        $('#dynamicTextboxesContainer').empty();

                        // Add new textboxes with corresponding labels based on the count
                        for (var i = 1; i <= specsCount; i++) {
                            var textboxHtml = `
                                <div class="mb-3">
                                    <label for="quantity${i}" class="form-label">Quantity ${i}:</label>
                                    <input type="text" class="form-control" id="quantity${i}" name="quantity${i}">
                                    
                                    <label for="price${i}" class="form-label">Price ${i}:</label>
                                    <input type="text" class="form-control" id="price${i}" name="price${i}">
                                    
                                    <label for="unit${i}" class="form-label">Unit ${i}:</label>
                                    <input type="text" class="form-control" id="unit${i}" name="unit${i}">
                                    
                                    <label for="item${i}" class="form-label">Item Name/Description ${i}:</label>
                                    <textarea class="form-control" id="item${i}" name="item${i}"></textarea>
                                </div>
                            `;
                            $('#dynamicTextboxesContainer').append(textboxHtml);
                        }
                    }
                </script>



                    </div>
                    <div class="container">
                        
                            <div class="mb-3">
                            <p class="mt-5 "><b>Special Note And Instruction:</b></p>
                                <label for="condition">PRODUCT CONDITION:</label>
                                <input type="text" id="condition" name="condition" class="form-control border-0 border-bottom">
                            </div>
                            <div class="mb-3">
                                <label for="warranty">PRODUCT WARRANTY:</label>
                                <input type="text"  id="warranty" name="warranty" class="form-control border-0 border-bottom">
                            </div>
                            <div class="mb-3">
                                <label for="avail">PRODUCT AVAILABILITY:</label>
                                <input type="text" class="form-control border-0 border-bottom" name="avail" id="avail">
                            </div>
                            <div class="mt-5">
                                <p><b>Customer:</b></p>
                                <div class="form-group">
                                    <label for="">CUSTOMER NAME:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="cname" name="cname">
                                </div>

                                <div class="form-group">
                                    <label for="address">ADDRESS:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="address" name="address">
                                </div>

                                <div class="form-group">
                                    <label for="contact">CONTACT #:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="contact" name="contact">
                                </div>

                                <div class="form-group">
                                    <label for="atten">ATTENTION:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="atten" name="atten">
                                </div>
                            </div>
                            
                    </div>
            </div>
        
                <div class="container">
                        <div class="mb-3">
                            <label for="price" class="form-label">PRICE:</label>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp">
                        </div>
                       
                        <div class="mb-3">
                            <label for="specs" class="form-label">Add Specs:</label>
                            <input type="number" class="form-control" id="specs" name="specs" aria-describedby="emailHelp" value="Type how many specifications to add">
                            <button type="button" class="btn-primary btn p-1 mt-3 d-flex flex-center justify-content-center" onclick="addTextboxes()">Add Specs</button>
                        </div>
                        <div class="container ">
                            <div class="mb-3" style="margin-top: 103px;">
                            <p class="mt-5 mb-5" style="visibility: hidden;">_______________________________</p>
                                <label for="mode">MODE OF PAYMENT:</label>
                                <input type="text" class="form-control border-0 border-bottom" name="mode" id="mode">
                            </div>
                            <div class="mb-3">
                                <label for="tin">NON-VAT REG. TIN:</label>
                                <input type="text" class="form-control border-0 border-bottom" name="tin" id="tin">
                            </div>
                            <div class="mt-5" style="">
                                <p style="margin-top:125px;"><b>Prepared by:</b></p>
                                <div class="form-group">
                                    <label for="preparedBy">NAME:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="preparedBy" name="preparedBy">
                                </div>

                                <div class="form-group">
                                    <label for="email">EMAIL:</label>
                                    <input type="email" class="form-control border-0 border-bottom" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="preparedBycontact">CONTACT #:</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="preparedBycontact" name="preparedBycontact">
                                </div>

                               
                            
                            </div>
                            
                    </div>
                </div>
               
               
            </form>
            </div> 
            </div>
            </div>
           </div>

    </div><!--whole container end-->
</body>
</html>