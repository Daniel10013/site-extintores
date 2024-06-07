$(".logout").on("click", function(){
    Swal.fire({
        title: "",
        text: "Deseja sair da conta?",
        icon: "question",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Sim",
        confirmButtonColor: "green",
        cancelButtonText: "Não"
    }).then((result)=>{
        if(result.isConfirmed == false){
           return;
        }

        $.get("https://apagaextintores.com.br/ajax/logout", function(response){
            response = JSON.parse(response);
            if(response.status == true){
                location.reload();
            }

            Swal.fire({
                title: "Erro ao realizar Logout",
                text: response.message,
                icon: "error",
                showCloseButton: true,
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: "Fechar"
            })
        })
    })
})


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

        $.post("https://apagaextintores.com.br/ajax/deleteEmail", {id: emaildId}, function(response){
            response = JSON.parse(response);
            const modalIcon = response.status == true ? "success" : "error";

            if(response.status == true){
                $('[data-id="' + emaildId + '"]').remove();
            }

            Swal.fire({
                title: response.message,
                text: response.message,
                icon: modalIcon,
                showCloseButton: true,
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: "Fechar"
            });
        })
    })
})

$(".table-row-mobile").on("click", function(){
    const id = $(this).data("id");

    $("[data-id="+id+"] .mobile-closed").toggleClass("closed");
    $("[data-id="+id+"] .mobile-closed").toggleClass("open");
    

    $("[data-id="+id+"] .mobile-content").toggleClass("openContent");
    $("[data-id="+id+"] .mobile-content").toggleClass("closed");
    

})