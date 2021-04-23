
$(document).ready(function(){
    $('#search_btn').click(function(){
        var searchtxt = $('#search_txt').val();
        $.ajax({
            url: 'api-map.php?endereco='+ searchtxt,
            type: 'get',
            dataType: 'JSON',
            // data: {"endereco": searchtxt},
            success: function(response){
                console.log (response);

                var len = response.length;

                if(len>0){
                    map.setView([response[0].lat,response[0].lng], 15);
                } else {
                    alert ("Não Existe Hostels Cadastrados")
                };
                
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                    var hostelname= response[i].hostelname;
                    var lat = response[i].lat;
                    var lng = response[i].lng;
                    addMarker({id, hostelname, lat, lng})

                }
    
            },
            error: function (err){
                console.log (err);
            }
        });
    });
});

// create map
const map = L.map('mapid').setView([-7.10713,-34.82787], 15)

// create and add tileLayer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
})
.addTo(map)

// create icon
const icon = L.icon({
    iconUrl: "./assets/img/img2/logo/icon-house.svg",
    iconSize: [58, 68],
    iconAnchor: [29, 68]
})


let marker;

// adicionar o campo de fotos

    function addPhotoField() {
  
    // pegar o container de fotos #images
  
    const container = document.querySelector('#images')
  
    // pegar o container para duplicar .new-image
  
    const fieldsContainer = document.querySelectorAll('.new-upload')
  
    // realizar o clone da última imagem adicionada.
  
    const newFieldContainer = fieldsContainer[fieldsContainer.length - 1].cloneNode(true)
  
    
    // verificar se o campo está vazio, se sim, nao adicionar ao container de imagens
    const input = newFieldContainer.children[0]

    if(input.value == "") {
        return
    }
    // limpar o campo antes de adicionar ao container de imagens
    input.value = ""

    // adicionar o clone ao container de #images
    container.appendChild(newFieldContainer)
} 

function deleteField(event) {
    const span = event.currentTarget

    const fieldsContainer = document.querySelectorAll('.new-upload')

    if(fieldsContainer.length < 2) {
        // limpar o valor do campo
        span.parentNode.children[0].value = ""
        return
    }

    // deletar o campo
    span.parentNode.remove();

}

// select yes or no
function toggleSelect(event) {

    // retirar a class .active (dos botoes)
    document.querySelectorAll('.button-select button')
    .forEach( function(button) {
        button.classList.remove('active') 
    })
    
    // colocar a class .active nesse botao clicado
    const button = event.currentTarget
    button.classList.add('active')

    // atualizar o meu input hidden com o valor selecionado
    const input = document.querySelector('[name="open_on_weekends"]')
    
    input.value = button.dataset.value
}

function validate(event) {

    // validar se lat e lng estao preenchidos
    const needsLatAndLng = false;
    if(needsLatAndLng) {
        event.preventDefault()
        alert('Selecione um ponto no mapa')
    }
    
}

function addMarker({id, name, lat, lng}) {

    // create popup overlay
    const popup = L.popup({
        closeButton: false,
        className: 'map-popup',
        minWidth: 240,
        minHeight: 240
    }).setContent(`${name} <a href="./hostel.php?hostel=${id}"><img src=./assets/img/img2/logo/icon-house.svg" > </a>`)


    // create and add marker
    L
    .marker([lat, lng], { icon })
    .addTo(map)
    .bindPopup(popup)
}

// const hostelSpan = document.querySelectorAll('.hostel span')

// hostelSpan.forEach( span => {
//     const hostel = {
//         id: span.dataset.id,
//         name: span.dataset.name,
//         lat: span.dataset.lat,
//         lng: span.dataset.lng
//     }

//     addMarker(hostel)    
// })