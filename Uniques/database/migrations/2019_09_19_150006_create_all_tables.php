<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('brands', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name');
				$table->timestamps();
			});

			Schema::create('categories', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name');
				$table->timestamps();
			});

			Schema::create('colors', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name');
				$table->timestamps();
			});

      Schema::create('products', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 8,2); //8 digitos de los cuales 2 son decimales
        $table->string('image', 100);

        // Foreign Key luego de crear las tablas a las que hacen referencia
				$table->unsignedBigInteger('user_id')->nullable();
    		$table->foreign('user_id')->references('id')->on('users');
				$table->unsignedBigInteger('brand_id')->nullable();
    		$table->foreign('brand_id')->references('id')->on('brands');
				$table->unsignedBigInteger('category_id')->nullable();
    		$table->foreign('category_id')->references('id')->on('categories');

        $table->timestamps();
      });

      Schema::create('color_product', function (Blueprint $table) {
  			$table->bigIncrements('id');
        //Foreign Key
  			$table->unsignedBigInteger('color_id')->nullable();
  		  $table->foreign('color_id')->references('id')->on('colors');
  			$table->unsignedBigInteger('product_id')->nullable();
  		  $table->foreign('product_id')->references('id')->on('products');

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
      //se borra primero la última tabla que cree y si tiene FK, se borra primero la FK y luego la tabla. Pero
      //si creamos la tabla completa, no es necesario borrar las FK y las columnas. Se borra directamente las tablas.
      Schema::dropIfExists('color_product');
      Schema::dropIfExists('products');
      Schema::dropIfExists('colors');
      Schema::dropIfExists('categories');
      Schema::dropIfExists('brands');
    }
}
