<?php

namespace App\Traits;

use App\Models\UserLog;
use Carbon\Carbon;

trait UserLogRecord
{
    /**
     * record user activity in system
     * @param data as array
     */
    public function recordUserLog($data = []): void
    {
        UserLog::create([
            'user_ref_id' => $data['user_id'],
            'email' => $data['email'],
            'ip_address' => $data['ip_address'],
            'user_agent' => $data['user_agent'],
            'activity' => $data['activity'],
            'status' => $data['status'],
            'recorded' => Carbon::now()
        ]);
    }
}
