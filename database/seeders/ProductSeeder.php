<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
   public function run(): void
   {
      DB::table('products')->insert([
         'title' => 'Пепперони',
         'image_path' => 'images/products/Пепперони.png',
         'image_url' => config('app.url') . '/storage/images/products/Пепперони.png',
         'description_short' => 'Пикантная пепперони, увеличенная порция моцареллы, томаты, фирменный томатный соус',
         'description_full' => '',
         'price_default' => 699,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Баварская',
         'image_path' => 'images/products/Баварская.png',
         'image_url' => config('app.url') . '/storage/images/products/Баварская.png',
         'description_short' => 'Бекон, митболы, моцарелла, томаты, шампиньоны, сладкий перец, красный лук, чеснок, фирменный томатный соус',
         'description_full' => '',
         'price_default' => 799,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Мясная',
         'image_path' => 'images/products/Мясная.png',
         'image_url' => config('app.url') . '/storage/images/products/Мясная.png',
         'description_short' => 'Мортаделла, соус песто, моцарелла, кубики брынзы и фирменный томатный соус',
         'description_full' => '',
         'price_default' => 899,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Вегетарианская',
         'image_path' => 'images/products/Вегетарианская.png',
         'image_url' => config('app.url') . '/storage/images/products/Вегетарианская.png',
         'description_short' => 'Шампиньоны, ароматный грибной соус, лук, сухой чеснок, моцарелла, смесь сыров чеддер и пармезан, фирменный соус альфредо',
         'description_full' => '',
         'price_default' => 599,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Грибная',
         'image_path' => 'images/products/Грибная.png',
         'image_url' => config('app.url') . '/storage/images/products/Грибная.png',
         'description_short' => 'Шампиньоны, ароматный грибной соус, лук, сухой чеснок, моцарелла, смесь сыров чеддер и пармезан',
         'description_full' => '',
         'price_default' => 649,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Чоризо',
         'image_path' => 'images/products/Чоризо.png',
         'image_url' => config('app.url') . '/storage/images/products/Чоризо.png',
         'description_short' => 'Острые колбаски чоризо, сладкий перец, моцарелла, фирменный томатный соус',
         'description_full' => '',
         'price_default' => 749,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Сытная',
         'image_path' => 'images/products/Сытная.png',
         'image_url' => config('app.url') . '/storage/images/products/Сытная.png',
         'description_short' => 'Шампиньоны, томаты, сладкий перец, красный лук, кубики брынзы, моцарелла',
         'description_full' => '',
         'price_default' => 899,
         'is_active' => true,
         'category_id' => 1,
      ]);

      DB::table('products')->insert([
         'title' => 'Сэндвич с ветчиной',
         'image_path' => 'images/products/Сэндвич с ветчиной.png',
         'image_url' => config('app.url') . '/storage/images/products/Сэндвич с ветчиной.png',
         'description_short' => 'Знакомое сочетание ветчины, цыпленка, моцареллы со свежими томатами, соусом и чесноком',
         'description_full' => '',
         'price_default' => 349,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Сэндвич по домашнему 2 шт.',
         'image_path' => 'images/products/Сэндвич по домашнему 2 шт..png',
         'image_url' => config('app.url') . '/storage/images/products/Сэндвич по домашнему 2 шт..png',
         'description_short' => 'Ветчина, сыр, зелень и помидоры в свежем тосте',
         'description_full' => '',
         'price_default' => 199,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Картофель фри',
         'image_path' => 'images/products/Картофель фри.png',
         'image_url' => config('app.url') . '/storage/images/products/Картофель фри.png',
         'description_short' => 'Вкуснейшая картошка фри, 150г.',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Нагетсы с картошкой фри',
         'image_path' => 'images/products/Нагетсы с картошкой фри.png',
         'image_url' => config('app.url') . '/storage/images/products/Нагетсы с картошкой фри.png',
         'description_short' => 'Нежное куриное мясо в хрустящей панировке с картошечкой',
         'description_full' => '',
         'price_default' => 499,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Салат Цезарь',
         'image_path' => 'images/products/Салат Цезарь.png',
         'image_url' => config('app.url') . '/storage/images/products/Салат Цезарь.png',
         'description_short' => 'Цыпленок, свежие листья салата, сыры чеддер и пармезан, соус цезарь, пшеничные гренки, итальянские травы',
         'description_full' => '',
         'price_default' => 299,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Цезарь-ролл',
         'image_path' => 'images/products/Цезарь-ролл.png',
         'image_url' => config('app.url') . '/storage/images/products/Цезарь-ролл.png',
         'description_short' => 'Куриное мясо в хрустящей панировке, ломтик помидора, листья салата и ломтики сыра, заправленные специальным соусом и завёрнутые в пшеничную лепешку',
         'description_full' => '',
         'price_default' => 249,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Шаурма Крафт',
         'image_path' => 'images/products/Шаурма Крафт.png',
         'image_url' => config('app.url') . '/storage/images/products/Шаурма Крафт.png',
         'description_short' => 'Выбери ингредиенты и сделай шаурму своей мечты!',
         'description_full' => '',
         'price_default' => 220,
         'is_active' => true,
         'category_id' => 2,
      ]);

      DB::table('products')->insert([
         'title' => 'Чизкейк шоколадный',
         'image_path' => 'images/products/Чизкейк шоколадный.png',
         'image_url' => config('app.url') . '/storage/images/products/Чизкейк шоколадный.png',
         'description_short' => 'Нежный сырно-творожный десерт на основе толченого печенья',
         'description_full' => '',
         'price_default' => 199,
         'is_active' => true,
         'category_id' => 3,
      ]);

      DB::table('products')->insert([
         'title' => 'Капкейк нежный',
         'image_path' => 'images/products/Капкейк нежный.png',
         'image_url' => config('app.url') . '/storage/images/products/Капкейк нежный.png',
         'description_short' => 'Домашний капкейк, приготовленный с любовью',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 3,
      ]);

      DB::table('products')->insert([
         'title' => 'Пирожное Радость',
         'image_path' => 'images/products/Пирожное Радость.png',
         'image_url' => config('app.url') . '/storage/images/products/Пирожное Радость.png',
         'description_short' => 'Нежный бисквит в заварном креме с ягодами',
         'description_full' => '',
         'price_default' => 299,
         'is_active' => true,
         'category_id' => 3,
      ]);

      DB::table('products')->insert([
         'title' => 'Латте',
         'image_path' => 'images/products/Латте.png',
         'image_url' => config('app.url') . '/storage/images/products/Латте.png',
         'description_short' => 'Классический латте с нежной молочной пенкой',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 4,
      ]);

      DB::table('products')->insert([
         'title' => 'Капучино',
         'image_path' => 'images/products/Капучино.png',
         'image_url' => config('app.url') . '/storage/images/products/Капучино.png',
         'description_short' => 'Для любителей сбалансированного кофейно-молочного вкуса',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 4,
      ]);

      DB::table('products')->insert([
         'title' => 'Американо',
         'image_path' => 'images/products/Американо.png',
         'image_url' => config('app.url') . '/storage/images/products/Американо.png',
         'description_short' => 'Идеальный горячий напиток, раскрывает глубокий, богатый вкус эспрессо с более легкой консистенцией',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 4,
      ]);

      DB::table('products')->insert([
         'title' => 'Макиато',
         'image_path' => 'images/products/Макиато.png',
         'image_url' => config('app.url') . '/storage/images/products/Макиато.png',
         'description_short' => 'Кофейный напиток, изготавливаемый из порции эспрессо и небольшого количества молока',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 4,
      ]);

      DB::table('products')->insert([
         'title' => 'Добрый кола',
         'image_path' => 'images/products/Добрый кола.png',
         'image_url' => config('app.url') . '/storage/images/products/Добрый кола.png',
         'description_short' => 'Освежающий напиток, 0.5л',
         'description_full' => '',
         'price_default' => 99,
         'is_active' => true,
         'category_id' => 5,
      ]);

      DB::table('products')->insert([
         'title' => 'Добрый апельсин',
         'image_path' => 'images/products/Добрый апельсин.png',
         'image_url' => config('app.url') . '/storage/images/products/Добрый апельсин.png',
         'description_short' => 'Вкус свежего апельсина, 0.5л',
         'description_full' => '',
         'price_default' => 99,
         'is_active' => true,
         'category_id' => 5,
      ]);

      DB::table('products')->insert([
         'title' => 'Чесночный соус',
         'image_path' => 'images/products/Чесночный соус.png',
         'image_url' => config('app.url') . '/storage/images/products/Чесночный соус.png',
         'description_short' => 'Фирменный соус с чесночным вкусом, 25 г',
         'description_full' => '',
         'price_default' => 29,
         'is_active' => true,
         'category_id' => 6,
      ]);

      DB::table('products')->insert([
         'title' => 'Васаби',
         'image_path' => 'images/products/Васаби.png',
         'image_url' => config('app.url') . '/storage/images/products/Васаби.png',
         'description_short' => 'Острый васаби, 25 г',
         'description_full' => '',
         'price_default' => 29,
         'is_active' => true,
         'category_id' => 6,
      ]);

      DB::table('products')->insert([
         'title' => 'Кетчуп',
         'image_path' => 'images/products/Кетчуп.png',
         'image_url' => config('app.url') . '/storage/images/products/Кетчуп.png',
         'description_short' => 'Вкусный кетчуп, 25 г',
         'description_full' => '',
         'price_default' => 29,
         'is_active' => true,
         'category_id' => 6,
      ]);

      DB::table('products')->insert([
         'title' => 'Колпак',
         'image_path' => 'images/products/Колпак.png',
         'image_url' => config('app.url') . '/storage/images/products/Колпак.png',
         'description_short' => 'Праздничный колпак, 4шт',
         'description_full' => '',
         'price_default' => 149,
         'is_active' => true,
         'category_id' => 7,
      ]);
   }
}
