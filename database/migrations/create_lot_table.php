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
    public function up(): void{
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->integer('price');
            $table->string('description');
            $table->string('summary');


            $table->string('img'); // REPLACE

            $table->foreignId('auction_id')->nullable()->constrained();
            $table->foreignId('account_id')->constrained();

            $table->timestamps();
        });

        DB::table('lots')->insert([
            'title' => "The Black Rose Harness — A 15th-Century Gothic Armour Ensemble",
            'sub_title' => "Imperial German Gothic Plate Armour, c. 1470–1480",
            'price' => 3250000,
            'description' => "<p>This extraordinary and exceptionally rare suit of late 15th-century Gothic armour represents the height of European martial craftsmanship during the High Gothic period. Likely forged in a renowned South German or Austrian armoury, The Black Rose Harness exemplifies the elegant, sculptural aesthetic that distinguished Gothic plate from earlier medieval forms.</p> <p>The armour is constructed from finely hammered steel plates, articulated to provide both protection and mobility, with pronounced fluting along the breastplate, pauldrons, vambraces, cuisses, and greaves. These deep, rhythmic flutes not only strengthen the metal but also create the unmistakable vertical emphasis characteristic of Gothic design.</p> <p>The narrow-waisted cuirass, high-ridged breastplate, and elongated sabatons reflect the aristocratic fashion of the late 1400s, suggesting ownership by a nobleman or high-ranking knight. The overall silhouette is both imposing and refined, embodying the ideals of chivalric warfare.</p> <p>Subtle etched and darkened details—most notably a stylized black rose motif—adorn select surfaces, hinting at heraldic symbolism or personal commission. The helmet, a close-helm with visor, features precise ventilation slits and refined hinges, demonstrating master-level metallurgy.</p> <p>Wear patterns and patina are consistent with age, while the overall condition remains remarkably complete for a work of this era. More than a weapon of war, this armour is a work of art and a historical document, offering a tangible connection to the chivalric culture and technological innovation of late medieval Europe.</p>",
            'summary' => "Late 15th-century Gothic plate armour, likely of South German or Austrian origin. Featuring elegant fluted steel construction, aristocratic proportions, and subtle heraldic detailing, this museum-quality harness exemplifies the pinnacle of Gothic martial craftsmanship.",

            'img' => "GOTHIC ARMOUR",
            'auction_id' => 1,
            'account_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('lot');
    }
};
