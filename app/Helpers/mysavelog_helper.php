<?php

use App\Models\AutoloadModel;
use CodeIgniter\I18n\Time;

function write_audit_log($userId, $eventType, $description) {
    $db = \Config\Database::connect();
    $now = new Time('now', 'Asia/Ho_Chi_Minh', 'en_US');
    $data = [
        'user_id' => $userId,
        'event_type' => $eventType,
        'description' => $description,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
        'created_at' => $now->toDateTimeString()
    ]; 
    $db->table('audit_logs')->insert($data);
}

?>