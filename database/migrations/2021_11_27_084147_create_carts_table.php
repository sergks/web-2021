<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 12, 2)->default(0)->comment('Сумма');
            $table->unsignedInteger('count')->default(1)->comment('Количество');
            $table->timestamps();
        });

        Schema::create('carts_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cartId')->comment('Корзина');
            $table->unsignedBigInteger('productId')->comment('Товар');
            $table->unsignedInteger('count')->default(1)->comment('Количество');
            $table->timestamps();

            $table->foreign('cartId')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts_products', function (Blueprint $table) {
            $table->dropForeign(['cartId']);
            $table->dropForeign(['productId']);
        });
        Schema::dropIfExists('carts_products');

        Schema::dropIfExists('carts');
    }
}
