import Dropzone from 'dropzone';
Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage:'Sube aqui tu imagen',
    acceptedFiles:'.png, .jpg, .jpeg, .gif',
    addRemoveLinks:true,
    dictRemoveFile:'Borrar Archivo',
    maxFiles:1,
    uploadMultiple:false,
});

// dropzone.on('sending', function (file,xhr, formData){
//     console.log(formData)
// })

//Obtener el nombre de la imgern y agregarlo al html al input imagen
dropzone.on('success', function (file,response){
    console.log(response.imagen)
    document.querySelector('[name="imagen"]').value = response.imagen
})
dropzone.on('error', function (file,message){
    console.log(message)
})
// dropzone.on('removedfiles', function (file,message){
//     console.log(message)
// })

