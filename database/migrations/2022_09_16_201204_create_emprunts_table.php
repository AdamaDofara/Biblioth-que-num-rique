<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_retour');


            $table->foreignId('user_id')
                    ->nullable()
                    ->Constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');;
            $table->foreignId('ouvrage_id')
                    ->nullable()
                    ->Constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');;
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
        Schema::dropIfExists('emprunts');
    }
};
