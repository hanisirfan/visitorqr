<?php

namespace App\Models;

use DateTime;
use chillerlan\QRCode\QRCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;
    use HasUuids; // Use UUID instead of auto incremented IDs.

    protected $primaryKey = 'uuid';

    protected $appends = ['qr', 'date_time'];

    /**
     * Generate QR based on UUIDs
     *
     */
    public function getQRAttribute() {
        return (new QRCode())->render('visitorqr: ' . $this->uuid);
    }

    /**
     * Generate QR based on UUIDs
     *
     */
    public function getDateTimeAttribute() {
        return new DateTime($this->visit_datetime);
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
