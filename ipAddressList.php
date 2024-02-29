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

$sql = "SELECT ID, ip_address,branch
        FROM allowed_ips";
        
$results = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
<style>
            .products-section {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    margin-bottom: 20px;
    background-color: #fff; 
    transition: box-shadow 0.3s; 
    }
    #productsTable {
        width: 100%  ;
        border-spacing: 0  ;
    }

    

    #productsTable th,
    #productsTable td {
        padding: 10px  ;
        text-align: left;
    }

    .copy-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }
    #productsTable th {    
        color: #656565  ; /* White text for header */
        white-space: nowrap;
        font-family: Segoe UI;
        font-size: 12px;
    }

    #productsTable tbody tr {
        transition: background-color 0.3s  ;
    }

    #productsTable tbody tr:hover {
        background-color: #ecf0f1  ; /* Light gray background on hover */
    }

    #productsTable a:hover {
        color: #c0392b; /* Darker red on hover */
    }
    #productsTable tbody tr.active {
        background-color: rgba(254, 60, 0, 0.3); /* Adjust the last value (alpha) for opacity */
    }
    .custom-column-width {
    width: 10%  ; /* Adjust the width as needed */
    }
    .custom-font-size td {
    font-size: 12px;
    white-space: nowrap;
    
    }

    .table-responsive {
        overflow-x: auto;
    }
    .btn {
        padding-left: 1000px;
    }
    /* Default styles for the search bar */
    .input-group {
        margin-bottom: 15px;
    }

    #searchInput {
        max-width: 100%;
        width: 100%;
    }

    /* Responsive styles using media queries */
    @media (min-width: 576px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;  
                /* Allow it to take full width if needed */
        }
    }
    @media (min-width: 614px) {
        /* Adjust styles for phones and larger screens */
        .searchAdjust {
            max-width: 400px;  /* Set a specific max-width for phones */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }

    @media (min-width: 1000px) {
        /* Adjust styles for PCs and larger screens */
        .searchAdjust {
            max-width: 480px;  /* Set a specific max-width for PCs */
            width: 100%;      /* Allow it to take full width if needed */
        }
    }
    
    .pagination {
        display: flex;
        list-style: none;
        padding-right: 3%;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a.active,
    .pagination a:active,
    .pagination a:hover {
        background-color: #fe3c00;
        color: #fff;
    }
</style>
</head>
<body>
    <?php include('header.php'); ?>
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
                <?php include('navbar.php'); ?>
                <div class="container-fluid" style="padding-left: 2%;">
                    <div class="card-header" style="background-color: #eeeeee; border: none">
                        <h3 class="card-title" style="color: #313A46; margin-bottom: -10px">IP Addresses</h3>
                    </div>
                    <div class="card-body">
                        <div class="products-section">
                        <div class="mb-3 d-flex justify-content-between align-items-center ml-4 mr-4">
                            <form action="products.php" method="get" class="searchAdjust form-inline mt-3 mb-3">
                                <div class=" searchAdjust">
                                    <input type="text" name="search" id="searchInput" class="searchAdjust form-control" placeholder="Search" oninput="searchProducts()">
                                </div>
                            </form>
                            <?php if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') { ?>
                                <a href ="ipAdd.php" class="btn btn-success" style="color: white; " data-bs-toggle="modal" data-bs-target="#addIPModal">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <?php } ?>
                        </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table text-center table-bordered" id="productsTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-white">
                                            
                                                <th class="text-center">ACTION</th>
                                                   
                                                
                                                
                                                <th class="text-center">IP ADDRESS</th>
                                                <th class="text-center">
                                                    <select id="branchFilter" style="border: none; font-weight: bold; color:#656565;">
                                                        <option value="">Branch/Location</option>
                                                        <!-- Add options dynamically if needed -->
                                                    </select>
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="custom-font-size" style="color: #313A46;">
                                        <?php
                                            foreach ($results as $result) {
                                                echo '<tr>';
                                            
                                                echo '<td>';
                                                if ($_SESSION['Type'] == 'ADMIN' || $_SESSION['Type'] == 'MANAGER') {
                                                    echo '<a class="mr-2" href="#" data-bs-toggle="modal" data-bs-target="#editIPModal'.$result['ID'].'"><i class="fa fa-edit"></i></a>
                                                    <a href="ipDelete.php?id='.$result['ID'].'"><i class="fa fa-trash text-danger"></i></a>';
                                                }
                                                echo '</td>';
                                            
                                                echo '<td class="text-truncate text-center" style="max-width: 100px;">' . $result['ip_address'] . '</td>
                                                        <td class="text-truncate text-center" style="max-width: 50px;">'  .$result['branch'] . '</td>
                                                        
                                                    </tr>';
                                            
                                                // Modal for editing ip
                                                echo '<div class="modal fade" id="editIPModal'.$result['ID'].'" tabindex="-1" aria-labelledby="editIPModalLabel'.$result['ID'].'" aria-hidden="true">';
                                                echo '<div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="editIPModalLabel'.$result['ID'].'">Edit IP Address</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form action="ipEdit.php" method="POST">
                                                          <input type="hidden" name="IP_ID" value="'.$result['ID'].'">
                                                          <div class="mb-3">
                                                            <label for="editIP" class="form-label">IP Address</label>
                                                            <input type="text" class="form-control" id="editIP" name="editIP" value="'.$result['ip_address'].'">
                                                          </div>
                                                          <div class="mb-3">
                                                            <label for="editLocation" class="form-label">Location/Branch</label>
                                                            <input type="text" class="form-control" id="editLocation" name="editLocation" value="'.$result['branch'].'">
                                                          </div>
                                                          
                                                         
                                                          
                                                          <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>';
                                            }
                                            
                                            ?>
                                            <div class="modal fade" id="addIPModal" tabindex="-1" aria-labelledby="addIPModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addIPModalLabel">Register IP</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class ="fas fa-close"> </i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Sign Up Form -->
                                                    <form id="addIP" action="ipAdd.php" method="POST">
                                                    <div class="mb-3">
                                                        <label for="ipAdd" class="form-label">IP Address</label>
                                                        <input type="text" class="form-control" id="ipAdd" name="ipAdd">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ipLocation" class="form-label">Location/Branch</label>
                                                        <input type="text" class="form-control" id="ipLocation" name="ipLocation">
                                                    </div>


                                                    <button type="submit" class="btn btn-block fa-lg" style="background-color: #ff3c00; color: white; font-weight: bold; padding:5px; padding-right: 1rem; padding-left: 1rem; font-size:12px;">Register</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                        <ul class="pagination">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
    <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
    <script src="assetsDT/js/pdfmake.min.js"></script>
    <script src="assetsDT/js/vfs_fonts.js"></script>
    <script src="assetsDT/js/custom.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="js/delete.js"></script>


    <script>
    function copyToClipboard(text) {
        var textarea = document.createElement("textarea");
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        alert("Text copied to clipboard: " + text);
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        populateDropdown("branchFilter");
    });

    function populateDropdown(selectId) {
        var select = document.getElementById(selectId);
        var options = [];
        var table = document.getElementById("productsTable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 1; i < rows.length; i++) {
            var cell = rows[i].getElementsByTagName("td")[2]; // Index of Branch/Location column
            var value = cell.textContent || cell.innerText;
            if (!options.includes(value)) {
                options.push(value);
                var option = document.createElement("option");
                option.text = value;
                select.add(option);
            }
        }
    }

    function filterTable() {
        var selectBranch = document.getElementById("branchFilter");
        var filterBranch = selectBranch.value.toUpperCase();
        var searchInput = document.getElementById("searchInput").value.toUpperCase();
        var table = document.getElementById("productsTable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var tdBranch = tr[i].getElementsByTagName("td")[2]; // Index of Branch/Location column
            var tdIPAddress = tr[i].getElementsByTagName("td")[1]; // Index of IP Address column
            if (tdBranch && tdIPAddress) {
                var branchMatch = filterBranch === '' || tdBranch.textContent.toUpperCase() === filterBranch;
                var ipAddressMatch = tdIPAddress.textContent.toUpperCase().indexOf(searchInput) > -1;
                if (branchMatch && ipAddressMatch) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("branchFilter").addEventListener("change", filterTable);
    document.getElementById("searchInput").addEventListener("keyup", filterTable);
</script>

<script>
  document.getElementById('signupForm').addEventListener('submit', function(event) {
    
    event.preventDefault();

  
    var username = document.getElementById('signupUsername').value.trim();
    var password = document.getElementById('signupPassword').value.trim();
    var confirmPassword = document.getElementById('signupConfirmPassword').value.trim();
    var name = document.getElementById('NameOfUser').value.trim();
    var role = document.getElementById('signupRole').value;

    // Check if any field is empty
    if (!username || !password || !confirmPassword || !name || !role) {
      alert('Please fill in all fields.');
      return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
      alert('Passwords do not match.');
      return;
    }

    // If all checks pass, submit the form
    this.submit();
  });
</script>

    <?php
       if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status'];?>",
            icon: "<?php echo $_SESSION['status_code'];?>",
        });
    </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>
</html>
