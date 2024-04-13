const updateCounter = ()=>{
    
    fetch(`http://localhost/view-count/api.php`, {method: "GET"})
    .then(req => req.json())
    .then(req => {
        const counterElement = document.querySelector('#count');
        counterElement.innerHTML = req
    })
}
updateCounter()
setInterval(updateCounter, 5000)