<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount','status','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public const PENDING = 0;
    public const SUCCESS = 1;

    public const STATUSES = [
        self::PENDING => 'pending',
        self::SUCCESS => 'success',
    ];

    public static function statuses()
    {
        return self::STATUSES;
    }


    public function statusLabel()
    {
        $statuses = $this->statuses();

        return isset($this->status) ? $statuses[$this->status] : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
