<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalMedocEtageresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_medoc_etageres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('journal_vente_id')->unsigned();
            $table->foreign('journal_vente_id')
                ->references('id')
                ->on('journal_ventes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('medoc_etagere_id')->unsigned();
            $table->foreign('medoc_etagere_id')
                ->references('id')
                ->on('medoc_etageres')
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
        Schema::table('journal_medoc_etageres', function(Blueprint $table){
            $table->dropForeign('journal_medoc_etageres_journal_vente_id_foreign');
            $table->dropForeign('journal_medoc_etageres_medoc_etagere_id_foreign');
        });
        Schema::dropIfExists('journal_medoc_etageres');
    }
}
