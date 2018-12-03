<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ndev_id')->unsigned()->index();
            $table->string('srcport');
            $table->timestamps();
            $table->unique(['ndev_id','srcport']);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->foreign('ndev_id')
                ->references('id')->on('tblnetdev')
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
        Schema::dropIfExists('ports');
    }
}
