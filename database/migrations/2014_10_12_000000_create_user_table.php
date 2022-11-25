<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->tinyInteger('login_attempt')->default(0);
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();

            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->integer('verified_by')->default(0);
            $table->integer('disabled_by')->default(0);

            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('disabled_at')->nullable();

            $table->index('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
