import Dropzone from 'dropzone';

if(document.getElementById('dropzone')){
    Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage:'Sube aqui tu imagen',
    acceptedFiles:'.png, .jpg, .jpeg, .gif',
    addRemoveLinks:true,
    dictRemoveFile:'Borrar Archivo',
    maxFiles:1,
    uploadMultiple:false,

    init:function(){
        //Para recuoperar la imagen si en dado caso no se pasa la validacion de los otros inputs
        if( document.querySelector('[name="imagen"]').value.trim()){
                const imagenPublicada={}
                imagenPublicada.size =1234;
                imagenPublicada.name= document.querySelector('[name="imagen"]').value;

                //
                this.options.addedfile.call(this, imagenPublicada);
                // se pasa la ruta de la img en el servidor
                this.options.thumbnail.call(this, imagenPublicada,`/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-success','dz-complete');

        }
    }
});

// dropzone.on('sending', function (file,xhr, formData){
//     console.log(formData)
// })

//Obtener el nombre de la imgern y agregarlo al html al input imagen
dropzone.on('success', function (file,response){
    console.log(response.imagen)
    document.querySelector('[name="imagen"]').value = response.imagen;
})
dropzone.on('error', function (file,message){
    console.log(message)
})
dropzone.on('removedfile', function (){
   
    document.querySelector('[name="imagen"]').value = '';
    console.log( document.querySelector('[name="imagen"]').value = '')


})

}
