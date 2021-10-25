const search = document.querySelector("#search")
const results = document.querySelector(".results")
const searchResults = document.querySelector(".search-results")
const close = document.querySelector(".close")

search.addEventListener("keydown", (e) => {
    if(e.key == "Enter") e.preventDefault()
})
search.addEventListener("keyup", () => startSearching())

close.addEventListener("click", () => {
    search.value = ""
    startSearching()
})

const fetchQuestionsBySearch = async keyword => {

    keyword = keyword.replaceAll(" ", "%20")

    const page = document.querySelector(".pagination .active")

    const response = await fetch(`http://${location.host}/api/search/${page.innerText}/?keyword=${keyword}`)
    const data = await response.json()

    renderQuizFound(data)

}

const startSearching = () => {

    setTimeout(() => {

        //console.clear()

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

    }, 700)

}

const renderQuizFound = data => {
    
    searchResults.innerHTML = ""

    data.forEach(question => {

        searchResults.innerHTML += 

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

const fixRoute = (elem) => {

    let keyword = search.value.replaceAll(" ", "")

    if(keyword == "") return

    let link = elem.href.split("/").slice(0, 6).join("/")

    elem.href = link + `/?keyword=${keyword}`

}

startSearching()
