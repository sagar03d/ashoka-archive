<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id');
            $table->string('file_no')->nullable();
            $table->string('abstract')->nullable();
            $table->string('author')->nullable();
            $table->string('recipient')->nullable();
            $table->string('keywords')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('extent')->nullable();
            $table->string('item_type')->nullable();
            $table->string('language')->nullable();
            $table->string('remarks')->nullable();
            $table->string('source')->nullable();
            $table->string('donor')->nullable();
            $table->string('donation_date')->nullable();
            $table->string('custodian')->nullable();
            $table->string('copyright')->nullable();
            $table->string('path');
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
        Schema::dropIfExists('documents');
    }
};
