<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReklamMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklamlar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik', 200)->default('baslik');
            $table->string('aciklama', 600)->default('aciklama');
            $table->string('siteurl', 600)->default('www.example.com');
            $table->double('maliyet', 15, 2)->nullable()->default(123.4);
            $table->integer('gunluk_limit')->unsigned()->nullable()->default(12);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('durum', ['aktif', 'pasif'])->default('pasif');
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
        Schema::dropIfExists('reklamlar');
    }
}
