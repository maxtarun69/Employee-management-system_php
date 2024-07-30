<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <style>
        .profile-container {
            padding: 20px;
            border-radius: 10px;
            position: relative; 
            background-color: #F8F8FF;
        }

        .profile-container h2 {
            background-color: blue;
            color: white;
            border:1px solid black;
            padding: 10px;
            margin:auto;
            width:91.5%;
        }

        .search-bar {
            float: right;
            margin-bottom: 2px;
        }

        .search-bar input[type="text"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="profile-container">
    <h2>Employee Profile  
        <div class="search-bar">
        <input type="text" id="searchInput" onkeyup="searchEmployee()" placeholder="Search for employee names...">
        <table id="employeeTable">
        <!-- Your PHP code to generate table rows goes here -->
    </table>
        </div>
    </h2>
    <?php include 'profile_data.php'; ?>
</div>
<?php include 'footer.php'; ?>

<script>
    function searchEmployee() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("employeeTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Index 1 represents the column with employee names
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
