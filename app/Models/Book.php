<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'book';
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'cover',
        'year_publish',
        'categories',
        'status,'
    ];

    public function borrow()
    {
        return $this->hasMany(Borrow::class, 'book_id');
    }
    public function collection()
    {
        return $this->hasMany(Collection::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
