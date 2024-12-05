
function notifyMe(dataSuccess, dataText, dataType){    
    $.notify('<i class="fa fa-bell"></i><strong>'+dataSuccess+'</strong> <br> <p> '+dataText+'</p>', {
        type: dataType,
        allow_dismiss: true,
        delay: 2000,
        showProgressbar: true,
        timer: 300,
        animate:{
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
        }
    });
    }





    function newMagic(sweetTitle, sweetText, dataPost, dataTitle, dataArray, dataSuccess, reLoad='no', retunLink='') {
        swal({
            title: sweetTitle,
            text: sweetText,
            icon: "warning",
            buttons: ["No", "Yes!"],
            // dangerMode: true, 
        })
        .then((result) => { 
            if (result){        
                $.ajax({
                    url:dataPost,
                    method:"POST",                    
                    data:{Message:dataTitle, id:dataArray},        
                    success:function(){
                        setInterval(function(){
                            if(reLoad =='no'){
                                window.location.assign(retunLink);
                            }else{
                                window.location.reload();
                            }
                        },2000);             
                    }
                }) .done(function(){ 
                    swal({
                        title:dataSuccess,
                        icon: "success"
                    });
                }) .fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }


              
        })
}

