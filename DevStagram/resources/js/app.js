import Dropzone from "dropzone";
//Original code
Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tú imagen',
    acceptedFiles: ".jpg, .png, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false, 
    
    init:function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value.trim();
            console.log(imagenPublicada.name);

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

dropzone.on('success', function(file, response){
    console.log(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = '';
});

// import Dropzone from "dropzone";

// Dropzone.autoDiscover = false;

// const dropzone = new Dropzone('#dropzone', {
//     dictDefaultMessage: 'Sube aquí tu imagen',
//     acceptedFiles: ".jpg, .png, .jpeg, .gif",
//     addRemoveLinks: true,
//     dictRemoveFile: 'Borrar Archivo',
//     maxFiles: 1,
//     uploadMultiple: false, 
    
//     init: function() {
//         const imagenInput = document.querySelector('[name="imagen"]');
//         const imagenValor = imagenInput.value.trim();
        
//         if (imagenValor) {
//             const imagenPublicada = {
//                 size: 1234,
//                 name: imagenValor,
//             };

//             console.log("Nombre de imagen antes de añadir a Dropzone:", imagenPublicada.name);

//             this.options.addedfile.call(this, imagenPublicada);
//             this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
//             imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");

//             console.log("Nombre de imagen después de añadir a Dropzone:", imagenPublicada.name);
//         }
//     },
// });

// dropzone.on('success', function(file, response) {
//     console.log("Respuesta del servidor:", response);
//     console.log("Imagen guardada en el servidor:", response.imagen);
//     document.querySelector('[name="imagen"]').value = response.imagen;
// });

// dropzone.on('removedfile', function() {
//     document.querySelector('[name="imagen"]').value = '';
// });
