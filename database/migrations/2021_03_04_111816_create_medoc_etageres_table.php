<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedocEtageresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medoc_etageres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nbrEtagere');
            $table->string('unite');
            $table->integer('medoc_stock_id')->unsigned();
            $table->foreign('medoc_stock_id')
                ->references('id')
                ->on('medoc_stocks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medoc_etageres', function(Blueprint $table){
            $table->dropForeign('medoc_etageres_medoc_stock_id_foreign');
            $table->dropForeign('medoc_etageres_user_id_foreign');
        });
        Schema::dropIfExists('medoc_etageres');
    }
}
