<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'name' => 'Apple iPhone 14 Pro',
                'description' => '256GB, Deep Purple, 6.1-inch Super Retina XDR display',
                'price' => 129900,
                'category' => 'Electronics',
                'image_url' => 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6487/6487406_sd.jpg',
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Breathable mesh upper, React foam midsole, stylish design.',
                'price' => 12999,
                'category' => 'Footwear',
                'image_url' => 'https://i8.amplience.net/i/jpl/jd_009289_a?qlt=92',
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Noise cancelling, over-ear headphones with 30h battery.',
                'price' => 26999,
                'category' => 'Electronics',
                'image_url' => 'https://m.media-amazon.com/images/I/41M7sHrx90L.jpg',
            ],
            [
                'name' => 'Wooden Study Table',
                'description' => 'Solid Sheesham wood desk with drawers and modern design.',
                'price' => 8999,
                'category' => 'Furniture',
                'image_url' => 'https://images.woodenstreet.de/image/data/study-tables-mdf/bracia-engineered-wood-study-table-exotic-teak-finish/exotic-teak-finish/1.jpg',
            ],
            [
                'name' => 'Apple MacBook Air M2',
                'description' => '13.6-inch Liquid Retina Display, 8GB RAM, 256GB SSD',
                'price' => 104900,
                'category' => 'Electronics',
                'image_url' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/macbook-air-midnight-select-20220606?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1654122880566',
            ],
            [
                'name' => 'Casual Denim Jacket',
                'description' => 'Men\'s classic denim jacket, slim fit, mid-wash.',
                'price' => 2199,
                'category' => 'Clothing',
                'image_url' => 'https://www.outfittrends.com/wp-content/uploads/2017/02/Denim-jacket-with-black-pants.jpeg',
            ],
            [
                'name' => 'Realme Smart TV 43"',
                'description' => 'Full HD LED Smart Android TV with Voice Assistant.',
                'price' => 22999,
                'category' => 'Electronics',
                'image_url' => 'https://blog.gowarranty.in/wp-content/uploads/2022/03/Frame-94.png',
            ],
        ]);
    }
}
