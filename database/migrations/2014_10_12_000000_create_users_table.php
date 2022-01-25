<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre',50);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('tipo_usuario',['0','1']);
            $table->string('ap_paterno',30);
            $table->string('ap_materno',30)->nullable();
            $table->string('fecha_nac',20);
            $table->string('calle',30);
            $table->string('colonia',20);
            $table->string('cp',20);
            $table->string('ciudad',30);
            $table->string('estado',20);
            $table->string('telefono',15);
            $table->string('grado_estudios',15);
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
}
