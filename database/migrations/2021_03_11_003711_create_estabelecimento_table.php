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
        Schema::create('estabelecimentos', function (Blueprint $table) {
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
            $table->integer('status')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->bigInteger('categoria_id')->unsigned()->nullable();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estabelecimentos');
    }
}
