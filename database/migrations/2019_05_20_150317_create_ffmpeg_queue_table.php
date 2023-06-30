<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mostafaznv\Larupload\Larupload;

class CreateFfmpegQueueTable extends Migration
{
    public function up()
    {
        Schema::create(Larupload::FFMPEG_QUEUE_TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('record_id');
            $table->string('record_class', 50);
            $table->boolean('status')->default(0);
            $table->text('message')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Larupload::FFMPEG_QUEUE_TABLE);
    }
}
