<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; //tạo ra dữ liệu mẫu (fake data)

class Computer extends Model
{
    use HasFactory;

    // Đảm bảo các trường được phép gán hàng loạt
    protected $fillable = [
        'computer_name',
        'model',
        'operating_system',
        'processor',
        'memory',
        'available',
        'created_at',
        'updated_at',
    ];

    protected $table = 'computers';

    public function issues()
    {
        return $this->hasMany(Issue::class, 'computer_id');
    }
}
