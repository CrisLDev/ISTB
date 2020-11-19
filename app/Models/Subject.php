<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function scopeSubjectName($query, $subjectName){
        if($subjectName){return
            $query->where('subjectName', 'LIKE', "%$subjectName%");
        }
    }

}
