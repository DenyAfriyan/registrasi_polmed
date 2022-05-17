<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPaymentModel extends Model
{
    protected $table = 'user_payment';
    protected $primaryKey = 'no_pendaftaran';
    
    protected $allowedFields = [
    	'no_pendaftaran',
        'trx_id',
        'virtual_account',
        'customer_name',
        'trx_amount',
        'payment_amount',
        'cumulative_payment_amount',
        'payment_ntb',
        'datetime_payment',
        'datetime_payment_iso8601',
        'datetime_expired',
        'status_pembayaran'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}