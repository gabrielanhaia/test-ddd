<?php


namespace Docler\Infrastructure\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskEloquentModel
 * @package Docler\Infrastructure\Model\Eloquent
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}