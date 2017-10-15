{{--Atitinkamai pagal posto kategorija priskiriama ikonele--}}
@php
    switch ($post->category_id) {
        case 1:
        /*Naujienos*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-newspaper-o fa-lg'></i></span>";
            break;
        case 2:
        /*Atnaujinimai*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-wrench fa-lg'></i></span>";
            break;
        case 3:
        /*Apžvalgos*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-eye fa-lg'></i></span>";
            break;
        case 4:
        /*Rezervatai*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-map fa-lg'></i></span>";
            break;
        case 5:
        /*Trofėjai*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-paw fa-lg'></i></span>";
            break;
        default:
            //code to be executed
    }
@endphp
