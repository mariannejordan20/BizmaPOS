<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Quotations</title>
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
    <style>
    input[contenteditable="true"] {
        background-color: transparent;
        border: none; /* optional: to remove the input border */
        width: 100%; /* optional: adjust the width as needed */
    }
    .input-wrapper {
        display: flex;
        flex-direction: column;
    }

    .input-pair {
        display: flex;
        align-items: center;
        margin-bottom: 10px; /* Adjust spacing between pairs */
    }

    .input-pair p {
        margin-right: 10px;
    }

    .input-pair input[type="text"] {
      width: 200px; /* Set a fixed width */
        border: none; /* Remove default border */
        border-bottom: 1px solid black; /* Add bottom border */
        padding-bottom: 5px; /* Adjust padding bottom to separate text from border */
    }
</style>
  </head>
  <body>
    
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
      </div>
      <div class="container d-flex justify-content-between">
      <div class="input-wrapper">
    <div class="input-pair" style="margin-top: -10px;">
        <p style="padding-top: 13px;">CUSTOMER:</p>
        <input type="text" placeholder="Enter customer name">
    </div>
    <div class="input-pair" style="margin-top: -20px;" >
        <p style="padding-top: 13px;">ADDRESS:</p>
        <div style="padding-left: 13px;">
        <input type="text" placeholder="Enter customer address">
        </div>
    </div>
    <div class="input-pair" style="margin-top: -20px;">
        <p style="padding-top: 13px;">CONTACT:</p>
        <div style="padding-left: 11px;">
        <input type="text" placeholder="Enter customer contact">
        </div>
    </div>
</div>
<div class="input-wrapper">
    <div class="input-pair" style="margin-top: -10px;">
        <p style="padding-top: 13px;">DATE:</p>
        <div style="padding-left: 24%;">
        <input type="text" placeholder="Enter customer name">
        </div>
    </div>
    <div class="input-pair" style="margin-top: -20px;" >
        <p style="padding-top: 13px;">TIME:</p>
        <div style="padding-left: 24%;">
        <input type="text" placeholder="Enter customer address">
        </div>
    </div>
    <div class="input-pair" style="margin-top: -20px;">
        <p style="padding-top: 13px;">CUSTOMER DR#:</p>
        <div style="padding-right: 2px;">
        <input type="text" placeholder="Enter customer contact">
        </div>
    </div>
</div>
      </div>
</div>


      <div class="container">
        <table class=" table-bordered table-striped table">
          <thead class="table-dark ">
            <tr>
              <th scope="col-1">Qty</th>
              <th scope="col-6">Item Name/Description</th>
              <th scope="col-2">Serial</th>
              <th scope="col-2" class="text-right">Status/Remark</th>
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
        <td>Product Condition: </td>
        <td><input type="text" contenteditable="true" value=""></td>
    </tr>
    <tr>
        <td>Product Warranty: </td>
        <td><input type="text" contenteditable="true" value=""></td>
    </tr>
    <tr>
        <td>Product Availability: </td>
        <td><input type="text" contenteditable="true" value=""></td>
    </tr>
    <tr>
        <td>Mode of Payment: </td>
        <td><input type="text" contenteditable="true" value=""></td>
    </tr>
    <tr>
        <td>NON-VAR REG. TIN: </td>
        <td><input type="text" contenteditable="true"></td>
    </tr>
</tbody>
        </table>
        </div>
        
      </div>
      <div class="d-flex justify-content-between">
      <div class="container d-flex flex-row mt-5 align-center justify-content-center" >
        <table class="table-bordered table-striped me-5" style="width: 950rem;">
          <thead class=" table-dark text-center">
          </thead>
          <tbody>
    <tr>
        <td>Received By: </td>
        <td><input type="text" contenteditable="true" value=""></td>
        <td>Checked By: </td>
        <td><input type="text" contenteditable="true" value=""></td>
    </tr>

    
</tbody>
        </table>
        </div>
        
      </div>
      <div id="message" style="margin-left: 13%; margin-top: 5%">
      <i class="d-flex pb-3">* This Document will serve as your Claim stub. Do not forget to bring/present this upon claiming your units.</i>
      <i class="d-flex pb-3">*Storage fee of 50 pesos per day may added from the date of your claim schedule.(if you fail to claim the units at the given date)</i>
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
 
  </body>
</html>
