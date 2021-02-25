<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('history', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->date('event_date');
            $table->string('status')->default('NEW');
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
        Schema::dropIfExists('history');
    }
}
