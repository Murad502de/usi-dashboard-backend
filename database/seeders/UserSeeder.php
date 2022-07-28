<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      [
        'number'  => '209',
        'name'    => 'Оператор Дост - Гайдамут Екатерина',
        'ats'     => 'КРД Оператор Дост',
        'tag'     => 'Оператор Дост',
        'label'   => '',
      ],

      [
        'number'  => '212',
        'name'    => 'Оператор Дост 2 - Перепелкина Анастасия',
        'ats'     => 'КРД Опер Дост 2',
        'tag'     => 'Оператор Дост',
        'label'   => '',
      ],

      [
        'number'  => '215',
        'name'    => 'Оператор Дост 3 - Морозова Виктория',
        'ats'     => 'КРД Оператор Дост 3',
        'tag'     => 'Оператор Дост',
        'label'   => '',
      ],

      [
        'number'  => '214',
        'name'    => 'Оператор Губер - Горезина Наталья',
        'ats'     => 'КРД Оператор Горезина',
        'tag'     => 'Оператор КРД',
        'label'   => '',
      ],

      [
        'number'  => '218',
        'name'    => 'Оператор Губер - Головинова Эльмира',
        'ats'     => 'КРД Оператор Головина',
        'tag'     => 'Оператор КРД',
        'label'   => '',
      ],

      [
        'number'  => '202',
        'name'    => 'Оператор Губер - Калядина Ирина',
        'ats'     => 'КРД Оператор',
        'tag'     => 'Оператор КРД',
        'label'   => '',
      ],

      [
        'number'  => '201',
        'name'    => 'Богачева Елена',
        'ats'     => 'КРД  Богачева',
        'tag'     => '',
        'label'   => 'Вх Богачева',
      ],

      [
        'number'  => '203',
        'name'    => 'Бухтиярова Анастасия',
        'ats'     => 'КРД  Бухтиярова',
        'tag'     => '',
        'label'   => 'Вх Бухтиярова',
      ],

      [
        'number'  => '207',
        'name'    => 'Караваева Ксения',
        'ats'     => 'КРД  Караваева',
        'tag'     => '',
        'label'   => 'Вх Караваева',
      ],

      [
        'number'  => '208',
        'name'    => 'Кравченко Эльмира',
        'ats'     => 'КРД  Кравченко',
        'tag'     => '',
        'label'   => 'Вх Кравченко',
      ],

      [
        'number'  => '204',
        'name'    => 'Тиханович Алена',
        'ats'     => 'КРД Тиханович',
        'tag'     => '',
        'label'   => 'Вх Тиханович',
      ],

      [
        'number'  => '210',
        'name'    => 'Мишина Валентина',
        'ats'     => 'КРД  Мишина',
        'tag'     => '',
        'label'   => 'Вх Мишина',
      ],

      [
        'number'  => '206',
        'name'    => 'Павлова Анастасия',
        'ats'     => 'КРД  Павлова',
        'tag'     => '',
        'label'   => 'Вх Павлова',
      ],

      [
        'number'  => '217',
        'name'    => 'Волкова Ольга',
        'ats'     => 'КРД  Волкова',
        'tag'     => '',
        'label'   => 'Вх Волкова',
      ],

      [
        'number'  => '216',
        'name'    => 'Кустадинчева Анна',
        'ats'     => 'КРД  Кустадинчева',
        'tag'     => '',
        'label'   => 'Вх Кустадинчева',
      ],

      [
        'number'  => '205',
        'name'    => 'Степанова Елена',
        'ats'     => 'КРД Степанова',
        'tag'     => '',
        'label'   => 'Вх Степанова',
      ],

      [
        'number'  => '304',
        'name'    => 'Оператор - Лещева Кристина',
        'ats'     => 'СТВ Оператор',
        'tag'     => 'Оператор СТВ',
        'label'   => '',
      ],

      [
        'number'  => '307',
        'name'    => 'Оператор - Нестеренко Алена',
        'ats'     => 'СТВ Нестеренко',
        'tag'     => 'Оператор СТВ',
        'label'   => '',
      ],

      [
        'number'  => '301',
        'name'    => 'Никитина Е.',
        'ats'     => 'СТВ  Никитина',
        'tag'     => '',
        'label'   => 'Вх Никитина',
      ],

      [
        'number'  => '305',
        'name'    => 'Василенко А.',
        'ats'     => 'СТВ  Василенко',
        'tag'     => '',
        'label'   => 'Вх Василенко',
      ],

      [
        'number'  => '302',
        'name'    => 'Скрынченко Н.',
        'ats'     => 'СТВ  Скрынченко',
        'tag'     => '',
        'label'   => 'Вх Скрынченко',
      ],

      [
        'number'  => '306',
        'name'    => 'Басова К.',
        'ats'     => 'СТВ  Басова',
        'tag'     => '',
        'label'   => 'Вх Басова',
      ],

      [
        'number'  => '409',
        'name'    => 'Оператор Карина',
        'ats'     => 'РНД Оператор Карина',
        'tag'     => 'Оператор РНД',
        'label'   => '',
      ],

      [
        'number'  => '404',
        'name'    => 'Оператор Диана',
        'ats'     => 'РНД Оператор Диана',
        'tag'     => 'Оператор РНД',
        'label'   => '',
      ],

      [
        'number'  => '401',
        'name'    => 'Теряева В.',
        'ats'     => 'РНД Теряева',
        'tag'     => '',
        'label'   => 'Вх Теряева',
      ],

      [
        'number'  => '407',
        'name'    => 'Рябикина В.',
        'ats'     => 'РНД Рябикина',
        'tag'     => '',
        'label'   => 'Вх Рябикина',
      ],

      [
        'number'  => '410',
        'name'    => 'Халадзе А.',
        'ats'     => 'РНД Халадзе ',
        'tag'     => '',
        'label'   => 'Вх Халадзе',
      ],

      [
        'number'  => '403',
        'name'    => 'Шепель Ю.',
        'ats'     => 'РНД Шепель',
        'tag'     => '',
        'label'   => 'Вх Шепель',
      ],

      [
        'number'  => '408',
        'name'    => 'Ермадова Р.',
        'ats'     => 'РНД Ермадова',
        'tag'     => '',
        'label'   => 'Вх Ермадова',
      ],

      [
        'number'  => '411',
        'name'    => 'Захарова Э.',
        'ats'     => 'РНД Захарова',
        'tag'     => '',
        'label'   => 'Вх Захарова',
      ],
    ];

    foreach ($users as $user) {
      DB::table('users')->insert($user);
    }
  }
}
