<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'invoice_status';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['status_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['status_id'];
        
	protected $primaryKey = ['status_id'];

}
