function fichier_txt(fich) {
    var obj_pers = new XMLHttpRequest();
    obj_pers.open("GET",fich, false);
    obj_pers.send(null);

    if(obj_pers.readyState == 4){
        return(obj_pers.responseText);
    } else{
        return(false);
    }
}