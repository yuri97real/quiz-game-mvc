const search = document.querySelector("#search")
const results = document.querySelector(".results")
const searchResults = document.querySelector(".search-results")

const fetchQuestionsBySearch = async keyword => {

    keyword = keyword.split(" ").join("-")

    const response = await fetch(`http://${location.host}/api/search/${keyword}`)
    const data = await response.json()

    renderQuizFound(data)

}

search.addEventListener("keyup", e => {
    setTimeout(() => {

        console.clear()

        const patterned = search.value.split(" ").filter(value => value != "")

        if(patterned.join("") != "") {

            results.classList.add("hide")
            searchResults.classList.remove("hide")

            fetchQuestionsBySearch(search.value)

        } else {

            searchResults.innerHTML = ""
            searchResults.classList.add("hide")

            results.classList.remove("hide")

        }

    }, 1000)
})

const renderQuizFound = data => {

    data.forEach(question => {

        searchResults.innerHTML = 

        `
            <li class="collection-item avatar">

                <i class="material-icons circle green">insert_chart</i>
                
                <span class='title'>
                    <strong>
                        <a href="/cadastro/editarQuestao/${question.ID}">${question.PERGUNTA}</a>
                    </strong>
                </span>

                <p>${question.OPCOES}</p>

                <a class="secondary-content modal-trigger" href="#deletar/${question.ID}">
                    <i class="material-icons">clear</i>
                </a>

            </li>
        `

    })

}

