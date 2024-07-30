<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
public function up()
{
Schema::create('cart_items', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id');
$table->foreignId('product_id');
$table->string('picture');
$table->string('name');
$table->decimal('harga', 10, 2);
$table->enum('color', ['white','black'])->default('white');
$table->integer('kuantitas')->default(1);
$table->string('stock');
$table->timestamps();

$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
$table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
});
}

public function down()
{
Schema::dropIfExists('cart_items');
}
}