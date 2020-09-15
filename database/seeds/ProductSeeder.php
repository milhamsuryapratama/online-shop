<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = \App\Models\Category::whereCategoryName('Makanan')->first();
        $products = [
            [
                'product_name' => 'Silver Queen',
                'slug' => 'silver-queen',
                'description' => '<p>Silver Queen adalah salah satu merek cokelat terkenal di Indonesia. Didirikan sejak tahun 1950, perusahaan ini beroperasi dibawah naungan PT Petra Food kerjasama dengan Procter &amp; Gamble di Dunia yang juga mengelola Ceres dan Delfi. Perusahaan berka',
                'price' => 5000,
                'stock' => 20,
                'picture' => '5f607bdd20b03_silverqueen 2.jpg',
                'category_id' => $category->id
            ],
            [
                'product_name' => 'Oreo Coklat',
                'slug' => 'oreo-coklat',
                'description' => '<p>Oreo adalah nama dagang dari sejenis biskuit yang diproduksi oleh Nabisco, dibuat pertama kali pada 1912. Terdiri dari dua biskuit coklat dengan krim putih di tengahnya. Salah satu cara populer untuk memakan Oreo adalah dengan mencelupkannya ke dalam s',
                'price' => 1000,
                'stock' => 20,
                'picture' => '5f607f7c1064d_oreo.jpg',
                'category_id' => $category->id
            ],
            [
                'product_name' => 'Cheetos Balado',
                'slug' => 'cheetos-balado',
                'description' => '<p>Cheetos adalah sebuah merek keripik jagung renyah yang diproduksi oleh Frito-Lay, keripik ini terasa gurih dan asam-asin di dalamnya, kraker ini tersedia dengan berbagai rasa, tetapi yang paling populer adalah keju.</p>',
                 'price' => 5000,
                'stock' => 20,
                'picture' => '5f607fb82a3ff_chetos.jpg',
                'category_id' => $category->id
            ],
            [
                'product_name' => 'Lays Keju',
                'slug' => 'lays-keju',
                'description' => '<p>Lays adalah nama merek sejumlah varietas keripik kentang serta nama produk yang membuat merek keripik pada 1932. Produk tersebut dimiliki oleh PepsiCo sejak 1965. Merek lainnya pada grup Frito-Lay meliputi Fritos, Doritos, Ruffles, Cheetos, Rold Gold, Munchos, Funyuns, dan Sun Chips.</p>',
                'price' => 7000,
                'stock' => 20,
                'picture' => '5f5f0524a04ab_lays.jpg',
                'category_id' => $category->id
            ],
            [
                'product_name' => 'Opps Keju',
                'slug' => 'opps-keju',
                'description' => '',
                'price' => 5000,
                'stock' => 20,
                'picture' => '5f601d1207708_makanan.png',
                'category_id' => $category->id
            ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
