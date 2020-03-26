<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('job_id');
            $table->string('group_id');
            $table->unsignedInteger('user_id');
            $table->string('queue')->nullable();
            $table->longText('payload')->nullable();
            $table->unsignedTinyInteger('attempts')->nullable();
            $table->datetime("start_execution_datetime")->nullable();
            $table->datetime("end_execution_datetime")->nullable();
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
        Schema::dropIfExists('job_logs');
    }
}
