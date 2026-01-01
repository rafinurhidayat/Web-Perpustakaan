<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 715afd8e830119d6f1af8fb1f1ba4ecc1eaa919d
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
    ];
}
=======
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

>>>>>>> 715afd8e830119d6f1af8fb1f1ba4ecc1eaa919d
