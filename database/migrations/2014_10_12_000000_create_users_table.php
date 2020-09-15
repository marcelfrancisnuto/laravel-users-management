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
            $table->string('username')->unique();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address', 100);
            $table->string('postal_code', 10);
            /**
             * did not set a fixed length on phone number for now since 
             * faker generates foreign phone numbers
             */
            $table->string('phone_number');
            
            $table->string('email')->unique();
            
            //passwords will be stored as hash using laravel's built in hash method
            $table->string('password');
            
            //will be used to check account status during authentication
            $table->timestamp('email_verified_at')->nullable();
            
            //added roles to categorize user access and to protect routes
            $table->string('role');
            
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
}
