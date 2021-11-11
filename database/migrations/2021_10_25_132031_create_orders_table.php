<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('status_id')->default(1);
            $table->foreignId('type_id');

            $table->tinyInteger('isOnline')->default(0);
            $table->tinyInteger('isPaid');
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->longText('instructions')->nullable();

            $table->string('name', 100)->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
