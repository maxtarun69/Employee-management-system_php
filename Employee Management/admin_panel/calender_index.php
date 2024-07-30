<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Calendar</title>
<style>
/* CSS for the calendar */
.calendar {
    display: flex;
    flex-flow: column;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 20px 0;
    text-align: center;
    background-color: #448cd6;
    color: #fff;
}

.calendar .days {
    display: flex;
    flex-flow: wrap;
}

.calendar .day_name {
    flex: 1 0 0;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #fff;
    background-color: #448cd6;
    padding: 10px;
    text-align: center;
}

.calendar .day_num {
    flex: 1 0 0;
    padding: 10px;
    text-align: center;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    min-height: 80px;
    position: relative;
}

.calendar .day_num.selected {
    background-color: #f1f2f3;
}

.calendar .day_num.ignore {
    background-color: #f1f2f3;
    color: #ccc;
    cursor: default;
}

.calendar .day_num:hover {
    background-color: #e0e0e0;
}

.calendar .event {
    margin-top: 5px;
    padding: 3px 6px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: bold;
    color: #fff;
    display: inline-block;
    word-wrap: break-word;
}

.calendar .event.green {
    background-color: #51ce57;
}

.calendar .event.blue {
    background-color: #518fce;
}

.calendar .event.red {
    background-color: #ce5151;
}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<?php
// Include the Calendar class
include 'Calender.php';

// Create a new instance of the Calendar class
$calendar = new Calendar();

// Example events (replace with your own)
$calendar->add_event('Event 1', '2024-07-10', 1, 'green');
$calendar->add_event('Event 2', '2024-07-15', 1, 'blue');
$calendar->add_event('Event 3', '2024-07-20', 1, 'red');

// Generate the calendar HTML
echo $calendar->generate();
?>

</body>
</html>
<?php include 'footer.php';?>