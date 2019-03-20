<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceHeader extends Model {

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoice_header';
//    protected $dateFormat = "d/m/Y";

    protected $dates = ['invoice_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'invoice_number', 'invoice_date', 'invoice_status', 'invoice_amount'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = 'invoice_uid';
    protected $primaryKey = 'invoice_uid';

    public function getInvoiceDateAttribute($value) {
        return substr($value, 8, 2) . "/" . substr($value, 5, 2) . "/" . substr($value, 0, 4);
    }
    
    public function setInvoiceDateAttribute($value) {
        if (strpos($value, "-") != 0) {
            $sepChar = "-";
        } elseif (strpos($value, "/") != 0) {
            $sepChar = "/";
        }
        $inStringArray = explode($sepChar, $value);
        $year = $inStringArray[2];
        if ($year < 100) {
            $year = "20" . $year;
        }
        $month = str_pad($inStringArray[1], 2, "0", STR_PAD_LEFT);
        $day = str_pad($inStringArray[0], 2, "0", STR_PAD_LEFT);
        $this->attributes['invoice_date'] = "$year-$month-$day";
    }

}
