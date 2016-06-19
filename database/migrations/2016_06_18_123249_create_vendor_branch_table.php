<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorBranchTable extends Migration
{
    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'vendor_branches';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('vendor_id');
            $table->string('transaction_description');
            $table->boolean('is_regex')->default(0);
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
