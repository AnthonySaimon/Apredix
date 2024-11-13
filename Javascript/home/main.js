//Cabesario sube menu
const menutoggle = document.getElementById('menutoggle');
const menu = document.querySelector('.menu');

menutoggle.addEventListener('click', () => {
    menu.classList.toggle('ativo')

})

const menutoggle2 = document.getElementById('check');
const menu2= document.querySelector('.menu');

menutoggle2.addEventListener('click', () => {
    menu.classList.toggle('ativo')

})
//carrosel de imagem (tempo de trasisao)
let count = 1;
document.getElementById("radio1").checked = true;

setInterval (function(){
    nexImage()
}, 5000)

function nexImage(){
    count++;
    if(count>4){
        count = 1;
    }

    document.getElementById("radio"+count).checked = true;
}