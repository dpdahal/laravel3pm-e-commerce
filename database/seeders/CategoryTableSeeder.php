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
            ['section_id' => 1, 'parent_id' => null, 'name' => "Clothing","slug"=>"Clothing"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Footwear","slug"=>"footwear"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Watches","slug"=>"watches"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Bags, Wallets & Belts","slug"=>"bags-wallets-belts"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Fashion Accessories","slug"=>"fashion-accessories"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Lingerie & Sleepwear","slug"=>"lingerie-sleepwear"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Jewellery","slug"=>"jewellery"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Sunglasses","slug"=>"sunglasses"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Socks","slug"=>"socks"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Clothing Accessories","slug"=>"clothing-accessories"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Dress Materials","slug"=>"dress-materials"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Combo Sets","slug"=>"combo-sets"],
            ['section_id' => 1, 'parent_id' => null, 'name' => "Sports & Gym Wear","slug"=>"sports-gym-wear"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Makeup","slug"=>"makeup"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Skincare","slug"=>"skincare"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Premium Beauty","slug"=>"premium-beauty"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Lipsticks","slug"=>"lipsticks"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Fragrances","slug"=>"fragrances"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Hair Care","slug"=>"hair-care"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Personal Care","slug"=>"personal-care"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Baby & Kids","slug"=>"baby-kids"],
            ['section_id' => 2, 'parent_id' => null, 'name' => "Health Care","slug"=>"health-care"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Mobiles","slug"=>"mobiles"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Mobile Accessories","slug"=>"mobile-accessories"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Laptops","slug"=>"laptops"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Camera","slug"=>"camera"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Printer & Ink","slug"=>"printer-ink"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Computer Accessories","slug"=>"computer-accessories"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Storage","slug"=>"storage"],
            ['section_id' => 3, 'parent_id' => null, 'name' => "Network Components","slug"=>"network-components"],


        ];

        foreach ($categoryData as $data) {
            $find = Category::where('name', $data['name'])->first();
            if (!$find) {
                Category::create($data);
            }
        }
    }
}
