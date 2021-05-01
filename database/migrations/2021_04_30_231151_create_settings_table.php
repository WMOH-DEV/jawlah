<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_logo')->default('settings/site_logo.png');
            $table->string('site_name')->nullable();
            $table->string('site_web')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->integer('vat_rate')->default(15);
            $table->integer('vat_id')->nullable();
            $table->string('facebook')->nullable()->default('https://www.facebook.com');
            $table->string('twitter')->nullable()->default('https://www.twitter.com');
            $table->string('instagram')->nullable()->default('https://www.instagram.com');
            $table->string('whatsapp')->nullable()->default('+96123456789');
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
        Schema::dropIfExists('settings');
    }
}
