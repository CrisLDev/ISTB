<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function scopeAllergies($query, $allergies){
        if($allergies){return
            $query->where('allergies', 'LIKE', "%$allergies%");
        }
    }

    public function scopeTreatment($query, $treatment){
        if($treatment){return
            $query->where('treatment', 'LIKE', "%$treatment%");
        }
    }

    public function scopeCardiovascular($query, $cardiovascular){
        if($cardiovascular){return
            $query->where('cardiovascular', 'LIKE', "%$cardiovascular%");
        }
    }

    public function scopeLice($query, $lice){
        if($lice){return
            $query->where('lice', 'LIKE', "%$lice%");
        }
    }

    public function scopeAsthma($query, $asthma){
        if($asthma){return
            $query->where('asthma', 'LIKE', "%$asthma%");
        }
    }

    public function scopeMalformation($query, $malformation){
        if($malformation){return
            $query->where('malformation', 'LIKE', "%$malformation%");
        }
    }

    public function scopeGlasses($query, $glasses){
        if($glasses){return
            $query->where('glasses', 'LIKE', "%$glasses%");
        }
    }
}
