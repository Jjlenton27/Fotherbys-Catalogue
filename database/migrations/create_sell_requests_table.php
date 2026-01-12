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
        Schema::create('sell_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->integer('price');
            $table->string('description');
            $table->string('summary');
            $table->string('category'); // paintings, drawings, photographic images, sculptures and carvings
            $table->boolean('status')->default(0); // -1 denied, 0 awating, 1 approved
            $table->integer('reserve_price')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });


        DB::table('sell_requests')->insert([
            'title' => "Fancy armour title",
            'sub_title' => "fancy subtitle",
            'price' => 3250000,
            'reserve_price' => 3250010,
            'description' => "Big fancy armour description",
            'summary' => "summary",
            'category' => "sculpture",
            'user_id' => 1,
        ]);

        DB::table('sell_requests')->insert([
            'title' => "Fancy title",
            'sub_title' => "fancy subtitle",
            'price' => 3250000,
            'reserve_price' => 3250010,
            'description' => "armour description",
            'summary' => "summary",
            'category' => "sculpture",
            'user_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_requests');
    }
};
