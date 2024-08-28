<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission;

class Role extends SpatieRole
{
    use HasFactory;

    // Các thuộc tính và phương thức khác
    // Quan hệ với Permission (đã có sẵn trong package Spatie)
    // Quan hệ với User (đã có sẵn trong package Spatie)
}