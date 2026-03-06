<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
     protected $fillable = [

          'first_name',
          'second_name',
          'email',
          'date',
          'message',
          'status'

     ];
}
