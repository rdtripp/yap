<?php
include_once '../functions.php';

$conn = getDB();
$mig1 = $conn->prepare("CREATE TABLE helpline_calls
    (helpline_call_id INT NOT NULL AUTO_INCREMENT, 
    helpline_call_sid VARCHAR(255),
    helpline_call_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    helpline_call_data LONGTEXT,
    PRIMARY KEY (helpline_call_id));");
$mig1->execute();
