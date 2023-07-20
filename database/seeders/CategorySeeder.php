<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $simples = ['Uncategorized','Family','Partner','Friends','Work','School'];
        // 6 
        $dummyCat = [];
        foreach($simples as $simple){
            $dummyCat[] = [
                'category_name' => $simple,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Category::insert($dummyCat);
    }
}
