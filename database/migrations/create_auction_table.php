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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('summary')->nullable();
            $table->date('auction_date');
            $table->time('auction_time');

            $table->timestamps();
        });

        DB::table('auctions')->insert([
            'title' => "A Distinguished Collection of 15th-Century Gothic Armour and Associated Elements, Circa 1450–1500",
            'description' => "<p>This auction presents an important assemblage of 15th-century Gothic armour and related components, representative of the late medieval period when plate armour reached its highest artistic and technical refinement. Originating primarily from the German-speaking regions of Europe, the pieces reflect the characteristic Gothic aesthetic, defined by elegant fluting, pronounced ridges, and a strong sense of vertical line.</p> <p>The items within this group illustrate the sophistication of contemporary armour-making, combining hardened steel construction with carefully articulated joints that allowed for effective protection while maintaining mobility. Each element would have formed part of a broader harness, commissioned by members of the knightly or noble classes and produced by skilled master armourers working to exacting standards.</p> <p>Surviving Gothic armour in any form is increasingly scarce, and collections of multiple period elements are rarer still. Together, these items provide valuable insight into the evolution of late medieval warfare, craftsmanship, and status display, making the group particularly appealing to collectors, museums, and scholars of arms and armour.</p>",
            'summary' => "This auction features a rare group of 15th-century Gothic armour elements, dating to circa 1450–1500, distinguished by their elegant fluted forms and high-quality craftsmanship.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);


        DB::table('auctions')->insert([
            'title' => "Ancient Sword of the Valkyries",
            'description' => "<p>A finely crafted sword, once belonging to the Valkyries of old. The blade is said to have been forged by the gods themselves, featuring intricate engravings of battle scenes. Its hilt is adorned with rubies and the sword is balanced perfectly for combat.</p>",
            'summary' => "A legendary sword with divine origins, ideal for any collector or warrior.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Knight's Full Plate Armor",
            'description' => "<p>This complete set of full plate armor was worn by a renowned knight during the Siege of Ravenshill. Made from polished steel, it offers both protection and flexibility. Its intricate design features detailed engravings of mythical creatures, and it’s been preserved in pristine condition.</p>",
            'summary' => "A historical and ornate piece of knightly armor, perfect for display or reenactment.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Mystic Elven Bow",
            'description' => "<p>This bow is said to have been crafted by the ancient Elves in the heart of the Enchanted Forest. Made from the wood of a sacred tree and strung with an enchanted silver string, it is capable of shooting arrows with unmatched accuracy and speed.</p>",
            'summary' => "A rare and magical bow, perfect for archers and collectors alike.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Dragonbone Dagger",
            'description' => "<p>This dagger is forged from the bones of a long-dead dragon, giving it unmatched durability and a razor-sharp edge. The handle is wrapped in leather and adorned with small gemstones that are rumored to carry a magical aura.</p>",
            'summary' => "A formidable weapon, blending ancient magic and lethal precision.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Ancient Scroll of Healing",
            'description' => "<p>This scroll contains rare healing spells that were lost to time. Written in an ancient dialect, its magic is said to be capable of curing even the most fatal wounds. The parchment is brittle, but the ink remains clear and readable.</p>",
            'summary' => "A priceless artifact for those interested in ancient magic and healing arts.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Royal Crown of the High King",
            'description' => "<p>Once worn by the High King of Eldrith, this royal crown is a symbol of power and authority. Crafted from gold and studded with precious gemstones, it is said to bring great fortune to its wearer. It has been passed down through generations of kings.</p>",
            'summary' => "A regal and historic piece, fit for any royal collection.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Knight's Armor Set & Sword Collection",
            'description' => "<p>Up for auction is a rare collection of medieval knight's armor and swords. Included are a full suit of plate armor, crafted in the 14th century, along with an assortment of battle-ready swords and shields. Each piece has been carefully restored to maintain its historical integrity.</p><p>This auction represents a unique opportunity to own a piece of medieval history, with items ranging from ornate helmets to intricately designed swords.</p>",
            'summary' => "A rare collection of medieval knight's armor and swords, perfect for collectors or reenactors.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Viking Artifacts: Axe & Shield Set",
            'description' => "<p>This auction features a collection of Viking artifacts, including a hand-forged battle axe and a large, round shield. The axe, crafted with steel and iron, is believed to have been used in raids during the early Viking age. The shield, made from wood and iron, bears historical markings from Scandinavian regions.</p><p>These items offer a direct link to the Viking warriors of centuries past and are perfect for historical enthusiasts.</p>",
            'summary' => "Own a piece of Viking history with a hand-forged battle axe and a round shield.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Helmets & Chainmail Lot",
            'description' => "<p>This lot features a selection of medieval helmets and chainmail armor. Included are a Norman-style helmet, a 13th-century great helm, and a set of chainmail coifs and shirts. The helmets are forged from iron, and the chainmail has been preserved in excellent condition.</p><p>Ideal for collectors of medieval armor or as display pieces in a museum-quality collection.</p>",
            'summary' => "A diverse collection of medieval helmets and chainmail, perfect for collectors or reenactors.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Crossbow & Bolts Collection",
            'description' => "<p>This auction features an ancient medieval crossbow and an assortment of iron bolts. The crossbow is a hand-crafted example from the 15th century, capable of firing both wooden and iron-tipped bolts. It is paired with a collection of bolts, some dating back to the same period, each designed for use in warfare.</p><p>An excellent addition to any collection of medieval weapons.</p>",
            'summary' => "A rare medieval crossbow paired with a selection of historical bolts.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Sword & Shield Combo",
            'description' => "<p>This lot features a beautifully crafted medieval sword and accompanying shield. The sword is a 13th-century broadsword with a decorated hilt, while the shield is a kite-shaped design, often seen in the early Middle Ages. Both items have been restored and are in excellent condition for display or reenactment purposes.</p><p>This combination of sword and shield represents the pinnacle of medieval combat and is a must-have for collectors.</p>",
            'summary' => "A historic sword and shield combination, ideal for display or reenactment.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Royal Medieval Goblets & Chalices",
            'description' => "<p>Presenting a collection of royal medieval goblets and chalices. These gold and silver-plated vessels, used by nobles and royalty, are adorned with intricate designs and religious symbols. Each goblet represents the height of medieval craftsmanship, dating back to the 12th and 13th centuries.</p><p>This auction is perfect for collectors of medieval artifacts or those seeking a piece of noble history.</p>",
            'summary' => "A collection of royal goblets and chalices, adorned with exquisite designs and historical significance.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Longbow & Quiver Set",
            'description' => "<p>This auction features an authentic 15th-century longbow made from yew wood, along with a leather quiver filled with hand-crafted arrows. The bow has been meticulously restored to its original condition and is capable of achieving impressive range and power. The arrows are tipped with iron points.</p><p>An essential piece for enthusiasts of medieval archery or collectors of ancient weaponry.</p>",
            'summary' => "An authentic 15th-century longbow with a leather quiver and arrows, perfect for historical reenactment.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Knight's Sword, Shield & Dagger Set",
            'description' => "<p>This auction includes a knight's sword, shield, and dagger, all crafted from high-quality iron and steel. The sword, with its ornate hilt and long blade, was designed for battle. The shield is a classic kite shape, and the dagger, with its sharp point, was used in close combat.</p><p>Each item is an authentic representation of medieval knightly warfare, and they would make an excellent addition to any collection.</p>",
            'summary' => "A full set of knight's sword, shield, and dagger, perfect for collectors of medieval weaponry.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Archery Set: Bow, Quiver, and Arrows",
            'description' => "<p>Up for bid is a complete medieval archery set, including a powerful longbow, a leather quiver, and a selection of arrows. The bow is crafted from solid yew wood, known for its strength, while the arrows feature sharp iron tips for maximum damage in battle.</p><p>This archery set would be a perfect addition to any medieval reenactor's arsenal or historical collection.</p>",
            'summary' => "A complete medieval archery set, including a longbow, quiver, and arrows.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Knight's Cloak & Garb Collection",
            'description' => "<p>This auction presents a collection of medieval knight's cloaks and garments, featuring several well-preserved tunics, capes, and decorative belts. Each piece is crafted from wool, linen, and leather, and adorned with heraldic symbols and embroidery.</p><p>These items offer an insight into the daily life of knights and their noble attire during the Middle Ages.</p>",
            'summary' => "A collection of medieval knight's cloaks and garments, perfect for reenactors or historical enthusiasts.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Ceremonial Sword & Dagger Set",
            'description' => "<p>This lot includes a ceremonial sword and dagger set, both designed for display rather than battle. The sword features an elaborate hilt with gold inlays, and the dagger has an intricately carved wooden handle. Both pieces were crafted during the 14th century for use in royal ceremonies and events.</p><p>These items are ideal for collectors looking to add a touch of medieval elegance to their collection.</p>",
            'summary' => "A beautiful ceremonial sword and dagger set, crafted for royal events in the 14th century.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Leather Armor & Belt Set",
            'description' => "<p>This auction features a complete medieval leather armor set, including a well-crafted tunic and a matching belt adorned with metal buckles. The leather armor offers both protection and flexibility, ideal for a range of historical reenactments.</p><p>Complete with intricate stitching and reinforced seams, this set is a fine example of medieval craftsmanship.</p>",
            'summary' => "A complete medieval leather armor set, including a tunic and belt.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Battle Axe & Shield Combo",
            'description' => "<p>This auction includes a well-crafted medieval battle axe with a sturdy wooden handle, and a round, iron-bound shield. The axe, with its broad blade, was used by warriors during the Middle Ages for both battle and chopping wood. The shield is reinforced with iron, making it an effective defensive tool in combat.</p><p>This combination of axe and shield is ideal for collectors and historical reenactors.</p>",
            'summary' => "A medieval battle axe paired with a sturdy iron-bound shield, perfect for collectors.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Falconry Equipment: Gloves, Hood, & Gag",
            'description' => "<p>This auction offers a set of medieval falconry equipment, including leather gloves, a falcon hood, and a bird gag. The gloves, crafted from fine leather, offer protection while handling birds of prey. The hood and gag are designed to keep the birds calm during transport and training.</p><p>These items provide a rare glimpse into the noble sport of falconry, practiced during the medieval period.</p>",
            'summary' => "A collection of medieval falconry equipment, including gloves, hood, and gag.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Manuscripts & Illuminated Books",
            'description' => "<p>This auction includes several illuminated medieval manuscripts and religious books, each hand-copied and adorned with intricate gold leaf decorations. The texts include both religious and historical writings, offering insight into the medieval understanding of the world.</p><p>These manuscripts are rare examples of medieval scholarship and artistry, perfect for collectors or historians.</p>",
            'summary' => "A selection of rare medieval manuscripts and illuminated religious texts.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Tapestries & Wall Hangings",
            'description' => "<p>This auction features a set of medieval tapestries, each telling a different story through intricate weaving and vibrant dyes. The designs include scenes from medieval battles, royal courts, and religious events, reflecting the artistry and culture of the period.</p><p>These tapestries would make a stunning addition to any home or collection focused on medieval history.</p>",
            'summary' => "A selection of medieval tapestries, each depicting scenes from the Middle Ages.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Sword & Shield of the Crusades",
            'description' => "<p>Included in this auction is a sword and shield set that dates back to the Crusades. The sword, crafted with a cross-shaped hilt, was used by knights during the holy wars. The shield features a unique emblem and is reinforced with iron edges for added protection in battle.</p><p>These items offer a tangible connection to the legendary Crusades and the warriors who fought in them.</p>",
            'summary' => "A sword and shield set from the Crusades, offering a historical glimpse into medieval warfare.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);

        DB::table('auctions')->insert([
            'title' => "Medieval Weaponry & Armor Collection",
            'description' => "<p>This comprehensive auction includes an array of medieval weaponry, including swords, axes, and maces, along with full armor sets. Each item is historically accurate and made from high-quality materials such as iron, steel, and leather. The armor sets include helmets, gauntlets, and cuirasses.</p><p>Perfect for anyone interested in medieval combat or collectors of historical arms and armor.</p>",
            'summary' => "A complete collection of medieval weaponry and armor, including swords, axes, and full suits of armor.",
            'auction_date' => '2026-06-12',
            'auction_time' => '14:00'
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('auction');
    }
};
