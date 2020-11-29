const title = document.querySelector("h1")
const status = document.querySelector("h3")
const divButtons = document.querySelector(".buttons")
const buttons = document.querySelectorAll("button")

let lifes = 3
let score = 0

const fetchQuestions = async () => {

    const response = await fetch(`http://${location.hostname}/api/questions`)
    const data = await response.json()

    let correct = renderQuiz(data, data.length)

    buttonsActions(data, correct)
}

const renderQuiz = (data, length) => {

    if(length == 0) {

        title.innerText = "Você Ganhou!"
        divButtons.setAttribute("class", "hide")

        saveResults()

        return
    }

    const index = getQuestionIndex(length)
    const currentQuiz = data[index]
    const options = currentQuiz.OPCOES.split("/")
    //console.log(options)
    const suffleOptions = getShuffleOptions(options, options.length)
    //console.log(suffleOptions)

    data.splice(index, 1)

    title.innerText = currentQuiz.PERGUNTA
    status.innerText = `Vidas: ${lifes} | Score: ${score}`

    buttons.forEach((button, pos) => {
        button.innerText = suffleOptions[pos]
    })

    return currentQuiz.CERTA
}

const getQuestionIndex = length => {
    return Math.floor(Math.random() * length)
}

const getShuffleOptions = (buttons, length) => {

    let array = []

    for(let i=0; i<length; i++) {

        let index = getQuestionIndex(buttons.length)

        array.push(buttons[index])
        buttons.splice(index, 1)
    }

    return array
}

const isCorrect = (correct, selected) => {

    if(correct == selected) {
        return true
    }
    return false
}

const gameOver = () => {

    title.innerText = "Você Perdeu!"
    status.innerText = `Vidas: 0 | Score: ${score}`
    divButtons.setAttribute("class", "hide")

    saveResults()

    return
}

const buttonsActions = (data, correct) => {

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            if(!isCorrect(correct, button.innerText)) {
                M.toast({html: "Você Errou!", classes: "rounded, red"})
                lifes -= 1
            } else score += 1

            if(lifes != 0) {
                correct = renderQuiz(data, data.length)
            } else gameOver()
        })
    })
}

const saveResults = () => {

    const results = document.querySelector(".results")
    const form = document.createElement("form")
    const button = document.createElement("button")

    form.setAttribute("method", "POST")
    form.setAttribute("action", "/home/scores")

    button.setAttribute("class", "waves-effect waves-light red btn")
    button.setAttribute("name", "score")
    button.setAttribute("value", score)

    button.innerText = "Finalizar"

    form.appendChild(button)

    results.appendChild(form)
}

fetchQuestions()
