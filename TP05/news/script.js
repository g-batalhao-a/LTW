let commentForm = document.querySelector('form')

commentForm.addEventListener("submit",submitComment)

function submitComment(event) {
    event.preventDefault()
    
    let id = document.querySelector('form input[type="hidden"]').value
    let username = document.querySelector('form input[name="username"]').value
    let text = document.querySelector('form textarea').value
    let comment_id = document.querySelector('#comments article:last-of-type').getAttribute('data-id')

    console.log(id)
    console.log(username)
    console.log(text)
    console.log(comment_id)

    let request = new XMLHttpRequest()
    request.addEventListener("load",receiveComments)
    request.open("post","api_add_comment.php",true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({id: id, comment_id: comment_id, username: username, text:text}))
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function receiveComments() {
    response = JSON.parse(this.responseText)
    comments = document.querySelector('#comments')

    response.forEach( function(comment) {
        const comment_id = comment['id'];
        const username = comment['username']
        const text = comment['text']
        const date = comment['published']

        let newComment = document.createElement('article')
        newComment.setAttribute('class', 'comment')
        newComment.setAttribute('data-id', comment_id)

        let userSpan = document.createElement('span')
        userSpan.setAttribute('class', 'user')
        userSpan.innerText = username

        let dateSpan = document.createElement('span')
        dateSpan.setAttribute('class', 'date')
        dateSpan.innerText = date

        let textP = document.createElement('p')
        textP.innerText = text

        userSpan.append(dateSpan)
        newComment.append(userSpan)
        newComment.append(textP)

        comments.insertBefore(newComment, commentForm)
    })

}
