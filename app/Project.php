<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @package App
 * @property string $name
*/
class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);
    }
}
