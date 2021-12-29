/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    var isnew=$('#isnew').val();
    if(isnew=1){
        document.getElementById('text').classList.add('d-none');
        document.getElementById('dirs').classList.remove('d-none');
    }else{
        //
    }
});
$('input[name="gallary"]').click(function(){
    var target=$(this).val();
    var vr=document.getElementById('gal-'+target).textContent;
    vr=vr.replace(/\s+/g, '');
    if(vr=='Галерея'){
        document.getElementById('text').classList.add('d-none');
        document.getElementById('dirs').classList.remove('d-none');
    }
    if(vr=='Рассказ'){
        document.getElementById('text').classList.remove('d-none');
        document.getElementById('dirs').classList.add('d-none');
    }
    if(vr=='Комикс'){
        document.getElementById('text').classList.add('d-none');
        document.getElementById('dirs').classList.remove('d-none');
    }
});

