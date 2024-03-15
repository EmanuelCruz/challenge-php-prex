<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    use HasFactory;

    protected $table = 'request_logs';

    protected $fillable = [
        'user_id',
        'service',
        'request_body',
        'http_response_status_code',
        'body_response',
        'ip_origin',
    ];
}
