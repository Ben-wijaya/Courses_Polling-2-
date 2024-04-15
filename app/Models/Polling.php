<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'users_id',
        'mata_kuliah_id',
    ];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }

    public function prodi(){
        return $this->belongsTo(Prodis::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function matkul(){
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
