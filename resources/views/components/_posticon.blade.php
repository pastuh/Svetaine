{{--Atitinkamai pagal posto kategorija priskiriama ikonele--}}
@php
    switch ($post->category_id) {
        case 1:
        /*Naujienos*/
            echo "<span class='pm_add_icon'><i class='pm_load_more_back fa fa-newspaper-o fa-lg'></i></span>";
            break;
        case 2:
        /*Rezervatai*/
            echo "<span class='pm_add_icon'><i class='pm_load_more_back fa fa-map fa-lg'></i></span>";
            break;
        case 3:
        /*Atnaujinimai*/
            echo "<span class='pm_add_icon'><i class='pm_load_more_back fa fa-wrench fa-lg'></i></span>";
            break;
        case 4:
        /*Apžvalgos*/
            echo "<span class='pm_add_icon'><i class='pm_load_more_back fa fa-eye fa-lg'></i></span>";
            break;
        default:
            //code to be executed
    }
@endphp
