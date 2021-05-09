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
            $table->id();
            $table->string('displayName', 60);
            $table->string('username', 10);
            $table->string('password');
            $table->string('token')
            ->nullable()
            ->default(NULL);
            $table->enum('role', [
                'ADMINISTRATOR', 'DELIVERY', 'SUPPLIER', 'CUSTOMER'
            ])->default('CUSTOMER');
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
}
