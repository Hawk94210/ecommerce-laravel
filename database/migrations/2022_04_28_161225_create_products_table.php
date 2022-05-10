<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('pro_category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('sale')->default(0)->index();
            $table->longText('content')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->text('image')->nullable();
            $table->double('price')->default(0);

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
        Schema::dropIfExists('products');
    }
}