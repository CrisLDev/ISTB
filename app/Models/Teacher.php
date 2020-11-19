<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    //Scope
    public function scopefullName($query, $fullname){
        if($fullname){return 
            $query->where('fullname', 'LIKE', "%$fullname%");
        }
    }

    public function scopeEmail($query, $email){
        if($email){return
            $query->where('email', 'LIKE', "%$email%");
        }
    }

    public function scopeCode($query, $code){
        if($code){return
            $query->where('code', 'LIKE', "%$code%");
        }
    }

}
