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
            $table->id();
            $table->string('name');
            $table->string('NIM', 20)->unique();
            $table->string('email', 60)->unique();
            $table->string('line', 30);
            $table->string('class', 20);
            $table->string('domicilie');
            $table->string('first_choice', 50);
            $table->text('first_reason');
            $table->string('second_choice', 50);
            $table->text('second_reason');
            $table->string('password', 50);
            $table->string('wawancara', 20);
            $table->string('identifier');
            $table->string('result');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
