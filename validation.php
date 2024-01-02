<?php

header("Content-Type: application/json");
echo json_encode([
    'status' => 'success',
    'message' => json_encode($_POST)
]);
