<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlatMusik;

class AlatMusikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlatMusik::create([
            'nama' => 'Piano Klasik',
            'foto' => 'storage/alat_musik/piano-klasik.jpg',
            'deskripsi' => 'Piano klasik adalah piano yang digunakan untuk memainkan musik klasik, seperti karya Beethoven dan Mozart. Piano adalah instrumen keyboard besar yang dimainkan dengan menekan tuts hitam putih. Saat tuts ditekan, sebuah palu kecil memukul senar dan menghasilkan nada. Piano memiliki jangkauan suara yang luas dan dapat memainkan akord dengan bebas.'
        ]);
        AlatMusik::create([
            'nama' => 'Piano Pop',
            'foto' => 'storage/alat_musik/piano-pop.jpeg',
            'deskripsi' => 'Piano pop adalah gaya bermain piano dengan memainkan lagu-lagu pop yang memiliki melodi dan harmoni berdasarkan simbol akord. Piano pop menggunakan instrumen yang sama dengan piano klasik, yaitu piano.'
        ]);
        AlatMusik::create([
            'nama' => 'Gitar Klasik',
            'foto' => 'storage/alat_musik/gitar-klasik.jpeg',
            'deskripsi' => 'Gitar klasik adalah jenis gitar akustik yang biasanya digunakan dalam musik klasik. Gitar klasik memiliki ciri khas pada senarnya yang terbuat dari nilon dan pada umumnya memiliki 19 fret. Gitar klasik cenderung menghasilkan suara yang lebih lembut dibandingkan dengan suara gitar akustik yang lebih bright. Gitar klasik seringkali dipilih oleh pemula karena senar nilon lebih mudah ditekan dengan jari-jari daripada senar baja yang dimiliki gitar akustik.'
        ]);
        AlatMusik::create([
            'nama' => 'Gitar Elektrik',
            'foto' => 'storage/alat_musik/gitar-elektrik.jpeg',
            'deskripsi' => 'Gitar elektrik adalah alat musik petik yang menggunakan amplifikasi elektronik untuk mengubah getaran senar menjadi arus listrik. Arus listrik ini kemudian ditangkap dan diperkuat oleh amplifier eksternal atau speaker, sehingga gitar dapat diputar pada volume yang lebih keras.'
        ]);
        AlatMusik::create([
            'nama' => 'Bass',
            'foto' => 'storage/alat_musik/bass.webp',
            'deskripsi' => 'Bass adalah alat musik ritmis yang dimainkan dengan cara dipetik. Bass digunakan untuk memainkan nada yang rendah, mendekati rentang batas pendengaran manusia. Bass umum digunakan dalam berbagai genre musik, termasuk musik rock, jazz, funk, metal, blues, country, dan pop.            '
        ]);
        AlatMusik::create([
            'nama' => 'Drum',
            'foto' => 'storage/alat_musik/drum.webp',
            'deskripsi' => 'Drum, genderang atau tambur adalah kelompok alat musik perkusi yang terdiri dari kulit yang direntangkan dan dipukul dengan tangan atau sebuah batang atau biasanya disebut Stick drum. Selain kulit, drum juga digunakan dari bahan lain, misalnya plastik.'
        ]);
        AlatMusik::create([
            'nama' => 'Keyboard',
            'foto' => 'storage/alat_musik/keyboard.jpg',
            'deskripsi' => 'Keyboard piano, atau digital piano keyboard, adalah alat musik elektronik yang dimainkan dengan cara ditekan dan menyerupai piano. Keyboard piano memiliki tuts yang tidak berbobot dan lebih ringan daripada piano, yang merupakan instrumen akustik dengan tuts berbobot. Keyboard piano juga tidak memiliki pedal di bawahnya dan memiliki bentuk yang lebih sederhana, sehingga lebih mudah untuk dibawa ke mana-mana.'
        ]);
        AlatMusik::create([
            'nama' => 'Biola',
            'foto' => 'storage/alat_musik/biola.jpg',
            'deskripsi' => 'Biola adalah sebuah alat musik dawai yang dimainkan dengan cara digesek. Biola memiliki empat senar yang disetel berbeda satu sama lain dengan interval sempurna kelima. Nada yang paling rendah adalah G. Di antara keluarga biola, yaitu Viola, Selo dan Kontrabas, biola memiliki nada yang tertinggi.'
        ]);
        AlatMusik::create([
            'nama' => 'Saxophone',
            'foto' => 'storage/alat_musik/saxophone.jpg',
            'deskripsi' => 'Saxophone, atau saksofon, adalah alat musik tiup kayu yang terbuat dari kuningan dan berbentuk seperti cangklong rokok. Ia memiliki mulut tiup buluh tunggal dan dikategorikan sebagai aerophone, single-reed woodwind instrument. Saxophone diciptakan oleh Adolphe Sax, seorang pemain musik asal Belgia, pada awal tahun 1840 dan dipatenkan pada tahun 1846. Awalnya, saxophone ditujukan untuk musik orkestra dan band militer, tetapi saat ini sangat populer dalam musik jazz, blues, pop, rock, reggae, ska, dan dangdut.'
        ]);
        AlatMusik::create([
            'nama' => 'Flute',
            'foto' => 'storage/alat_musik/flute.webp',
            'deskripsi' => 'Flute, juga disebut seruling, adalah alat musik tiup yang termasuk dalam keluarga woodwind atau tiup kayu. Flute dapat dibuat dari berbagai bahan, seperti kayu, bambu, perak, emas, atau campuran keduanya. Flute modern untuk para ahli biasanya terbuat dari perak, emas, atau campuran keduanya, sedangkan flute untuk pelajar biasanya terbuat dari nikel-perak, atau logam yang dilapisi perak.'
        ]);
    }
}
