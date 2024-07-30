<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit employees</title>
    <style>
/* Default styles for larger screens */
table {
    border-collapse: collapse;
    width: 80%;
    margin: auto;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Popup form style */
.popup-form {
    display: none;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    max-width: 600px;
    overflow: auto;
    border-radius: 5px;
}

/* Close button style */
.close {
    color: #aaa;
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: rgb(230, 14, 82);
    text-decoration: none;
}

/* Input field styles */
input[type="text"],
input[type="email"],
input[type="number"],
input[type="tel"],
input[type="date"] {
    padding: 5px;
    font-weight: bold;
    width: calc(100% - 10px); /* Adjusted width to fit inside the form */
    border: 1px solid #ccc;
    background-color: #fff;
    margin-bottom: 10px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="date"]:focus {
    border-color: blue;
}

/* Submit button style */
input[type="submit"] {
    padding: 10px 20px;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: darkblue;
}

/* Media queries for smaller screens */
@media only screen and (max-width: 768px) {
    .popup-form {
        width: 80%; /* Adjust the width for smaller screens */
    }
}

    </style>
</head>
<body>
    <table>
<?php
include '../connection/connect.php';
// Retrieve employee data from the database
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

echo "<html>";
echo "<head>";
echo "<style>";
echo "
    table {
        border-collapse: collapse;
        width: 90%;
        margin: auto;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
";
echo "</style>";
echo "</head>";
echo "<body>";

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>Employee ID</th><th>Name</th><th>Email</th><th>Address</th><th>Position</th><th>Salary</th><th>Start Date</th><th>Phone</th><th>Fax</th><th>Status</th><th>Action</th><th>Edit</th><th>Delete</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Employee_ID"] . "</td>";
        echo "<td>" . $row["First_Name"] . " " . $row["Last_Name"] . "</td>";
        echo "<td>" . $row["Email_Address"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["Position"] . "</td>";
        echo "<td>$" . $row["Salary"] . "</td>";
        echo "<td>" . $row["StartDate"] . "</td>";
        echo "<td>" . $row["Phone"] . "</td>";
        echo "<td>" . $row["Fax"] . "</td>";
        echo "<td>" . ($row["Status"] == 1 ? "Active" : "Inactive") . "</td>";
        echo "<td>";
        if ($row["Status"] == 1) {
            echo "<form action='deactivate_employee.php' method='post'>";
            echo "<input type='hidden' name='employeeId' value='" . $row["Employee_ID"] . "'>";
            echo "<input type='submit' value='Deactivate'>";
            echo "</form>";
        } else {
            echo "<form action='activate_employee.php' method='post'>";
            echo "<input type='hidden' name='employeeId' value='" . $row["Employee_ID"] . "'>";
            echo "<input type='submit' value='Activate'>";
            echo "</form>";
        }
        echo "</td>";
        // Edit button
        echo "<td><form method='get'><input type='hidden' name='id' value='" . $row["Employee_ID"] . "'><button type='button' onclick='displayEditForm()'><img src='../assets/edit_icon.png' alt='Edit' style='height: 25px; width: 25px;'></button></form></td>";

        // Delete button with confirmation
        echo "<td><form id='deleteForm_".$row["Employee_ID"]."' action='delete_employee.php' method='post'><input type='hidden' name='employeeId' value='" . $row["Employee_ID"] . "'><button type='button' onclick='confirmDelete(".$row["Employee_ID"].")'><img src='../assets/delete_icon.png' alt='Delete' style='height: 25px; width: 25px;'></button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No employee records found";
}

echo "</body>";
echo "</html>";

// Close connection
$conn->close();
?>
 <!-- Popup edit form -->
 <div id="editPopupForm" class="popup-form">
    <div class="modal-content">
    <span class="close" onclick="closeEditForm()">&times;</span> 
    <h3 align="center">Employee Form</h3>
    <form id="employeeForm">
      <table>
        <tr>
          <td>First Name:</td>
          <td><input type="text" name="firstName"></td>
          <td>Last Name:</td>
          <td><input type="text" name="lastName"></td>
        </tr>
        <tr>
          <td>Salary:</td>
          <td><input type="number" name="salary"></td>
          <td>Joining Date:</td>
          <td><input type="date" name="joiningDate"></td>
        </tr>
        <tr>
          <td> Fax No:</td>
          <td><input type="tel" name="phoneNo"></td>
          <td>Phone No:</td>
          <td><input type="tel" name="faxNo"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td colspan="3"><input type="email" name="email" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Address:</td>
          <td colspan="3"><input type="text" name="address" style="width: 100%;"></td>
        </tr>
        <tr>
          <td>Position:</td>
          <td colspan="3"><input type="text" name="position" style="width: 100%;"></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align: center;"><input type="submit" value="Submit"></td>
        </tr>
      </table>
    </form>
  </div>
  <script>
        // Function to display the edit popup form
        function displayEditForm() {
            document.getElementById('editPopupForm').style.display = 'block';
        }

        // Function to close the edit popup form
        function closeEditForm() {
            document.getElementById('editPopupForm').style.display = 'none';
        };

          </script>
    <script>
    function confirmDelete(employeeId) {
        var result = window.confirm("Are you sure you want to delete this employee?");
        if (result === true) {
            // Submit the form
            document.getElementById('deleteForm_' + employeeId).submit();
            // Show success message
            alert("Employee deleted successfully!");
        }
    }
</script>
