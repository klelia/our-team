<?php

//CRUD

$teamJson = file_get_contents('team.json');

//$_POST allora sto aggiungendo un membro al team
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'GET') {
    //converto il jSon in un array php
    $team = json_decode($teamJson, true);

    if ($method === 'POST') {
        if (isset($_POST['id'])) {
            //creo un nuovo array associativo per il nuovo membro
            $teamMember = [
                'id' => (int) $_POST['id'],
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'role' => $_POST['role'],
                'userImg' => $_POST['userImg']
            ];
            //aggiungo il nuovo membro alla'array del team
            $team[] = $teamMember;
        }
    } elseif ($method === 'DELETE') {
        $obj = json_decode(file_get_contents('php://input'), true);
        $index = $obj['id'];
        array_splice($team, $index, 1);
    } elseif ($method === 'PUT') {
        $obj = json_decode(file_get_contents('php://input'), true);
        $index = $obj['idx'];
        $team[$index]['role'] = $obj['role'];
    }

    //converto l'array php in json
    $teamJson = json_encode($team, JSON_PRETTY_PRINT);
    //scrivo il file
    file_put_contents('team.json', $teamJson);
}





//$team = json_decode($filecontent, true); //decodifica json in array associativo
//var_dump($team);


//scrive un file
//file_put_contents('team.json','contenuto da scrivere');

//file_put_contents('prova.json', json_encode($provafile));



header('Content-Type: application/json');
echo $teamJson;

