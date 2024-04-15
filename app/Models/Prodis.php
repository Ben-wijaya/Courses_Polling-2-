<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodis extends Model
{
    use HasFactory;

    protected $table = 'prodis';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name'
    ];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }
}
