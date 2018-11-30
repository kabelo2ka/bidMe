<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');

            /*$table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');*/

            $table->string('email');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->float('amount', 20)->default(0);

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
        Schema::dropIfExists('bids');
    }
}
