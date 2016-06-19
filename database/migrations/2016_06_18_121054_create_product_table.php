<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('variant_id');
            $table->unsignedInteger('brand_id');
            $table->string('name');
            $table->string('barcode');
            $table->decimal('amount');
            $table->unsignedInteger('amount_type_id');
            $table->unsignedInteger('quantity');
            $table->softDeletes();
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
        Schema::drop($this->table);
    }
}
