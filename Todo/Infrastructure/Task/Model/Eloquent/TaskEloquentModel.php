<?php


namespace DDD\Infrastructure\Task\Model\Eloquent;

use DDD\Infrastructure\Task\Persistence\Task\UserEloquentModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskEloquentModel
 * @package DDD\Infrastructure\Task\Model\Eloquent
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskEloquentModel extends Model
{
    /** @var string $table Table name */
    protected $table = 'tasks';

    /** @var array $fillable Fillable fields. */
    protected $fillable = [
        'id',
        'title',
        'is_done',
        'created_at',
        'updated_at'
    ];

    /**
     * Return the task owner (creator).
     */
    public function taskOwner()
    {
        return $this->belongsTo(UserEloquentModel::class, 'user_id', 'id');
    }
}