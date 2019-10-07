$(".day").click(function(){
     var that = $(this);
     var id=that.data("id");
     $.ajax({
        url:'data/scheduleAjax.php',
        method:'POST',
        dataType:'JSON',
         data:{
            id:id
         },
        success:function(data){
            var lista="";
            $.each(data,function(index,d){
               lista+='<div class="col-md-3 col-sm-6"> <div class="program program-schedule"><img src="'+d.src+'" alt="Cycling"> <small>'+d.time+'</small> <h3>'+d.classesName+'</h3> <span>'+d.teamName+'</span> </div> </div>';
            });
            $('#schedule').html(lista);
        },
         error:function(xhr, status, error){
            alert(xhr.responseText);
         }
     });
    }
);
$('.paginacija').click(function(Event){
    Event.preventDefault();
    var that=$(this);
    var broj=that.data('broj');
    $.ajax({
        url:'data/paginate.php',
        type:'POST',
        data:{
            broj:broj
        },
        success:function(data){

            var team="";
            $.each(data,function(index,t){
                team+='<div class="col-md-4 col-sm-6"><div class="team-section-grid animate-box fadeInUp animated" style="background-image: url('+t.src+');"><div class="overlay-section"> <div class="desc"> <h3>'+t.name+'</h3> <span>'+t.type+'</span> <p>'+t.text+'</p> <p class="fh5co-social-icons"> <a href="#"><i class="icon-twitter-with-circle"></i></a> <a href="#"><i class="icon-facebook-with-circle"></i></a> <a href="#"><i class="icon-instagram-with-circle"></i></a> </p> </div> </div> </div> </div>';
            });
            console.log(team);
            $('#team').html(team);
        },
        error:function(xhr, status, error){
            alert(xhr.status);
        }
    });
});
$('#anketa').on('click', 'button', function(e) {
    e.preventDefault();
    var radio=$("#anketa input[type='radio']:checked").val();
    var postid=$("#anketa input[type='hidden']").val();

    if(radio === undefined){
        alert("Select grade!");
    }
    else{
        $.ajax({
            url:'data/anketa.php',
            data: {ocena:radio, postid:postid},
            method: "POST",
            success: function (data) {
                alert(data);
            },
            error: function(xhr, status, error){
                var poruka = "Doslo je do greske.";
                switch(xhr.status) {
                    case 404 :
                        poruka = "Page not found.";
                        break;
                    case 409:
                        poruka = "You have already voted.";
                        break;
                    case 422:
                        poruka = "The data is invalid.";
                        break;
                    case 500:
                        poruka = "Error.";
                        break;
                }
                alert(poruka);
            }
        }).done(function(){
            $.ajax({
                url:'data/anketa.php',
                method: "POST",
                data: {ID:postid},
                success: function (res) {
                    $('.views > strong > span >i').text(res);
                }
            });
        });
    }
});
$('#glasaj').click(function(){
    var odgovor=document.getElementsByName('odgovor');
    var izabrani='';
   var id_pitanja=$('.odgovor').data('id_pitanja');
    for(var i = 0;i<odgovor.length;i++){
     if(odgovor[i].checked){
         izabrani+=odgovor[i].value;

     }
    }
    if(izabrani==''){
      alert("Niste izabrali odgovor");
    }else{
   $.ajax({
       url:'data/anketa.php',
       method:'POST',
       data:{
           odgovor:izabrani,
           id_pitanja:id_pitanja
       },
       success:function(data) {
           if(data[2]==1){
               alert("VEC STE GLASALI,VAS GLAS SE NECE RACUNATI PONOVO!");
           }
           console.log(data);
           var tabela='';
           var suma=data[0];
           tabela+='<table>';
           $.each(data[1],function(index,value){
               tabela+=`<tr><td>${value.tekst_odgovora}:</td><td>${value.broj*100/suma}%</td></tr>`
           });
           tabela+='</table>';
           $('#anketa').html(tabela);
       },error: function(xhr, status, error) {
           var err = xhr.responseText;
           alert(err);
       }
   });
    }
});