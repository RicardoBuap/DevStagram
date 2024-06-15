import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aquí tú imagen',
    acceptedFiles: ".jpg, .png, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on("sending", function(file, xhr, forData){
    console.log(FormData);
});

dropzone.on("success", function(file, response){
    console.log(response);
});

dropzone.on("error", function(file, message){
    console.log(message);
});

dropzone.on("removedfile", function(){
    console.log("Archivo Eliminado")
});