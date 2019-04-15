<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function getSalary(){
      return '$ '.(number_format((float)$this->salary, 2, '.', ''));
  }
}
