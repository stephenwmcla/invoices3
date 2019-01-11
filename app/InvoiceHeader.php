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
    protected $hidden = ['invoice_uid'];
    protected $primaryKey = 'invoice_uid';

}
