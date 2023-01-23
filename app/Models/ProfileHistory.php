<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    protected $table = 'profile_histories';

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
        'updated_at' => 'required',
        'created_at' => 'required',
    );
    
}
