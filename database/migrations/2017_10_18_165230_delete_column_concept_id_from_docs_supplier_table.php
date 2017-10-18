<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnConceptIdFromDocsSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docs_supplier', function (Blueprint $table) {
            $table->dropForeign('docs_supplier_concept_id_foreign');
            $table->dropColumn(['concept_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docs_supplier', function (Blueprint $table) {
            $table->integer('concept_id')->unsigned()->nullable();
            $table->foreign('concept_id')->references('id')->on('concepts');
        });
    }
}
