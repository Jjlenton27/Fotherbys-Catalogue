<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('access_level'); // 1 customer, 2 admin, 3 finance?
            $table->string('first_name');
            $table->string('surname');
            $table->string('address');
            $table->string('town');
            $table->string('postcode', 7); //longest postcode is 7 characters long (no space)
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('customer_notes')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert([
            'access_level' => 1,
            'first_name' => "Jack",
            'surname' => "Lenton",
            'address' => "123 Medival Street",
            'town' => "Fantasyham",
            'postcode' => "FA15JJ",
            'email' => 'whatisthiswitchcraft@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'access_level' => 2,
            'first_name' => "Admin",
            'surname' => "Adminson",
            'address' => "456 Admin Street",
            'town' => "Workton",
            'postcode' => "AD13NM",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
