/**
 * 2.
 * alert('Hello World!')
 * console.log('Hello World!')
 */

 /**
  * 3.
  *  
  *  window.addEventListener('load', function() {
        let products = document.getElementById('products')
        console.log(products)
    })
  * 
  */

/**
 * 4.
 * 
 *  let form =document.getElementsByTagName('form')[0]
    console.log(form)
    let quantity =document.querySelector('input[name=quantity]')
    console.log(quantity)
    let formInputs =document.querySelectorAll('form input')
    formInputs.forEach(element => {
        console.log(element)
 });
 */
 
/**
 * 5.
 * 
 * let form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', function(event) {
    alert('Submitted!')
    event.preventDefault()
})
 */

/**
 * 6.
 * const form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', (event) => {
    event.preventDefault()

    const description = event.target[0].value
    const quantity = event.target[1].value

    const tr = document.createElement('tr')

    const td1 = document.createElement('td')
    const td2 = document.createElement('td')
    const inputVal = document.createElement('input')
    inputVal.setAttribute('type', 'number')
    inputVal.setAttribute('value', quantity)
    td1.innerHTML = description
    td2.append(inputVal)
    tr.append(td1)
    tr.append(td2)
    document.querySelector('#products tbody').append(tr)
})
 */

 /**
 * 7.
 * const form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', (event) => {
    event.preventDefault()

    const description = event.target[0].value
    const quantity = event.target[1].value

    const tr = document.createElement('tr')

    const td1 = document.createElement('td')
    const td2 = document.createElement('td')
    const td3 = document.createElement('td')
    const inputVal = document.createElement('input')
    inputVal.setAttribute('type', 'number')
    inputVal.setAttribute('value', quantity)


    const inputRem = document.createElement('input')
    inputRem.setAttribute('type', 'button')
    inputRem.setAttribute('value', 'Remove')

    inputRem.onclick = (event) => {
        event.preventDefault()
        tr.remove()
    }

    td1.innerHTML = description
    td2.append(inputVal)
    td3.append(inputRem)
    tr.append(td1)
    tr.append(td2)
    tr.append(td3)
    document.querySelector('#products tbody').append(tr)
})
 */



 /**
 * 8.
 * 
 */

const form = document.getElementsByTagName('form')[0]

form.addEventListener('submit', (event) => {
    event.preventDefault()

    const description = event.target[0].value
    const quantity = event.target[1].value

    const tr = document.createElement('tr')
    const td1 = document.createElement('td')
    const td2 = document.createElement('td')
    const td3 = document.createElement('td')

    const inputVal = document.createElement('input')
    inputVal.setAttribute('type', 'number')
    inputVal.setAttribute('value', quantity)

    inputVal.addEventListener('input', (event) => {
        inputVal.setAttribute('value', event.target.value)
        updateTotal()
    })

    const inputRem = document.createElement('input')
    inputRem.setAttribute('type', 'button')
    inputRem.setAttribute('value', 'Remove')

    inputRem.onclick = (event) => {
        event.preventDefault()
        tr.remove()
        updateTotal()
    }

    td1.innerHTML = description
    td2.append(inputVal)
    td3.append(inputRem)
    tr.append(td1)
    tr.append(td2)
    tr.append(td3)
    document.querySelector('#products tbody').append(tr)
    updateTotal()
})

const updateTotal = () => {
  const trs = document.querySelectorAll('#products tbody tr')

  let total = 0

  trs.forEach((tr) => {
    if (tr.children.length === 3 && tr.children[1].tagName === 'TD') {
      const input = tr.children[1].children[0]

      total += parseInt(input.attributes['value'].value)
    }
  })

  document.getElementById('total').innerHTML = total
}
