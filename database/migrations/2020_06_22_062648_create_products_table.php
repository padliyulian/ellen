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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('product');
            $table->integer('total_order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        // dummy data
        DB::table('products')->insert([
            ['name' => 'Lipstik ABC', 'price' => 50000, 'created_at' => NOW()],
            ['name' => 'Bedak ABC', 'price' => 25000, 'created_at' => NOW()],
            ['name' => 'Parfume ABC', 'price' => 100000, 'created_at' => NOW()],
        ]);

        DB::table('customers')->insert([
            ['name' => 'Yuliana', 'phone' => '085268194028', 'address' => 'Jl. Raya Hajimena KM 14 No. 165, Bandar Lampung', 'created_at' => NOW()],
            ['name' => 'Raisa', 'phone' => '085268194022', 'address' => 'Dusun 1 Natar 2 RT 04/RW 01 Natar No. 123', 'created_at' => NOW()],
        ]);

        DB::table('orders')->insert([
            ['customer_id' => 1, 'product' => 'Lipstik ABC', 'total_order' => 50000, 'created_at' => NOW()],
            ['customer_id' => 2, 'product' => 'Parfume ABC', 'total_order' => 100000, 'created_at' => NOW()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customers');
    }
}
