<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTasks
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                ->unsigned()
                ->nullable(false)
                ->comment('Creator of the task.');

            $table->string('title', 200)->nullable(false)->comment('Title of the task (identifier).');
            $table->text('description')->nullable(true)->comment('Full description of the task (note).');
            $table->boolean('is_done')->default(false)->comment('This param defines if the task was completed.');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
