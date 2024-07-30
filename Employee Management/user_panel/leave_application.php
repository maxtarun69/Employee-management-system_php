<?php
include 'header.php'; // Ensure header is included properly
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Leave Request Application</title>

</head>
<body>
    <div class="container-3">
        <h1>Leave Request Application</h1><a href="status.php" class="button">Leave Status</a>
        <form id="leaveForm" action="submit_leave.php" method="post">
            <table>
                <tr>
                    <td><label for="employeeName">Employee Name:</label></td>
                    <td><input type="text" id="employeeName" name="employeeName" required></td>
                </tr>
                <tr>
                    <td><label for="leaveType">Leave Type:</label></td>
                    <td>
                        <select id="leaveType" name="leaveType" required>
                            <option value="">Select Leave Type</option>
                            <option value="Vacation">Vacation</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Personal Leave">Personal Leave</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="startDate">Start Date:</label></td>
                    <td><input type="date" id="startDate" name="startDate" required></td>
                </tr>
                <tr>
                    <td><label for="endDate">End Date:</label></td>
                    <td><input type="date" id="endDate" name="endDate" required></td>
                </tr>
                <tr>
                    <td><label for="reason">Reason:</label></td>
                    <td><textarea id="reason" name="reason" rows="4" required></textarea></td>
                </tr>
            </table>

            <button type="submit" class="button" style="margin-top:10px; margin-bottom:30px;">Submit</button>
        </form>
    </div>
</body>
</html>
    <?php
    include 'footer.php'; // Ensure footer is included properly
    ?>