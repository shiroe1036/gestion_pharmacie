<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseurMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseur_medicaments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateExp');
            $table->float('prixAchat');
            $table->integer('fournisseur_id')->unsigned();
            $table->foreign('fournisseur_id')
                ->references('id')
                ->on('fournisseurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('medicament_id')->unsigned();
            $table->foreign('medicament_id')
                ->references('id')
                ->on('medicaments')
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
        Schema::table('fournisseur_medicaments', function(Blueprint $table){
            $table->dropForeign('fournisseur_medicaments_fournisseur_id_foreign');
            $table->dropForeign('fournisseur_medicaments_medicament_id_foreign');
        });
        Schema::dropIfExists('fournisseur_medicaments');
    }
}
