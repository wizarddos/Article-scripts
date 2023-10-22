const friendListButtons = document.querySelectorAll('.friend');
let activeConversation = friendListButtons[0].name

const createIframe = (conversation) =>{
    document.querySelector('.conversation')
    .innerHTML = 
    `<iframe src="dm_receive.php?friend=${conversation}" frameborder="0"></iframe>`

}

friendListButtons.forEach((el)=>{
    el.addEventListener("click", ()=>{
        activeConversation = el.name
        createIframe(activeConversation);
    })
})

createIframe(activeConversation)
setInterval(()=>{createIframe(activeConversation)}, "20000")