<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // php artisan migrate (run migrations command)
    // php artisan migrate:rollback (undo build DB command)
    // php artisan migrate:fresh (drop and rebuild entire DB)

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('town');
            $table->string('postcode', 7); //longest postcode is 7 characters long (no space)
            $table->string('email');
            $table->string('phone_number')->nullable(); // string because ints cant start with 0


            $table->timestamps();
        });

        DB::table('accounts')->insert([
            'first_name' => 'Jack',
            'last_name' => 'Lenton',
            'address' => '123 Medival Street',
            'town' => 'Fantasyham',
            'postcode' => 'FA15JJ',
            'email' => 'whatisthiswitchcraft@gmail.com'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
