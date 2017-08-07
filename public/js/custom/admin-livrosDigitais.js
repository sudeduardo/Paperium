$(document).ready(function(){
    $('#tabela-autores').DataTable({
        "pageLength": 10, //numero de itens por pagina
        "info" : false,   //informaçoes
        "lengthChange": false,  //usuario mudar itens/pagina
        "order": [[ 1, "asc" ]], //coluna q indica ordem
        "language": {           //linguagem
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "columnDefs": [
            { "orderable": false, "targets": [-1,-2] } //colunas q n podem ser ordenadas
        ]
    });

    $('#tabela-generos').DataTable({
        "pageLength": 10,
        "info" : false,
        "lengthChange": false,
        "order": [[ 1, "asc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "columnDefs": [
            { "orderable": false, "targets": [-1,-2] }
        ]
    });

    $('#tabela-livros').DataTable({
        "pageLength": 10,
        "info" : false,
        "lengthChange": false,
        "order": [[ 1, "asc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "columnDefs": [
            { "orderable": false, "targets": [-1,-2] }
        ]
    });

    $('#tabela-livros-autor').DataTable({
        "pageLength": 15,
        "info" : false,
        "lengthChange": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
    });

    $('#tabela-livros-genero').DataTable({
        "pageLength": 15,
        "info" : false,
        "lengthChange": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
    });

    $('#img-genero').fileinput({
        language:'pt-BR',
        showUpload:false,
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        previewFileType:'image',
        previewSettings: {image: { width: "200px", height: "200px" }},
        browseClass: "btn btn-success",
        browseLabel: "Selecionar",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "Remover",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> "
    }).on('fileloaded',function(event){ //gambiarra ja q n tem achei como tirar na mão
        $('.file-actions').remove();
    });

    $('#capa-livro').fileinput({
        language:'pt-BR',
        showUpload:false,
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        previewFileType:'image',
        previewSettings: {image: { width: "200px", height: "200px" }},
        browseClass: "btn btn-success",
        browseLabel: "Selecionar Capa",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "Remover",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> "
    }).on('fileloaded',function(event){ //gambiarra ja q n tem achei como tirar na mão
        $('.file-actions').remove();
    });

    $('#pdf-livro').fileinput({
        language:'pt-BR',
        showUpload:false,
        allowedFileExtensions: ["pdf"],
        previewFileType:'pdf',
        previewSettings: {pdf: { width: "200px", height: "200px" }},
        browseClass: "btn btn-success",
        browseLabel: "Selecionar PDF",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "Remover",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> "
    }).on('fileloaded',function(event){ //gambiarra ja q n tem achei como tirar na mão
        $('.file-actions').remove();
    });

    $('#select-genero').select2({
        placeholder : "Gênero",
        allowClear : true
    });

    $('#select-autor').select2({
        placeholder : "Autor"
    });

});
