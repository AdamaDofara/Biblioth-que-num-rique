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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('numero_telephone')->nullable();
            $table->string('pseudo');
            $table->string('mot_de_passe');
            $table->string('sexe');
            $table->string('nationalite');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('role_id')
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
        Schema::dropIfExists('users');
    }
};
