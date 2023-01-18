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
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('description');
            $table->string('photo');
            $table->string('livre_pdf');
            $table->timestamps();

            $table->foreignId('user_id')
                    ->nullable()
                    ->Constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            $table->foreignId('specialite_id')
                    ->nullable()
                    ->Constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            $table->foreignId('categorie_id')
                    ->nullable()
                    ->Constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');
           
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
        Schema::dropIfExists('ouvrages');
    }
};
