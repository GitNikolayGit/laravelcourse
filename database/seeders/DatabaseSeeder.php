<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('defects')->insert([
            ['title'=>'Двигатель'],         // 0
            ['title'=>'Трансмиссия'],       // 1
            ['title'=>'Электрика'],         // 2
            ['title'=>'Кузов, оптика'],     // 3
            ['title'=>'Ходовая'],           // 4
            ['title'=>'Диагностика'],       // 5
        ]);

        DB::table('services')->insert([
            // 1 тормозная система 10
            [
                'title'=>'Замена тормозного шланга',
                'time'=>0.15,
                'price'=>800,
                'defect_id'=>5
            ],
            [
                'title'=>'Замена тормозных дисков',
                'time'=>0.33,
                'price'=>1200,
                'defect_id'=>5
            ],
            [//12
                'title'=>'Замена тормозной жидкости',
                'time'=>0.3,
                'price'=>1200,
                'defect_id'=>5
            ],
            [//13
                'title'=>'Замена передних тормозных колодок',
                'time'=>0.25,
                'price'=>700,
                'defect_id'=>5
            ],
            ['title'=>'Обслуживание тормозных механизмов',
                'time'=>0.5,
                'price'=>250,
                'defect_id'=>5
            ],
            ['title'=>'Замена троса ручного тормоза',//14
                'time'=>0.3,
                'price'=>1500,
                'defect_id'=>5
            ],
            ['title'=>'Регулировка ручного тормоза',
                'time'=>0.25,
                'price'=>300,
                'defect_id'=>5
            ],
            // 2 электрооборудование
            ['title'=>'Замена генератора',  // 15
                'time'=>0.25,
                'price'=>1500,
                'defect_id'=>3
            ],
            ['title'=>'Замена стартера',  // 16
                'time'=>0.25,
                'price'=>1500,
                'defect_id'=>3
            ],
            ['title'=>'Замена высоковольтных проводов',//17
                'time'=>0.3,
                'price'=>400,
                'defect_id'=>3
            ],
            ['title'=>'Замена свечей зажигания',//19
                'time'=>0.15,
                'price'=>600,
                'defect_id'=>3
            ],
            ['title'=>'Замена катушки зажигания',//18
                'time'=>0.1,
                'price'=>200,
                'defect_id'=>3
            ],
            ['title'=>'Замена реостата печки',//20
                'time'=>0.3,
                'price'=>1500,
                'defect_id'=>3
            ],
            ['title'=>'Замена электромотора стеклоподъемника',
                'time'=>0.4,
                'price'=>1500,
                'defect_id'=>3
            ],
            ['title'=>'Заменить реле поворотов',
                'time'=>0.15,
                'price'=>500,
                'defect_id'=>3
            ],
            ['title'=>'Замена лампочки без снятия фары',
                'time'=>0.1,
                'price'=>250,
                'defect_id'=>3
            ],
            ['title'=>'Снять и установить реле включения стартера',
                'time'=>0.22,
                'price'=>500,
                'defect_id'=>3
            ],
            ['title'=>'Снять и установить стартер',
                'time'=>0.25,
                'price'=>1500,
                'defect_id'=>3
            ],
            //3 ходовая
            ['title'=>'Демонтаж-монтаж поворотного кулака',
                'time'=>0.4,
                'price'=>2000,
                'defect_id'=>5
            ],
            ['title'=>'Демонтаж-монтаж  передней стойки амортизатора',
                'time'=>0.35,
                'price'=>1500,
                'defect_id'=>5
            ],
            ['title'=>'Замена  рычага продольного задней подвески',
                'time'=>0.33,
                'price'=>3000,
                'defect_id'=>5
            ],
            ['title'=>'Замена ступицы переднего колеса',
                'time'=>0.25,
                'price'=>1500,
                'defect_id'=>5
            ],
            ['title'=>'Замена подрамника передней подвески',
                'time'=>0.56,
                'price'=>3000,
                'defect_id'=>5
            ],
            ['title'=>'Замена ступицы заднего колеса',
                'time'=>0.33,
                'price'=>1500,
                'defect_id'=>5
            ],
            ['title'=>'Демонтаж-монтаж тормозного диска',
                'time'=>0.42,
                'price'=>1200,
                'defect_id'=>5
            ],
            // 4 двигатель
            ['title'=>'снять двигатель / поставить двигатель',
                'time'=>2.6,
                'price'=>20000,
                'defect_id'=>1
            ],
            ['title'=>'Капитальный ремонт двигателя (без запчастей)',
                'time'=>24,
                'price'=>35000,
                'defect_id'=>1
            ],
            ['title'=>'Замена головки блока цилиндров',
                'time'=>1.3,
                'price'=>1200,
                'defect_id'=>1
            ],
            ['title'=>'Обработка  седла клапана за 1 шт',
                'time'=>0.18,
                'price'=>300,
                'defect_id'=>1
            ],
            ['title'=>'Замена сальника коленчатого вала',
                'time'=>0.25,
                'price'=>500,
                'defect_id'=>1
            ],
            ['title'=>'Замена масла ДВС',
                'time'=>0.3,
                'price'=>500,
                'defect_id'=>1
            ],
            ['title'=>'Замена опоры ДВС верхней',
                'time'=>0.35,
                'price'=>800,
                'defect_id'=>1
            ],
            ['title'=>'Замена опоры ДВС нижней',
                'time'=>0.14,
                'price'=>1200,
                'defect_id'=>1
            ],
            ['title'=>'Замена прокладки крышки клапанов',
                'time'=>1.3,
                'price'=>1500,
                'defect_id'=>1
            ],
            // 5 кузовные малярные
            ['title'=>'Бампер передний-задний демонтаж монтаж',
                'time'=>0.5,
                'price'=>1500,
                'defect_id'=>4
            ],
            ['title'=>'Окрас бампера',
                'time'=>0.17,
                'price'=>7000,
                'defect_id'=>4
            ],
            ['title'=>'Крыло переднее демонтаж монтаж',
                'time'=>0.3,
                'price'=>1500,
                'defect_id'=>4
            ],
            ['title'=>'Ремонт капота',
                'time'=>0.47,
                'price'=>3500,
                'defect_id'=>4
            ],
            ['title'=>'Окрас капота 1 сторона',
                'time'=>0.34,
                'price'=>8000,
                'defect_id'=>4
            ],
            ['title'=>'Ремонт порога',
                'time'=>2,
                'price'=>3500,
                'defect_id'=>4
            ],
            ['title'=>'Окрас заднего крыла',
                'time'=>0.15,
                'price'=>7000,
                'defect_id'=>4
            ],
        ]);

        DB::table('colors')->insert([
            ['title'=>'Серебристо-светло оранжевый'],
            ['title'=>'Оливково-зелёный'],
            ['title'=>'Серебристый сине-зелёный'],
            ['title'=>'Ярко-жёлтый'],
            ['title'=>'Серебристо-чёрный'],
            ['title'=>'Тёмно-вишнёвый'],
            ['title'=>'Голубой'],
            ['title'=>'Серебристый фиолетовый'],
            ['title'=>'Ярко-зелёный'],
            ['title'=>'Белый металлик'],
            ['title'=>'Тёмно-фиолетовый'],
            ['title'=>'Серо-чёрный'],
            ['title'=>'Бежевый'],
            ['title'=>'Светло-серый'],
        ]);

        DB::table('brands')->insert([
            ['title'=>'Audi'],['title'=>'Cadillac'], ['title'=>'Bentley'],
            ['title'=>'Chevrolet'], ['title'=>'Citroen'], ['title'=>'Ferrari'],
            ['title'=>'Fiat'], ['title'=>'Honda'],
            ['title'=>'Ford'], ['title'=>'Lada'],
        ]);

        DB::table('modelcars')->insert([
            ['brand_id'=>1, 'title'=>'Aicon'],           // 0
            ['brand_id'=>1, 'title'=>'RS7'],             // 1
            [ 'brand_id'=> 4, 'title'=>'Aveo'],          // 2
            [ 'brand_id'=> 4, 'title'=>'Traverse'],      // 3
            [ 'brand_id'=> 5, 'title'=>'Berlingo'],      // 4
            [ 'brand_id'=> 5, 'title'=>'C3 Aircross'],   // 5
            [ 'brand_id'=> 7, 'title'=>'Albea'],         // 6
            [ 'brand_id'=> 8, 'title'=>'Pilot'],         // 7
            [ 'brand_id'=> 8, 'title'=>'Accord'],        // 8
            [ 'brand_id'=> 9, 'title'=>'Galaxy'],        // 9
            [ 'brand_id'=> 9, 'title'=>'Escort'],        // 10
            [ 'brand_id'=> 10, 'title'=>'Kalina'],        // 11
            [ 'brand_id'=> 10, 'title'=>'Priora'],        // 12
            [ 'brand_id'=> 10, 'title'=>'Samara'],        // 13
            [ 'brand_id'=> 10, 'title'=>'Vesta'],         // 14
            [ 'brand_id'=> 10, 'title'=>'Largus'],        // 15
        ]);

        DB::table('cars')->insert([
            [
                'date'=>2022,
                'num'=>'o111oo',
                'surname'=>'Иванов',
                'firstName'=>'Иван',
                'patronymic'=>'Иванович',
                'modelcar_id'=>1,
                'color_id'=>2,
                'defect_id'=>1,
            ],
            [
                'date'=>1976,
                'num'=>'o122oo',
                'surname'=>'Петров',
                'firstName'=>'Петр',
                'patronymic'=>'Иванович',
                //'brand_id'=>3,
                'modelcar_id'=>3,
                'color_id'=>5,
                'defect_id'=>1,
            ],
            [
                'date'=>2009,
                'num'=>'o133oo',
                'surname'=>'Сидоров',
                'firstName'=>'Сидор',
                'patronymic'=>'Сидорович',
                'modelcar_id'=>3,
                'color_id'=>7,
                'defect_id'=>1,
            ],
            [
                'date'=>2003,
                'num'=>'o144oo',
                'surname'=>'Лашманов',
                'firstName'=>'Иван',
                'patronymic'=>'Владимирович',
                'modelcar_id'=>4,
                'color_id'=>12,
                'defect_id'=>2,
            ],
            [
                'date'=>1998,
                'num'=>'o155oo',
                'surname'=>'Мазурчак',
                'firstName'=>'Александр',
                'patronymic'=>'Иванович',
                'modelcar_id'=>15,
                'color_id'=>11,
                'defect_id'=>3,
            ],
            [
                'date'=>2010,
                'num'=>'а555oo',
                'surname'=>'Лабузов',
                'firstName'=>'Дмитрий',
                'patronymic'=>'Васильевич',
                'modelcar_id'=>12,
                'color_id'=>9,
                'defect_id'=>4,
            ],
            [
                'date'=>2000,
                'num'=>'е335аа',
                'surname'=>'Лабузов',
                'firstName'=>'Михаил',
                'patronymic'=>'Васильевич',
                'modelcar_id'=>15,
                'color_id'=>9,
                'defect_id'=>5,
            ],
        ]);

        DB::table('clients')->insert([
            [
                'surname'=>'Иванов',
                'firstName'=>'Иван',
                'patronymic'=>'Иванович',
                'passport'=>'4334 123456',
                'birhday'=>'1975-05-12',         // год рождения
                'address'=>'Донецк ул.Фадеева 5 кв.33',
            ],
            [
                 'surname'=>'Петров',
                'firstName'=>'Петр',
                'patronymic'=>'Иванович',
                'passport'=>'3232 333223',
                'birhday'=>'1956-08-05',         // год рождения
                'address'=>'Макеевка ул.Молодежная 27 кв.78',
            ],
            [
                'surname'=>'Сидоров',
                'firstName'=>'Сидор',
                'patronymic'=>'Сидорович',
                'passport'=>'8989 757575',
                'birhday'=>'2000-11-23',         // год рождения
                'address'=>'Донецк ул.Набережная 78 кв.8',
            ],
            [
                'surname'=>'Лашманов',
                'firstName'=>'Иван',
                'patronymic'=>'Владимирович',
                'passport'=>'8765 555555',
                'birhday'=>'1999-12-08',         // год рождения
                'address'=>'Ясиноватая ул.Мира 5 кв. 10',
            ],
            [
                 'surname'=>'Мазурчак',
                'firstName'=>'Александр',
                'patronymic'=>'Иванович',
                'passport'=>'7768 342232',
                'birhday'=>'1978-07-29',         // год рождения
                'address'=>'Донецк ул. Ломоносова 19 кв. 54',
            ],
            [
                'surname'=>'Лабузов',
                'firstName'=>'Дмитрий',
                'patronymic'=>'Васильевич',
                'passport'=>'5555 555445',
                'birhday'=>'1998-03-18',         // год рождения
                'address'=>'Донецк ул. Артема 59 кв. 17',
            ],
            [
                'surname'=>'Лабузов',
                'firstName'=>'Михаил',
                'patronymic'=>'Васильевич',
                'passport'=>'7854 234511',
                'birhday'=>'2001-07-30',         // год рождения
                'address'=>'Макеевка ул. Пирогова 75 кв. 33',
            ],
        ]);

        DB::table('professions')->insert([
            [
                'title'=>'Механик-моторист',
                'defect_id'=>1
            ],
            [
                'title'=>'Механик по ремонту трансмиссии',
                'defect_id'=>2
            ],
            [
                'title'=>'Электрик',
                'defect_id'=>3
            ],
            [
                'title'=>'Мастер кузовного ремонта',
                'defect_id'=>4,
            ],
            [
                'title'=>'Механик по ремонту ходовой части',
                'defect_id'=>5
            ],
            [
                'title'=>'Диагност',
                'defect_id'=>6
            ],
        ]);

        DB::table('workers')->insert([
            [
                'surname'=>'Мартынов',
                'firstName'=>'Валерий',
                'patronymic'=>'Валерьевич',
                'category'=>5,    // разряд
                'experience'=>10,  // стаж
                'profession_id'=>6,  // специальность
            ],
            [
                'surname'=>'Моцарт',
                'firstName'=>'Евгений',
                'patronymic'=>'Альбертович',
                'category'=>6,    // разряд
                'experience'=>15,  // стаж
                'profession_id'=>1,  // специальность двигатель
            ],
            [
                'surname'=>'Курзин',
                'firstName'=>'Сергей',
                'patronymic'=>'Павлович',
                'category'=>5,    // разряд
                'experience'=>20,  // стаж
                'profession_id'=>1,  // двигатель
            ],
            [
                'surname'=>'Деревянко',
                'firstName'=>'Валерий',
                'patronymic'=>'Анатольевич',
                'category'=>3,    // разряд
                'experience'=>2,  // стаж
                'profession_id'=>3,  // кузов
            ],
            [
                'surname'=>'Демин',
                'firstName'=>'Сергей',
                'patronymic'=>'Анатольевич',
                'category'=>7,    // разряд
                'experience'=>25,  // стаж
                'profession_id'=>2,  // специальность электрик
            ],
            [
                'surname'=>'Метунов',
                'firstName'=>'Артем',
                'patronymic'=>'Артемович',
                'category'=>5,    // разряд
                'experience'=>10,  // стаж
                'profession_id'=>1,  // специальность трансмиссия
            ],
            [
                'surname'=>'Колпаков',
                'firstName'=>'Виталий',
                'patronymic'=>'Юрьевич',
                'category'=>4,    // разряд
                'experience'=>5,  // стаж
                'profession_id'=>4,  // специальность ходовая
            ],
            [
                'surname'=>'Куралесов',
                'firstName'=>'Михаил',
                'patronymic'=>'Витальевич',
                'category'=>7,    // разряд
                'experience'=>15,  // стаж
                'profession_id'=>5,  // специальность ходовая
            ],
        ]);

        DB::table('parks')->insert([
            // ходовая
            [
                //'article'=>'4A0611701',
                'modelcar_id'=>1,
                'title'=>'Шланг тормозной',
                'price'=>300,
                'defect_id'=>5
            ],
            [
                //'article'=>'4B0615601B',
                'modelcar_id'=>1,
                'title'=>'Тормозные диски',
                'price'=>1200,
                'defect_id'=>5
            ],
            [
                //'article'=>'4D0698451C',
                'modelcar_id'=>1,
                'title'=>'Тормозные колодки',
                'price'=>1200,
                'defect_id'=>5
            ],
            // кузов
            [
                //'article'=>'4F0821133A',
                'modelcar_id'=>1,
                'title'=>'Подкрылок передний',
                'price'=>900,
                'defect_id'=>4
            ],
            [
                //'article'=>'4F0821103A',
                'modelcar_id'=>1,
                'title'=>'Крыло переднее',
                'price'=>4500,
                'defect_id'=>4
            ],
            [
               // 'article'=>'4F0941003A',
                'modelcar_id'=>1,
                'title'=>'Фара передняя',
                'price'=>7900,
                'defect_id'=>4
            ],
            // трансмиссия
            [
                //'article'=>'623228500',
                'modelcar_id'=>1,
                'title'=>'Комплект сцепления',
                'price'=>8000,
                'defect_id'=>2
            ],
            [
                //'article'=>'4E0498203',
                'modelcar_id'=>1,
                'title'=>'Комплект пыльника шруса',
                'price'=>850,
                'defect_id'=>2
            ],
            [
                //'article'=>'4F0498099A',
                'modelcar_id'=>1,
                'title'=>'Шрус наружный',
                'price'=>3000,
                'defect_id'=>2
            ],
            // электрика

            [
                //'article'=>'054905377',
                'modelcar_id'=>1,
                'title'=>'Датчик детонации',
                'price'=> 600,
                'defect_id'=>3
            ],
            [
                //'article'=>'078919501C',
                'modelcar_id'=>1,
                'title'=>'Датчик температуры',      // id марки модели неисправности
                'price'=> 200,
                'defect_id'=>3
            ],
            [
                //'article'=>'4B0927807',
                'modelcar_id'=>1,
                'title'=>'Датчик ABS',      // id марки модели неисправности
                'price'=> 200,
                'defect_id'=>3
            ],
            // двигатель
            [
               // 'article'=>'000',
                'modelcar_id'=>1,         // id марки модели неисправности
                'title'=>'Ремень ГРМ',
                'price'=> 7500,
                'defect_id'=>1
            ],
            [
               // 'article'=>'000',
                'modelcar_id'=>1,
                'title'=>'Кольца ДВС',
                'price'=> 1500,
                'defect_id'=>1
            ],
            [
                //'article'=>'000',
                'modelcar_id'=>1,
                'title'=>'Поршень',
                'price'=> 7800,
                'defect_id'=>1
            ],
            [
               // 'article'=>'000',
                'modelcar_id'=>1,
                'title'=>'Сальник распредвала',
                'price'=> 300,
                'defect_id'=>1
            ],
            [
               // 'article'=>'000',
                'modelcar_id'=>1,
                'title'=>'Прокладка крышки клапанов',
                'price'=> 900,
                'defect_id'=>1
            ],
            [
                //'article'=>'000',
                'modelcar_id'=>1,
                'title'=>'Сальники клапанов',
                'price'=> 500,
                'defect_id'=>1
            ],
        ]);
        DB::table('applications')->insert([
            'client_id'=>1,
            'car_id'=>1,
            'date_start'=>'2022-03-11'
        ]);

        DB::table('repairs')->insert([
            [
                'application_id'=>1,        // оказанная услуга
                'service_id'=>1,
                'worker_id'=>3,
                'park_id'=>1,
                'time_work'=>1,
            ]
        ]);
    }
}
