<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    public function scopeContent($query, $content){
        if($content){return
            $query->where('content', 'LIKE', "%$content%");
        }
    }

    public function scopeResume($query, $resume){
        if($resume){return
            $query->where('resume', 'LIKE', "%$resume%");
        }
    }

}
