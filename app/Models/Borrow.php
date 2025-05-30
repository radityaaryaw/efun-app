<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrow';
    protected $fillable = [
        'user_id',
        'book_id',
        'lending_date',
        'return_date',
        'lending_status'
    ];

    public function users()  {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()  {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
