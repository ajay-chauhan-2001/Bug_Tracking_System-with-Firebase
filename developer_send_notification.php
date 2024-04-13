<?php

include('../Bug_Tracking_System/links.php');
include('Config.php');

$sql = "SELECT * FROM developer_project WHERE status='pending'";
$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentDate = date('Y-m-d');
        // echo $currentDate;
        $dueDate = $row['close_on'];
        // echo $dueDate;die();
        $projectname = $row['project_name'];
        // echo $projectname;die();

        if ($currentDate >= $dueDate) {
        	echo "hello".$row['id']."<br>";
           
            $notificationPayload = [
                'notification' => [
                    'title' => 'Developer Your Task '. $dueDate.' Overdue',
                    'body' => 'your tasks ' .$projectname.' overdue. Please take action.'
                ],
            ];

           //tokan id
            $firebaseResponse = sendNotificationToFirebase($notificationPayload, 'dfJmIE3HRM3fN8DQSO2KWI:APA91bHNNCfeVQasXtVrK28mSVMndSRw6034g0TkYoiLzfxvlVyDo2YTHcZEEPRpB1D9vod5i_vAJXUHYaKjG9KhI9fdszdDBu3fhWHiKPws7_42fLLIz9S7rSrdpPUgN5uD2Ez1SaEH');

           
            // if ($firebaseResponse['success']) {
            //     echo "Notification sent successfully.".$dueDate."<br>";
            // } else {
            //     echo "Failed to send notification.";
            // }
        }
    }
} else {
    echo "No tasks found.";
}

function sendNotificationToFirebase($notificationPayload, $deviceToken)
{
    $url = 'https://fcm.googleapis.com/fcm/send';

    $headers = [
    	//server key
        'Authorization: key=AAAAcll0YOM:APA91bHLxaBQPiplZoMxuJ3WxYUWoqv3T9mvNYa2J3ZmhyoYZ6qDbgS4X_ebcWCax815kKU0tHNaUr_kFDHU7lJWlKdcy_J6MWpFv3wE9VS90gI8KT03xncrONsxI32bSztnDw6sSGgV', 
        'Content-Type: application/json'
    ];

    $notificationPayload['to'] = $deviceToken;

    $jsonPayload = json_encode($notificationPayload);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);

    $response = curl_exec($ch);

    curl_close($ch);

    $responseData = json_decode($response, true);

    return $responseData;
}

?>
