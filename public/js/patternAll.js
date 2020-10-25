const submit = document.querySelector("button")

submit.addEventListener("click", e => {
    patternAll()
})

function patternAll() {

    const inputs = document.querySelectorAll(".dados")
    const options = document.querySelector("#opcoes")

    removeExtraSpaces(inputs)
    toUpper(inputs)
    organizeOptions(options)
}

function removeExtraSpaces(inputs) {
    inputs.forEach(input => {
        let withoutSpaces = input.value.split(" ").filter(value => value != "")
        input.value = withoutSpaces.join(" ")
    })
}
function toUpper(inputs) {
    inputs.forEach(input => {
        let toUpper = input.value.toUpperCase()
        input.value = toUpper
    })
}
function organizeOptions(options) {
    let withoutCommas = options.value.split(",")
    let newInputOptions = []

    withoutCommas.forEach(option => {
        let withoutSpaces = option.split(" ").filter(value => value != "")
        newInputOptions.push(withoutSpaces.join(" "))
    })

    options.value = newInputOptions.join(",").toUpperCase()
}
