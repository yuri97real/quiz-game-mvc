const btn = document.querySelector("#cadQuiz")

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select')
    var instances = M.FormSelect.init(elems)
});

btn.addEventListener("click", e => {
    const niveis = document.querySelector("#niveis");
    const categorias = document.querySelector("#categorias")
    const opcoes = document.querySelector("#opcoes")
    const vetOpcoes = opcoes.value.split("/")
    const certa = document.querySelector("#certa").value

    if(vetOpcoes.length != 4) {
        M.toast({html: 'Digite 4 Opções', classes: 'rounded, orange'})
        e.preventDefault()
        return
    }
    if(vetOpcoes.indexOf(certa) < 0) {
        M.toast({html: 'Digite Corretamente Uma das 4 Opções Inseridas', classes: 'rounded, orange'})
        e.preventDefault()
        return
    }
    if(niveis.value == "") {
        M.toast({html: 'Selecione Um Nível!', classes: 'rounded, orange'})
        e.preventDefault()
        return
    }
    if(categorias.value == "") {
        M.toast({html: 'Selecione Uma Categoria!', classes: 'rounded, orange'})
        e.preventDefault()
        return
    }
})