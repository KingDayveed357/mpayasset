<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daddress extends Model
{
    protected $table = 'daddress';

    // Specify the fields that are allowed to be mass-assigned
    protected $fillable = ['dname', 'daddress', 'dqrcode'];

    // Optionally, set primary key if it's different from 'id'
    protected $primaryKey = 'id';
}
?>
