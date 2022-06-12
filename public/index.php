<?php


require_once "../vendor/autoload.php";

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler('../data/app.log', Logger::DEBUG));

$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

$faker = Faker\Factory::create();
$students = array();
if (!file_exists('../data/students.json')) {
    for ($i = 0; $i < 10; $i++) {
        $students[] = new \School\Student(
            $i + 1,
            $faker->firstName,
            $faker->lastName,
            $faker->date('Y-m-d', '2003-01-01'),
            $faker->realText($maxNbChars = 500)
        );
    }
    usort($students, function ($item1, $item2) {
        return $item1->getName() <=> $item2->getName();
    });
    file_put_contents("../data/students.json", json_encode($students));
} else {
    $data = json_decode(file_get_contents('../data/students.json'));
    foreach ($data as $elem) {
        $students[] = new \School\Student(
            $elem->id,
            $elem->name,
            $elem->surname,
            $elem->birthday,
            $elem->characteristic);
    }
}
echo $view->render('students.html.twig', ['students' => $students]);
$logger->info('Посещение главной страницы');