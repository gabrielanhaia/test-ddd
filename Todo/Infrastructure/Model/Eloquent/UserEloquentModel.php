<?php


namespace Docler\Infrastructure\Persistence\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserEloquentModel
 * @package Docler\Infrastructure\Model\Eloquent
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class UserEloquentModel extends Model
{
    /** @var string $table Table name. */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    /**
     * Return the tasks related to the user.
     */
    public function tasks()
    {
        return $this->belongsToMany(TaskEloquentModel::class);
    }
}