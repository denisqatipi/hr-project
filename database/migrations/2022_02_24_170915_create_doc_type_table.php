<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocTypeTable extends Migration
{
    public function up()
    {
        Schema::create('doc_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('description');
            $table->string('module');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doc_type');
    }
}