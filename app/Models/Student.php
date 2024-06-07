<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // definisikan form yang boleh diisi / diinput ke db
    
    protected $fillable = [
        'name','nim','major','class','course_id'

    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
