<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id', 'fk_94_project_project_id_time_entry')->references('id')->on('projects');
            $table->integer('work_type_id')->unsigned()->nullable();
            $table->foreign('work_type_id', 'fk_95_worktype_work_type_id_time_entry')->references('id')->on('work_types');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_entries');
    }
}
