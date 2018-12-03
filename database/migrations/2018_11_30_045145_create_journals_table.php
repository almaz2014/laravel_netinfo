<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljournal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dev1')->unsigned()->index();
            $table->integer('dev2')->unsigned()->index();
            $table->timestamps();
            $table->unique(['dev1','dev2']);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->foreign('dev1')
                ->references('id')->on('tblports')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('dev2')
                ->references('id')->on('tblports')
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
        Schema::dropIfExists('tbljournal');
    }
}
