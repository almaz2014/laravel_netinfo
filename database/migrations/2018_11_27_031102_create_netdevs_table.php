<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetdevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnetdev', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loc_id')->unsigned()->index();;
            $table->string('hostname');
            $table->string('model');
            $table->string('ip');
            $table->timestamps();
            $table->unique(['hostname']);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->foreign('loc_id')
                ->references('id')->on('tbllocation')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblnetdev');
    }
}
