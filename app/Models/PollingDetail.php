<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = 'polling_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'polling_id',
        'users_id',
        'mata_kuliah_id',
    ];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }

    public function polling(){
        return $this->belongsTo(Polling::class, 'polling_id');
    }

    public function prodi(){
        return $this->belongsTo(Prodis::class, 'prodis_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function matkul(){
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
