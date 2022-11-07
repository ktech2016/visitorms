<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    public function employeerelationship()
    {
        return $this->belongsTo('App\Models\Employee', 'employeeid','id');
    }
    
}
