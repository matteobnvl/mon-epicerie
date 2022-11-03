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

password = "";

document.getElementById('registration_form_plainPassword').addEventListener('input', function(){
    password = this.value;
    if(password.match( /[0-9]/g)){
        document.getElementById('closeNumber').classList.add('hidden');
        document.getElementById('checkNumber').classList.remove('hidden');
    }else{
        document.getElementById('closeNumber').classList.remove('hidden');
        document.getElementById('checkNumber').classList.add('hidden');
    }

    if(password.match( /[A-Z]/g)){
        document.getElementById('closeMaj').classList.add('hidden');
        document.getElementById('checkMaj').classList.remove('hidden');
    }else{
        document.getElementById('closeMaj').classList.remove('hidden');
        document.getElementById('checkMaj').classList.add('hidden');
    }

    if(password.match( /[a-z]/g)){
        document.getElementById('closeMin').classList.add('hidden');
        document.getElementById('checkMin').classList.remove('hidden');
    }else{
        document.getElementById('closeMin').classList.remove('hidden');
        document.getElementById('checkMin').classList.add('hidden');
    }

    if(password.length >= 8){
        document.getElementById('closeLenght').classList.add('hidden');
        document.getElementById('checkLenght').classList.remove('hidden');
    }else{
        document.getElementById('closeLenght').classList.remove('hidden');
        document.getElementById('checkLenght').classList.add('hidden');
    }
    if (password.match( /[0-9]/g) && password.match( /[A-Z]/g) && password.match(/[a-z]/g) && password.length >= 8){
                document.getElementById('repeatMdp').classList.remove('hidden');
                password = this.value;
                console.log(password)
            }else{
                document.getElementById('repeatMdp').classList.add('hidden');
            }

})


document.getElementById('repeatMdp').addEventListener('input',function(){
    if(this.value == password){
        document.getElementById('thirdBtnRegister').classList.remove('hidden');
    }else{
        document.getElementById('thirdBtnRegister').classList.add('hidden');
    }
})

/*

function validate() { 
    var msg; 
    var str = document.getElementById("mdp").value; 
    if (str.match( /[0-9]/g) && 
            str.match( /[A-Z]/g) && 
            str.match(/[a-z]/g) && 
            str.match( /[^a-zA-Z\d]/g) &&
            str.length >= 8) 
        msg = "<p style='color:green'>Mot de passe fort.</p>"; 
    else 
        msg = "<p style='color:red'>Mot de passe faible.</p>"; 
    document.getElementById("msg").innerHTML= msg; 
}

*/