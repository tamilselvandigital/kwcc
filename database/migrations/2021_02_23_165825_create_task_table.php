<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('task', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->string('task');
            $table->dateTime('due_date');
            $table->string('status');
            $table->dateTime('created_at');
            $table->string('created_by');
            $table->dateTime('updated_at');
            $table->string('updated_by');
            //$table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
