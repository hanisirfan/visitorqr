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

    protected $appends = ['qr', 'date_time', 'check_in_date_time_carbon', 'check_out_date_time_carbon'];

    /**
     * Generate QR based on UUIDs
     *
     */
    public function getQRAttribute() {
        return (new QRCode())->render('visitorqr: ' . $this->uuid);
    }

    /**
     * Convert visit_datetime string from DB to DateTime object
     *
     */
    public function getDateTimeAttribute() {
        return new DateTime($this->visit_datetime);
    }

    /**
     * Convert check_in_datetime from DB to DateTime object
     *
     */
    public function getCheckInDateTimeCarbonAttribute() {

        if (!empty($this->check_in_datetime)) {
            return new DateTime($this->check_in_datetime);
        } else {
            return '';
        }

    }

    /**
     * Convert check_out_datetime from DB to DateTime object
     *
     */
    public function getCheckOutDateTimeCarbonAttribute() {

        if (!empty($this->check_out_datetime)) {
            return new DateTime($this->check_out_datetime);
        } else {
            return '';
        }

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
        'check_in_datetime',
        'check_in_verified_by',
        'check_out_datetime',
        'check_out_verified_by'
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
