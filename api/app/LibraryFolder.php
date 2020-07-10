<?php

namespace App;

use App\Models\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class LibraryFolder extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
    ];
}
