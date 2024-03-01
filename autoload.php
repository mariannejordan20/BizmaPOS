<?php
session_start();   

include('connection.php');

if (isset($_SESSION['hasLog'])){
    $haslog = $_SESSION['hasLog'];
} else {
    $haslog = 0;
}

if (empty($haslog)){
    header("location: login.php");
    exit;
}



$sql = "SELECT ID, ProductID, Barcode, Product, ItemType, Warranty, Unit, Quantity, Costing, Price, Wholesale, Promo, Categories, SubCategory, Seller, Supplier, Date_Registered 
        FROM products 
        ORDER BY Categories";
$results = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
</head>
<body>
<?php include('header.php'); ?>
<div id="wrapper">
<?php include ('menu.php'); ?>
<div id="content-wrapper" class="d-flex flex-column" style="background-color: white;">
<?php include('navbar.php'); ?>
<div class="container shadow">
   
   <div class="container-fluid shadow p-0 bg-white rounded mt-5 ms-0 d-flex justify-content-between">
     <div class="container">
       <img
         src="bizma.png"
         alt="Responsive image"  
         class="border-0 img-thumbnail"
       />
     </div>
     <div class="p-1 container">
       <p class="h6">
         D1 Hiway Central Building., M.C. Briones St., Mandaue City, Cebu
</p>
       <p class="mb-0">(Beside VECO Substation, near Tile Depot and Metro Bank Hi-way.)</p>

       <div class="row">
         <div class="col-5">
           <small>Tel: </small>
         </div>
         <div class="col-5">
           <small>bizmaetch@yahoo.com</small>
         </div>
       </div>
       <div class="row">
         <div class="col-5">
           <small> CP: 0933-864-1308</small>
         </div>
         <div class="col-5">
           <small> 320-801-76-000 </small>
         </div>
       </div>
     </div>
   </div>
   <div class="containe d-flex justify-content-around">
     <div class="h5">MAIN WAREHOUSE</div>
     <div class="h3 font-italic">Q U O T A T I O N</div>
     <div class="h6">QUOTE #:&nbsp; <span contenteditable="true"></span></div>
   </div>
   <div class="container d-flex justify-content-between">
   <div class="mb-0">
     <p class="mb-0" contenteditable="true">CUSTOMER: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Aileen Gonzales</p>
     <p class="mb-0" contenteditable="true">ADRESS: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; <span >Brgy. Alang-alang</span></p>
     <p class="mb-0" contentedtibale="true">CONTACT #: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<span contenteditable="true">09255282333</span></p>
     <p class="mb-0" contenteditable="true">ATTENTION: </p>
   </div>
     <div class="text-center">
       <p class="mb-0" contenteditable="true">DATE: 02/20/24</p>
       <p class="mb-0" contenteditable="true">TIME: 11:30 AM</p>
       <p class="mb-0" contenteditable="true">P-MODE: CHECK</p>
     </div>
   </div>
</div>
   <i class="d-flex justify-content-center pb-3">We are Happy to Quote you the following:</i>

   <div class="container">
     <table class=" table-bordered table-striped table">
       <thead class="table-dark ">
         <tr>
           <th scope="col-1">Qty</th>
           <th scope="col-1">Unit</th>
           <th scope="col-6">Item Name/Description</th>
           <th scope="col-2">Price</th>
           <th scope="col-2" class="text-right">Amount</th>
         </tr>
       </thead>
       <tbody class="p-5">
         <tr>
           <td contenteditable="true" style="display:none;">2</td>
           <td contenteditable="true" style="display:none;">SET</td>
           <td contenteditable="true" style="display:none;">STORAGE</td>
           <td contenteditable="true" style="display:none;">₱15,989</td>
           <td contenteditable="true" style="display:none;" class="text-right" oninput="updateTotal(this)"></td>
         </tr>
         <!-- ... (additional rows, if any) ... -->  
         <tr>
             <td class="text-right" colspan="3"><b>TOTAL</b></td>
             <td contenteditable="true" colspan="2" class="text-right" id="totalAmount">₱0</td>
         </tr>
     </tbody>
 </table>
</div>

<div class="container d-flex align-items-end justify-content-end">
 <button class="btn btn-primary " onclick="addRow()">Add row</button>
</div>

<script>
 function addRow() {
     var tbody = document.querySelector('tbody');
     var newRow = document.createElement('tr');
     newRow.innerHTML = `
       <td contenteditable="true" oninput="updateTotal(this)"></td>
       <td contenteditable="true" oninput="updateTotal(this)"></td>
       <td contenteditable="true" oninput="updateTotal(this)"></td>
       <td contenteditable="true" oninput="updateTotal(this)"></td>
       <td contenteditable="true" oninput="updateTotal(this)" class="text-right"></td>
     `;
     tbody.insertBefore(newRow, tbody.lastChild.previousSibling);
 }

 function updateTotal(cell) {
     var totalCell = document.getElementById('totalAmount');
     var amountCells = document.querySelectorAll('tbody td:nth-child(5)');

     var total = 0;
     amountCells.forEach(function (amountCell) {
         var amount = parseFloat(amountCell.innerText) || 0;
         total += amount;
     });

     totalCell.innerText = '₱' + total.toFixed(2);
 }
</script>

   <div class="d-flex justify-content-between">
   <div class="container d-flex flex-row mt-5 align-center justify-content-center" >
     <table class="table-bordered table-striped me-5" style="width: 950rem;">
       <thead class=" table-dark text-center">
         <tr>
         <th colspan="2">Special Note and Instruction</th>
         </tr>
       </thead>
         <tbody>
           <tr>
            <td >Product Condition: </td>
            <td contenteditable="true">BRAND NEW</td>
           </tr>  
           <tr>
            <td>Product Warranty: </td>
            <td contenteditable="true">1 year warranty(major parts)</td>
           </tr>    
           <tr>
           <td>Product Availability: </td>
           <td contenteditable="true">2-3 working days</td>
         </tr>   
         <tr>
           <td>Mode of Payment: </td>
           <td contenteditable="true">Cod/check/Bank Transfer/Gcash</td>
         </tr>   
         <tr>
           <td>NON-VAR REG. TIN: </td>
           <td contenteditable="true"></td>
         </tr>          
         </tbody>
     </table>
     <div class="container flex-column d-flex justify-content-start mt-5">
       <p>Prepared By:</p>
       <span class="d-flex text-center flex-column justify-content-center">
             <p class="mb-0" contenteditable="true">Richard Bito</p>
         <hr style="background-color:black;margin-bottom:0;margin-top:0; width: 15rem;">
             <p class="mb-0" contenteditable="true">Sales Marketing</p>
             <p class="mb-0" contenteditable="true">09058095123</p>
             <a class="mb-0" contenteditable="true" href="sales@gmail.com">sales@gmail.com</a>
       </span>
     </div>
     </div>
   </div>
<div class="container d-flex text-center flex-column mt-5">
 <small>
   Our Prodcut Lines: Computer Sets, Piso Wifi Vendo, Pisonet, Water Vendo, Carwash Vendo, Computer Parts and Accessories and etc. 
 </small>
 <small>
   prices are subject to change w/o prior notice!
 </small>
</div>

  
 </div> <!-- this div for whole content-->
</div>
</div>
</body>
</html>