<?php

namespace App\Models;

use chillerlan\QRCode\QRCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;


    protected $appends = ['qr'];

    /**
     * Generate QR based on UUIDs
     *
     */
    public function getQRAttribute() {
        return (new QRCode())->render('visitorqr: ' . $this->uuid);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'ic_number',
        'vehicle_plate_number',
        'visit_datetime',
        'added_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
