document.getElementById('BtnOne').addEventListener('click', function(){
    var valid_nom = 0;
    var valid_prenom = 0;
    var valid_mail = 0;
    
    if(document.getElementById('registration_form_nom').value != ""){
        valid_nom = 1;
    }else{
        valid_nom = 0;
    }

    if(document.getElementById('registration_form_prenom').value != ""){
        valid_prenom = 1;
    }else{
        valid_prenom = 0;
    }

    if(document.getElementById('registration_form_email').value != ""){
        let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
        if (regex.test(document.getElementById('registration_form_email').value)) {
            valid_mail = 1;
        }else{
            valid_mail = 0;
        }
    }else{
        valid_mail = 0;
    }


    if(valid_mail == 1 && valid_nom == 1 && valid_prenom == 1){
        changeRegister1();
    }
})


document.getElementById('BtnTwo').addEventListener('click', function(){
    var valid_phone = 0;
    var valid_day = 0;
    var valid_month = 0;
    var valid_year = 0;
    var valid_city = 0;
    
    if(document.getElementById('registration_form_phone').value != ""){
        valid_phone = 1;
    }else{
        valid_phone = 0;
    }

    if(document.getElementById('registration_form_date_naissance_month').value != "" && document.getElementById('registration_form_date_naissance_month').value != 'Mois'){
        valid_month = 1;
    }else{
        valid_month = 0;
    }

    if(document.getElementById('registration_form_date_naissance_day').value != "" && document.getElementById('registration_form_date_naissance_month').value != 'Jour'){
        valid_day = 1;
    }else{
        valid_day = 0;
    }

    if(document.getElementById('registration_form_date_naissance_year').value != "" && document.getElementById('registration_form_date_naissance_month').value != 'Année'){
        valid_year = 1;
    }else{
        valid_year = 0;
    }

    if(document.getElementById('registration_form_ville_reference').value != ""){
        valid_city = 1;
    }else{
        valid_city = 0;
    }


    if(valid_phone == 1 && valid_day == 1 && valid_month == 1 && valid_city == 1 && valid_year == 1){
        changeRegister2();
    }
})