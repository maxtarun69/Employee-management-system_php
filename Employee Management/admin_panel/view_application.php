<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Application</title>
    <style>
        /* Your existing CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            margin-top: 20px;
        }
        .button {
            padding: 8px 16px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Leave Requests</h2>
        <div id="statusTable"></div> <!-- Container for the status table -->
        <div class="button-container">
            <a href="home.php" class="button">< Back</a>
        </div>
    </div>

    <script>
        // Function to fetch and display leave requests status
        function fetchLeaveRequests() {
            fetch('fetch_leave_requests.php')
                .then(response => response.json())
                .then(data => {
                    // Generate HTML for the table
                    let tableHtml = '<table>';
                    tableHtml += '<tr><th>Employee Name</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Reason</th><th>Status</th><th>Actions</th></tr>';
                    
                    data.forEach(request => {
                        tableHtml += `<tr>
                                        <td>${request.employee_name}</td>
                                        <td>${request.leave_type}</td>
                                        <td>${request.start_date}</td>
                                        <td>${request.end_date}</td>
                                        <td>${request.reason}</td>
                                        <td>${request.status}</td>
                                        <td>
                                            <button class="button" onclick="approveLeave(${request.id})">Approve</button>
                                            <button class="button" onclick="deleteLeave(${request.id})">Delete</button>
                                        </td>
                                      </tr>`;
                    });

                    tableHtml += '</table>';
                    document.getElementById('statusTable').innerHTML = tableHtml;
                })
                .catch(error => {
                    console.error('Error fetching leave requests:', error);
                });
        }

        // Function to approve leave request
        function approveLeave(id) {
            fetch('approve_leave.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => {
                if (response.ok) {
                    fetchLeaveRequests(); // Refresh table after approval
                } else {
                    console.error('Failed to approve leave request');
                }
            })
            .catch(error => {
                console.error('Error approving leave request:', error);
            });
        }

        // Function to delete leave request
        function deleteLeave(id) {
            fetch('delete_leave.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => {
                if (response.ok) {
                    fetchLeaveRequests(); // Refresh table after deletion
                } else {
                    console.error('Failed to delete leave request');
                }
            })
            .catch(error => {
                console.error('Error deleting leave request:', error);
            });
        }

        // Fetch leave requests when the page loads
        window.onload = function() {
            fetchLeaveRequests();
        };
    </script>
</body>
</html>
