<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Parents','Sibling','BF','GF','BFF','Boss','Collegeue','Enemy','Handsome','Ugly','Old','Young'];
        $tagsDummy = [];

        foreach($tags as $tag){
            $tagsDummy[] = [
                'tag_name' => $tag,
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Tag::insert($tagsDummy);
    }
}
