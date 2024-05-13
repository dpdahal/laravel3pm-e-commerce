<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoryData = [
            ['section_id' => 1, 'parent_id' => null, 'category_name' => "Clothing","slug"=>"Clothing"],
            ['section_id' => 3, 'parent_id' => null, 'category_name' => "Laptop","slug"=>"laptop"],



        ];

        foreach ($categoryData as $data) {
            $find = Category::where('category_name', $data['category_name'])->first();
            if (!$find) {
                Category::create($data);
            }
        }
    }
}
