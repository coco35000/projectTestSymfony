$(document).ready(()=> {
    console.log("ONLOAD ckeditor.js")
    let editorCK;

    // Création de l'éditeur ckeditor
    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            editorCK = editor;
        })
        .catch( error => {
            console.error(error);
        });

    $('#savePage').on('click', (event) => {
        event.preventDefault();

        const dataEditor = editorCK.getData();
        const valueNamePage = document.getElementById("inputNamePage").value;

        $.ajax({
            method: 'POST',
            url: 'http://127.0.0.1:8000/gestion/createpage',
            data: {
                inputNamePage: valueNamePage,
                dataEditor: dataEditor
            },
            dataType: 'text',
            success: response => {
                console.log(response);
            },
            error: error => {
                console.log(error);
            }
        });
    });

});