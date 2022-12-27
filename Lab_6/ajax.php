<?php

if (!isset($_POST["type"])) {
    echo json_encode([
        "message" => "Error type",
        "status" => 404
    ]);
    return;
}

$type = $_POST["type"];

switch ($type) {

    case "nickname":
        $data = [
            "John",
            "Mary",
            "Peter",
            "Sally",
            "Alex",
            "Tefy",
            "Garry",
            "Allen",
            "Henry",
            "Smith",
            "Ivan",
            "Tony",
            "David",
        ];

        echo json_encode($data);
        break;
    case "news":
        $data = [
            ["title"=>"title1","body"=>"news body 1", "modal"=>"text1 for modal"],
            ["title"=>"title2","body"=>"news body 2", "modal"=>"text2 for modal"],
            ["title"=>"title3","body"=>"news body 3", "modal"=>"text3 for modal"],
            ["title"=>"title4","body"=>"news body 4", "modal"=>"text4 for modal"],
            ["title"=>"title5","body"=>"news body 5", "modal"=>"text5 for modal"],
            ["title"=>"title6","body"=>"news body 6", "modal"=>"text6 for modal"],
            ["title"=>"title7","body"=>"news body 7", "modal"=>"text7 for modal"],
            ["title"=>"title8","body"=>"news body 8", "modal"=>"text8 for modal"],
            ["title"=>"title9","body"=>"news body 9", "modal"=>"text9 for modal"],
            ["title"=>"title10","body"=>"news body 10", "modal"=>"text10 for modal"],
            ["title"=>"title11","body"=>"news body 11", "modal"=>"text11 for modal"],
            ["title"=>"title12","body"=>"news body 12", "modal"=>"text12 for modal"],
            ["title"=>"title13","body"=>"news body 13", "modal"=>"text13 for modal"],
            ["title"=>"title14","body"=>"news body 14", "modal"=>"text14 for modal"],
        ];
        echo json_encode($data);
        break;
    default:
        echo json_encode([
            "message"=>"Bad type",
            "status"=>405
        ]);
        break;
}


