$(document).ready(function () {
    const markdowEditor = $("#conteudo");
    const converter = new showdown.Converter();
    converter.setOption('simpleLineBreaks', true); //Quebra a linha segundo a escrita;

    markdowEditor.keyup(function(e){
        const {value} = e.target;

        window.localStorage.setItem('markdown', e);

        const html = converter.makeHtml(value);

        $("#preview").html(html);
    });

    $("#ismarkdown").on("click", function (){
        $("#preview").toggle();
    });

    
});