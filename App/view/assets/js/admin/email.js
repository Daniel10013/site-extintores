$(".delete").on("click", function(){
    const emaildId = $(this).data("delete");
    Swal.fire({
        title: "Apagar Email " + emaildId,
        html: 'Isso apagará o e-mail <span style="color: red"><b>para sempre!</b></span><br> Tem certeza?',
        icon: "warning",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Sim",
        confirmButtonColor: "rgb(185,24,24)",
        cancelButtonText: "Não"
    }).then((result)=>{
        if(result.isConfirmed == false){
           return;
        }

        $.post("http://localhost/site-extintores/ajax/deleteEmail", {id: emaildId}, function(response){
            response = JSON.parse(response);
            const modalIcon = response.status == true ? "success" : "error";

            Swal.fire({
                title: response.message,
                text: response.message,
                icon: modalIcon,
                showCloseButton: true,
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: "Fechar"
            }).then(()=>{
                if(response.status == true){
                    window.location.href = "../"
                }
            });
        })
    })
})