const fetchNames = () =>{
    console.log("called")
    fetch("http://localhost/infinite-scroll-plain/api.php", {
        method: "GET"
    })
    .then(res => res.json())
    .then(data => { 
        displayNames(data);
    })
    .catch(error =>{ displayNames([])})
}

const displayNames = (names) =>{
    const dest = document.querySelector("#names");

    names.forEach(name => {
        const p = document.createElement("p")
        p.textContent = name['name']
        p.className = 'big-name'
        dest.appendChild(p)
    });
}

window.addEventListener("load", fetchNames(), false)
document.addEventListener("scrollend", fetchNames)