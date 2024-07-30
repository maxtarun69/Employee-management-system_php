<style> 
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
        }</style>
<div class="container">
<h2>Leave Requests Status</h2>
        <div id="statusTable"></div> <!-- Container for the status table -->
    </div>

    <script>
        // Function to fetch and display leave requests status
        function fetchLeaveRequests() {
            fetch('fetch_leave_requests.php')
                .then(response => response.json())
                .then(data => {
                    // Generate HTML for the table
                    let tableHtml = '<table>';
                    tableHtml += '<tr><th>Employee Name</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Reason</th><th>Status</th></tr>';
                    
                    data.forEach(request => {
                        tableHtml += `<tr>
                                        <td>${request.employee_name}</td>
                                        <td>${request.leave_type}</td>
                                        <td>${request.start_date}</td>
                                        <td>${request.end_date}</td>
                                        <td>${request.reason}</td>
                                        <td>${request.status}</td>
                                      </tr>`;
                    });

                    tableHtml += '</table>';
                    document.getElementById('statusTable').innerHTML = tableHtml;
                })
                .catch(error => {
                    console.error('Error fetching leave requests:', error);
                });
        }

        // Fetch leave requests when the page loads
        window.onload = function() {
            fetchLeaveRequests();
        };
    </script>
    </div>