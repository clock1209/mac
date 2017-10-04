<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('docs_supplier', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->float('reference_number',10,2);
          $table->string('bill')->nullable();
          $table->string('bank_account')->nullable();
          $table->integer('concept_id')->unsigned()->nullable();
          $table->foreign('concept_id')->references('id')->on('concepts');
          $table->float('cost',10,2);
          $table->text('doc')->nullable();
          $table->integer('supplier_id')->unsigned()->nullable();
          $table->foreign('supplier_id')->references('id')->on('suppliers');
          $table->char('status',1)->default(1);
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
        Schema::dropIfExists('docs');
    }
}
