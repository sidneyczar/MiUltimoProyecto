<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vino extends Model
{
    protected $fillable = ['edad', 'color', 'azucar_residual','grado_alcoholico'];
}
