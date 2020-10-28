
function provera(){
    var ime=document.getElementById('ime').value;
     var prezime=document.getElementsByName('tbPrezime').value;
     var telefon=document.getElementsByName('tbTelefon').value;
     var mejl=document.getElementsByName('tbMejl').value;
     var lozinka=document.getElementsByName('tbLozinka').value;
     var korisnickoIme=document.getElementsByName('tbKorisnickoIme').value;
     var slika=document.getElementsByName('tbSlika').value;
     
     //reg izrazi
     var regIme=/^[A-Z][a-z]{2,20}$/;
      var regPrezime=/^[A-Z][a-z]{2,20}$/;
       var regTelefon=/^06[01234569]\/[0-9]{6,7}$/;
        var regMejl=/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
         var regLozinka=/^[0-9a-zA-Z]{6,}$/;
          var regKorisnickoIme=/^[\w]{2,20}$/;
           var regSlika=/^([a-z\-_0-9\/\:\.]*\.(jpg|jpeg|png|gif))$/;
     
     var greske=new Array();
     
     if(!regIme.test(ime)){
         greske.push("Ime je u neispravnom formatu!");
     }
    if(!regPrezime.test(prezime)){
         greske.push("Prezime je u neispravnom formatu!");
    }
    if(!regTelefon.test(telefon)){
         greske.push("Telefon je u neispravnom formatu!");
    }
    if(!regMejl.test(mejl)){
         greske.push("Mejl je u neispravnom formatu!");
    }
    if(!regLozinka.test(lozinka)){
         greske.push("Lozinka je u neispravnom formatu!");
    }
    if(!regKorisnickoIme.test(korisnickoIme)){
         greske.push("Korisnicko ime je u neispravnom formatu!");
    }
    if(!regSlika.test(slika)){
         greske.push("Slika je u neispravnom formatu!");
    }
    if(greske.length!==0){
        var tekst="";
        for(var i=0;i<greske.length;i++){
            tekst+="<div class='alert alert-danger'>"+greske[i]+"</div>";
	}
       document.getElementById('error').innerHTML=tekst;
    }
    else{
        var forma1 = document.getElementById('formaR');
        forma1.action="registration";
	forma1.submit();
        
    }
    
    
}

