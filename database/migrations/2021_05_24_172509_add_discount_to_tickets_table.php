<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->decimal('discount',5)->default(0);
            $table->date('last_day');
            $table->boolean('special')->default(1);
            $table->boolean('photography')->default(1);
            $table->boolean('food')->default(1);
            $table->boolean('id_card')->default(1);
            $table->boolean('trans')->default(1);
            $table->boolean('guide')->default(1);
            $table->boolean('safety')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
}
