$(document).ready(function () {
    const markdowEditor = $("#conteudo");
    const converter = new showdown.Converter();

    markdowEditor.keyup(function(e){
        const {value} = e.target;

        window.localStorage.setItem('markdown', e);

        const html = converter.makeHtml(value);

        $("#preview").html(html);
    })

});