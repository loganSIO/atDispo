<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    static $rules=[
      'title'=>'required',
      'description'=>'required',
      'statutCreneau'=>'required|integer',
      'color'=>'required',
      'start'=>'required',
      'end'=>'required'
    ];

    protected $fillable=['title','description','statutCreneau','color','start','end'];
}
