{{--Atitinkamai pagal posto kategorija priskiriama ikonele--}}
@php
    switch ($map->slug) {
        case 'hirschfelden':
        /*Naujienos*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-newspaper-o fa-lg'></i></span>";
            break;
        case 'layton-lake-district':
        /*Atnaujinimai*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-wrench fa-lg'></i></span>";
            break;
        case 'medved-taiga':
        /*Apžvalgos*/
            echo "<span class='main_add_icon'><i class='main_load_more_back fa fa-eye fa-lg'></i></span>";
            break;
        default:
            //code to be executed
    }
@endphp
