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
            $table->string('category'); // paintings, drawings, photographic images, sculptures and carvings

            $table->string('img'); // REPLACE

            $table->foreignId('auction_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('sold')->default(false);
            $table->integer('reserve_price')->nullable();
            $table->timestamps();
        });

        DB::table('lots')->insert([
            'title' => "The Black Rose Harness — A 15th-Century Gothic Armour Ensemble",
            'sub_title' => "Imperial German Gothic Plate Armour, c. 1470–1480",
            'price' => 3250000,
            'description' => "<p>This extraordinary and exceptionally rare suit of late 15th-century Gothic armour represents the height of European martial craftsmanship during the High Gothic period. Likely forged in a renowned South German or Austrian armoury, The Black Rose Harness exemplifies the elegant, sculptural aesthetic that distinguished Gothic plate from earlier medieval forms.</p> <p>The armour is constructed from finely hammered steel plates, articulated to provide both protection and mobility, with pronounced fluting along the breastplate, pauldrons, vambraces, cuisses, and greaves. These deep, rhythmic flutes not only strengthen the metal but also create the unmistakable vertical emphasis characteristic of Gothic design.</p> <p>The narrow-waisted cuirass, high-ridged breastplate, and elongated sabatons reflect the aristocratic fashion of the late 1400s, suggesting ownership by a nobleman or high-ranking knight. The overall silhouette is both imposing and refined, embodying the ideals of chivalric warfare.</p> <p>Subtle etched and darkened details—most notably a stylized black rose motif—adorn select surfaces, hinting at heraldic symbolism or personal commission. The helmet, a close-helm with visor, features precise ventilation slits and refined hinges, demonstrating master-level metallurgy.</p> <p>Wear patterns and patina are consistent with age, while the overall condition remains remarkably complete for a work of this era. More than a weapon of war, this armour is a work of art and a historical document, offering a tangible connection to the chivalric culture and technological innovation of late medieval Europe.</p>",
            'summary' => "Late 15th-century Gothic plate armour, likely of South German or Austrian origin. Featuring elegant fluted steel construction, aristocratic proportions, and subtle heraldic detailing, this museum-quality harness exemplifies the pinnacle of Gothic martial craftsmanship.",
            'category' => "sculpture",
            'img' => "placeholder",
            'auction_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('lots')->insert([
            'title' => "The Iron Lily Harness — A Late Gothic Armour Suite",
            'sub_title' => "South German Gothic Plate Armour, c. 1480–1490",
            'price' => 2890000,
            'description' => "<p>This imposing and finely preserved suit of late 15th-century Gothic armour reflects the mature phase of Gothic plate development in the German-speaking regions of the Holy Roman Empire. Produced during a period of rapid innovation in armour design, the Iron Lily Harness embodies both martial efficiency and refined aesthetic sensibility.</p>
            <p>Fashioned from expertly forged steel plates, the armour displays pronounced vertical fluting across the cuirass, pauldrons, vambraces, cuisses, and greaves. These flutes enhance structural rigidity while contributing to the sharply articulated silhouette that defines late Gothic armour.</p>
            <p>The breastplate is narrow-waisted with a high medial ridge, complemented by a well-balanced fauld and tassets that allow for flexibility in mounted or foot combat. Long, pointed sabatons and fully enclosed leg defences further emphasize the aristocratic proportions popular among elite warriors of the period.</p>
            <p>Delicate etched borders and subtle linear ornamentation accent select edges, suggesting a bespoke commission rather than mass production. The sallet helmet, paired with a fitted bevor, features precise cutouts and smooth articulation, indicative of a master armourer’s hand.</p>
            <p>Surface wear, light oxidation, and a consistent patina attest to the armour’s age and historical use, while its overall completeness remains exceptional. As both a defensive instrument and a status symbol, this harness offers a compelling glimpse into the chivalric culture of late medieval Europe.</p>",
            'summary' => "Late 15th-century South German Gothic plate armour featuring bold fluting and refined proportions. A highly complete and visually striking example of elite Gothic martial craftsmanship.",
            'category' => "sculpture",
            'img' => "placeholder",
            'auction_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('lots')->insert([
            'title' => "The Silver Stag Harness — A High Gothic Knightly Armour",
            'sub_title' => "German Gothic Plate Armour, c. 1465–1475",
            'price' => 3425000,
            'description' => "This rare and museum-quality suit of mid-to-late 15th-century Gothic armour represents a pivotal moment in European armour design, when functional protection was seamlessly unified with sculptural elegance. Likely originating from a prominent German armour-making centre, the Silver Stag Harness reflects the tastes of the noble warrior class.
            The armour is constructed from carefully shaped steel plates, joined by riveted articulations that allow a remarkable range of movement. Distinctive fluting runs vertically along the breastplate, arms, and legs, reinforcing the metal while creating the dramatic visual rhythm emblematic of Gothic style.
            The cuirass features a pronounced central ridge and a tapered waist, enhancing both deflection and visual stature. Broad pauldrons and fully articulated arm defences balance the form, while the leg harness culminates in elongated sabatons that echo contemporary courtly fashion.
            Subtle engraved detailing, including a stag motif on the breastplate and couters, suggests heraldic significance or personal symbolism. The helmet, a finely executed sallet with visor, demonstrates precise engineering and careful attention to balance and visibility.
            Age-appropriate wear and a rich, even patina confirm the armour’s authenticity, yet it remains notably intact for its age. This harness stands as a powerful testament to the artistry, technology, and social prestige embodied in Gothic plate armour.",
            'summary' => "Mid-to-late 15th-century German Gothic armour distinguished by elegant fluting and engraved heraldic motifs. An exceptional and well-preserved example of noble Gothic plate armour.",
            'category' => "sculpture",
            'img' => "placeholder",
            'auction_id' => 1,
            'user_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('lot');
    }
};
