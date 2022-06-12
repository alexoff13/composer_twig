<?php
require_once "../vendor/autoload.php";

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler('../data/app.log', Logger::DEBUG));

$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

$id = $_GET['id'];
$students = array();
$data = json_decode(file_get_contents('../data/students.json'));
foreach ($data as $elem) {
    $students[] = new \School\Student(
        $elem->id,
        $elem->name,
        $elem->surname,
        $elem->birthday,
        $elem->characteristic);
}
$student = $students[$id - 1];
echo $view->render('student.html.twig', ['student' => $student]);
$logger->info('Посещение страницы студента', ['id_student' => $id - 1]);