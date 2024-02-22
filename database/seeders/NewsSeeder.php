<?php

namespace Database\Seeders;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $currentDate = Carbon::now(); //fecha del momento actual
        DB::table('news')->insert([

            [
                'news_id' => 1,
                'title' => "¿Te sentís hinchado y tenés panza?",
                'subtitle' => "Practicar esta postra de yoga durante diez minutos al día desinflama el abdomen",
                'author' => "sol.vallejos@hotmail.com",
                'news_date' => '2018-09-02',
                'body' => "El yoga es de las actividades físicas que más se practica en la actualidad. Además de los beneficios para el cuerpo, la práctica prolongada hace bien a la mente y según los adeptos al “espíritu”. Sus seguidores más fieles alientan a convertirlo en un hábito de vida para poder disfrutar de todo su poder sanador.

            Muchas de sus posturas pueden hacerse fuera del contexto de una clase de yoga, sin ir más lejos, desde la comodidad de la casa. Justamente, Viparita Karani es el nombre que se le atribuye a una de las poses de yoga más calmantes y nutritivas tanto para la mente como para el cuerpo. Entre sus beneficios se encuentran la mejora en la digestión, el aumento de la circulación de la sangre y la deshinchazón y desinflamación del cuerpo.",
                'cover' => '20230619002222_te-sentis-hinchado-y-tenes-panza.jpg',
                'cover_description' => 'practica-milenaria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'news_id' => 2,
                'title' => "Una práctica milenaria",
                'subtitle' => "La disciplina que con simples movimientos de manos podés bajar el estrés y tener más energía ",
                'author' => "sol.vallejos@hotmail.com",
                'news_date' => '2020-09-02',
                'body' => "Las manos pueden ser una herramienta fundamental para disminuir el estrés, aumentar la energía o ayudar a regular funciones vitales. Desde el budismo y el hinduismo, los mudras se definen tradicionalmente como gestos que se realizan con las manos y ayudan a canalizar la energía. Yamila Bellsolá, profesora de yoga y directora del Centro Ananda Yoga, señala que las manos poseen una gran cantidad de terminaciones nerviosas que se activan a partir del contacto que generan estos gestos, y ayudan a conectar a su vez con terminales nerviosas cerebrales.

                La práctica de mudras tiene un origen milenario y se asocia generalmente a otras disciplinas como la meditación, la práctica de posturas de yoga o la entonación de mantras (sonidos y cantos). “En general se recomienda hacer un mudra específico mientras se está meditando. Cada uno tiene una simbología o función que, al asociarse a esta práctica, potencia sus beneficios”, explica Yamila Bellsolá, quien señala que también se puede hacer un mudra y quedarse unos minutos, al menos cinco, con los ojos cerrados, conectando y sintiendo sus efectos.",
                'cover' => '20230619002313_una-practica-milenaria.jpg',
                'cover_description' => 'practica-milenaria',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
