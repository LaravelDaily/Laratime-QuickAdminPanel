<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkType
 *
 * @package App
 * @property string $name
*/
class WorkType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        WorkType::observe(new \App\Observers\UserActionsObserver);
    }
}
