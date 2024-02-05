<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Coffee
        Product::create([
            'product_name' => 'Espresso',
            'description' => 'A strong and concentrated coffee made by forcing hot water through finely-ground coffee beans. It forms the base for many other coffee drinks.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Espresso',
        ]);

        Product::create([
            'product_name' => 'Americano',
            'description' => 'Made by diluting a shot of espresso with hot water, resulting in a milder flavor similar to drip coffee.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Americano',
        ]);

        Product::create([
            'product_name' => 'Latte',
            'description' => ' A coffee drink made with espresso and steamed milk, often topped with a small amount of milk foam.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Latte',
        ]);

        Product::create([
            'product_name' => 'Cappuccino',
            'description' => 'Consists of equal parts of espresso, steamed milk, and milk foam, creating a balanced and creamy taste.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Cappuccino',
        ]);

        Product::create([
            'product_name' => 'Mocha',
            'description' => 'A latte with chocolate syrup or cocoa powder added, offering a delightful blend of coffee and chocolate flavors.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Mocha',
        ]);

        Product::create([
            'product_name' => 'Macchiato',
            'description' => 'An espresso "stained" or "marked" with a small amount of milk or milk foam, available in various flavors such as caramel or vanilla.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Macchiato',
        ]);

        Product::create([
            'product_name' => 'Flat White',
            'description' => 'Similar to a latte but with a higher coffee-to-milk ratio and a velvety microfoam, resulting in a bold coffee taste.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Flat-White',
        ]);

        Product::create([
            'product_name' => 'Cold Brew',
            'description' => ' Coffee brewed with cold water over an extended period, resulting in a smooth and less acidic flavor profile.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Cold-Brew',
        ]);

        Product::create([
            'product_name' => 'Iced Coffee',
            'description' => 'Regular brewed coffee that is chilled and served over ice, often customizable with sweeteners and milk.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '1',
            'image' => 'Iced-Coffee',
        ]);

        //None Coffee Drink
        Product::create([
            'product_name' => 'Tea',
            'description' => 'Various types of tea, including black, green, herbal, and more, served hot or cold.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Tea',
        ]);

        Product::create([
            'product_name' => 'Chai Latte',
            'description' => ' A spiced tea drink made with steamed milk, often containing a blend of spices like cinnamon, cardamom, and ginger.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Chai-Latte',
        ]);

        Product::create([
            'product_name' => 'Hot Chocolate',
            'description' => 'A comforting beverage made with milk and chocolate, often topped with whipped cream or marshmallows.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Hot-Chocolate',
        ]);

        Product::create([
            'product_name' => 'Smoothies',
            'description' => 'Blended fruit or vegetable drinks, sometimes enhanced with yogurt, protein powder, or other supplements.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Smoothies',
        ]);

        Product::create([
            'product_name' => 'Fresh Juices',
            'description' => 'Made from a variety of fruits and vegetables, providing a refreshing and nutritious option.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Fresh-Juices',
        ]);

        Product::create([
            'product_name' => 'Fruit Drinks',
            'description' => 'Flavored beverages made from fruits, typically served cold and perfect for quenching thirst.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Fruit-Drinks',
        ]);

        Product::create([
            'product_name' => 'Infused Water',
            'description' => 'Water infused with fruits, herbs, or other natural ingredients for added flavor.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '2',
            'image' => 'Infused-Water',
        ]);

        //Breakfast
        Product::create([
            'product_name' => 'Eggs',
            'description' => 'Prepared in different styles, such as sunny-side up, boiled, or scrambled, offering a protein-rich breakfast option.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '3',
            'image' => 'Eggs',
        ]);

        Product::create([
            'product_name' => 'Bacon, Sausage, or Ham',
            'description' => 'Classic breakfast meats that provide savory flavors and complement other breakfast items.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '3',
            'image' => 'Bacon-Sausage-or-Ham',
        ]);

        Product::create([
            'product_name' => 'Pancakes and Waffles',
            'description' => 'Fluffy and golden breakfast staples, often served with syrup and butter.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '3',
            'image' => 'Pancakes-and-Waffles',
        ]);

        Product::create([
            'product_name' => 'French Toast',
            'description' => 'Slices of bread soaked in a mixture of eggs and milk, then fried and often topped with sweet toppings.',
            'price' => '100',
            'stock' => '100',
            'category_product_id' => '3',
            'image' => 'FrenchToast',
        ]);
    }
}
