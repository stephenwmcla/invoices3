<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['client_name', 'address_1','address_2','address_3','county','postcode','client_contact','invoice_prefix','next_invoice_no'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['client_id'];
        
        protected $primaryKey = 'client_id';

}
