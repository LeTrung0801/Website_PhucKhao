<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
  protected $table = 'course';
  protected $primaryKey = 'id';
  protected $allowedFields = ['course_id', 'course_name'];
}
