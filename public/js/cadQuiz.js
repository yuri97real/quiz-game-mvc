const btn = document.querySelector("#cadQuiz")

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select')
    var instances = M.FormSelect.init(elems)
});

btn.addEventListener("click", e => {
    const niveis = document.querySelector("#niveis");
    const categorias = document.querySelector("#categorias")
    const opcoes = document.querySelector("#opcoes")
    const vetOpcoes = opcoes.value.split(",")

    if(vetOpcoes.length != 4) {
        M.toast({html: 'Digite 4 Opções', classes: 'rounded, orange'})
        e.preventDefault()
    }
    if(niveis.value == "") {
        M.toast({html: 'Selecione Um Nível!', classes: 'rounded, orange'})
        e.preventDefault()
    }
    if(categorias.value == "") {
        M.toast({html: 'Selecione Uma Categoria!', classes: 'rounded, orange'})
        e.preventDefault()
    }
})