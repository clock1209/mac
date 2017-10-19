<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptsBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts_bill', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('docs_supplier_id')->unsigned()->nullable();
        $table->integer('concept_id')->unsigned()->nullable();
        $table->timestamps();
        $table->foreign('docs_supplier_id')->references('id')->on('docs_supplier')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('concept_id')->references('id')->on('concepts')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concepts_bill');
    }
}
