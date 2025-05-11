<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alzhiemerdisease";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = $_GET['uname'];

// Check if the username exists in the database
$sql = "SELECT * FROM userregister WHERE username='$uname'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    // Function to get nearest locations
    function getNearestLocations($latitude, $longitude, $distance, $limit)
    {
        global $connect, $uname;

        // Prepare the SQL query to retrieve the nearest locations
        $sql = "SELECT id, number, (6371 * acos(cos(radians($latitude)) * cos(radians(lat)) * cos(radians(lang) - radians($longitude)) + sin(radians($latitude)) * sin(radians(lat)))) AS distance FROM userregister WHERE username='$uname'";

        // Execute the query
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the results into an associative array
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $mobile = $row['number'];
                $locationDistance = round($row['distance'] * 1000); // Convert distance to meters

                // Update the distance in the database
                $updateSql = "UPDATE userregister SET distance = '$locationDistance' WHERE id='$id'";
                mysqli_query($connect, $updateSql);

                // Check if distance is greater than or equal to 50 meters
                if ($locationDistance >= 50) {
                    // Send SMS
                    $msg = urlencode("Out of location");
                    $sms_url ="http://sms.creativepoint.in/api/push.json?apikey=6555c521622c1&route=transsms&sender=FSSMSS&mobileno=$mobile&text=Dear%20customer%20your%20msg%20is%20$msg%20Sent%20By%20FSMSG%20FSSMSS";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $sms_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch); // Execute the cURL request
                  //  if ($response === false) {
                   //     echo "CURL Error: " . curl_error($ch);
                  //  } else {
                      //  echo "SMS API Response: " . $response;
                   // }
                    curl_close($ch);
                }
            }
        }
    }

    // Get latitude and longitude from the request
    $latitude = $_GET["latitude"];
    $longitude = $_GET["longitude"];

    // Example usage of getNearestLocations function
    $distance = 500; // Distance in kilometers
    $limit = 1; // Maximum number of locations to retrieve
    getNearestLocations($latitude, $longitude, $distance, $limit);

    echo "Success";
} else {
    echo "Failed";
}

// Close connection
mysqli_close($connect);
?>
