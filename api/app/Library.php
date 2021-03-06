<?php

namespace App;

use App\Models\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use UsesUuid;

    public function folder()
    {
        return $this->hasMany(LibraryFolder::class);
    }
}
