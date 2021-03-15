<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento', function (Blueprint $table) {
            $table->bigIncrements('id_estabelecimento');
            $table->string('razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj');
            $table->string('email')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('telefone')->nullable();
            $table->date('data_cadastro')->nullable();
            $table->date('status')->nullable();
            $table->date('agencia')->nullable();
            $table->date('conta')->nullable();
            $table->bigInteger('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estabelecimento');
    }
}
