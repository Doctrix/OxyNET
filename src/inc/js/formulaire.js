function validation() {
        //chaque champs doit être non vide, ici le test est fait pour 3
        //vous pouvez changer le nom de ces champs ici ch1,ch2,ch3
        //vous pouvez ajouter d'autres champs, prenez garde d'ajouter
        //autant de tests que de champs ajoutés
        //création MZ-2003
    if ((document.mon_form.ch1.value == "") ||
        (document.mon_form.ch2.value == "") ||
        (document.mon_form.ch3.value == "") ||
        (document.mon_form.ch4.value == "")) {
        //votre message ici
        window.alert("Certains champs sont vides !!!!! Merci de les renseigner.")
        return false;
    }
}