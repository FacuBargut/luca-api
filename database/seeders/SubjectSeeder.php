<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $subjects = [ ['name'=>'Matemáticas'],
                      ['name'=>'Historia'],
                      ['name'=>'Lengua'],
                      ['name'=>'Geografía'],
    ];

        foreach ($subjects as $subject) {
            \App\Models\Subject::create($subject);
        }
    }
}
