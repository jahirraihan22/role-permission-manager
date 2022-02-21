<?php

namespace Jahir\Permission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $fillable = ['role','permission_id'];
}
