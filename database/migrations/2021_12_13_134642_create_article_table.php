<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\Lang;
use app\Models\Types;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->string('path')->nullable(true);
            $table->longText('ttext')->nullable(true);
            $table->unsignedBigInteger('lang_id')->nullable(true);
            $table->foreign('lang_id')->references('id')->on('lang');
            $table->unsignedBigInteger('type_id')->nullable(true);
            $table->foreign('type_id')->references('id')->on('types')->nullable(true);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
