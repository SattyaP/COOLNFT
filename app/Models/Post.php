<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Category;x

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image','title','price','category','category_id','description','status','user_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }



        public const TIDAK_AKTIF = 0;
        public const AKTIF = 1;
        public const BLOCKIR = 2;
    
        public const STATUSES = [
            self::TIDAK_AKTIF => 'tidak-aktif',
            self::AKTIF => 'aktif',
            self::BLOCKIR => 'block',
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

        public function postOrder()
        {
            return $this->hasMany('App\Models\Order')->orderBy('id', 'DESC');
        }
}
