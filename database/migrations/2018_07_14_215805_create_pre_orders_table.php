<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requester', false, true);
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('thickness')->nullable();
            $table->string('material')->nullable();
            $table->boolean('bending')->default(false);
            $table->boolean('threading')->default(false);
            $table->timestamps();

            $table->foreign('requester')
                ->references('id')
                ->on('requesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_orders');
    }
}
