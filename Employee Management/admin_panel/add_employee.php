<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Employee Management System</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <?php include 'header.php'; ?> 
    <main style="padding: 20px;">
        <form method="post" action="add_employee_process.php" name="myForm" onsubmit="return validateForm()">
            <!-- Hidden field for Employee_ID -->
            <input type="hidden" name="Employee_ID" value="">
            <table border="0" cellpadding="5" cellspacing="0">
                <tr> 
                    <td style="width: 45%; padding-right: 5%;">
                        <label for="First_Name"><b>First name *</b></label><br />
                        <input name="First_Name" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" />
                    </td> 
                    <td style="width: 45%; padding-left: 5%;">
                        <label for="Last_Name"><b>Last name *</b></label><br />
                        <input name="Last_Name" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr> 
                <tr> 
                    <td colspan="2">
                        <label for="Email_Address"><b>Email *</b></label><br />
                        <input name="Email_Address" type="text" maxlength="100" style="width:100%;max-width: 535px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr> 
                <tr> 
                    <td colspan="2">
                        <label for="Address"><b>Address</b></label><br />
                        <input name="Address" type="text" maxlength="255" style="width:100%;max-width: 535px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr> 
                <tr> 
                    <td colspan="2">
                        <label for="Position"><b>Position  *</b></label><br />
                        <input name="Position" type="text" maxlength="100" style="width:100%;max-width: 535px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr> 
                <tr> 
                    <td style="width: 45%; padding-right: 5%;">
                        <label for="Salary"><b>Salary</b></label><br /> 
                        <input name="Salary" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" /> 
                    </td> 
                    <td style="width: 45%; padding-left: 5%;"> 
                        <label for="StartDate"><b>Joining Date</b></label><br />
                        <input name="StartDate" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr> 
                <tr> 
                    <td style="width: 45%; padding-right: 5%;">
                        <label for="Phone"><b>Phone *</b></label><br />
                        <input name="Phone" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" />
                    </td> 
                    <td style="width: 45%; padding-left: 5%;"> 
                        <label for="Fax"><b>Fax</b></label><br />
                        <input name="Fax" type="text" maxlength="50" style="width:100%;max-width: 260px; margin-bottom: 5px; padding:5px" />
                    </td> 
                </tr>
            </table>
            
            <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 12px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;">
  Add Employee
</button>

        </form>
    </main>

    <?php include 'footer.php'; ?>

    <!-- Display success message if redirected with success parameter -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<script>alert("Employee added successfully!");</script>';
    }
    ?>

</body>
</html>
<script>
    function validateForm() {
        var firstName = document.forms["myForm"]["First_Name"].value;
        var lastName = document.forms["myForm"]["Last_Name"].value;
        var email = document.forms["myForm"]["Email_Address"].value;
        var address = document.forms["myForm"]["Address"].value;
        var position = document.forms["myForm"]["Position"].value;
        var salary = document.forms["myForm"]["Salary"].value;
        var startDate = document.forms["myForm"]["StartDate"].value;
        var phone = document.forms["myForm"]["Phone"].value;
        var fax = document.forms["myForm"]["Fax"].value;

        // Check if any field is empty
        if (firstName == "" || lastName == "" || email == "" || address == "" || position == "" || salary == "" || startDate == "" || phone == "" || fax == "") {
            alert("All fields must be filled out");
            return false;
        }

        // Validate email format
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            alert("Invalid email address");
            return false;
        }

        // Validate phone number format
        var phonePattern = /^\d{10}$/; // Assuming a 10-digit phone number
        if (!phone.match(phonePattern)) {
            alert("Invalid phone number. Please enter a 10-digit number without spaces or special characters.");
            return false;
        }

        // Validate fax number format
        var faxPattern = /^\d{10}$/; // Assuming a 10-digit fax number
        if (!fax.match(faxPattern)) {
            alert("Invalid fax number. Please enter a 10-digit number without spaces or special characters.");
            return false;
        }

        return true; // Form submission will proceed if all validations pass
    }
</script>
