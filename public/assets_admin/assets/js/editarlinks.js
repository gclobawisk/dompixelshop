function editarLink(e){
    

    var linha = $(e).closest("tr");

    var edit_thumb_post = linha.find("td:eq(0)").text().trim(); // IMAGEM
    var edit_id_post = linha.find("td:eq(1)").text().trim(); // ID
    var edit_titulo_post = linha.find("td:eq(2)").text().trim(); // TÍTULO
    var edit_link_post = linha.find("td:eq(3)").text().trim(); // LINK
    //var li_url = linha.find("td:eq(4)").text().trim(); // DATA
    var edit_keywords_post = linha.find("td:eq(5)").text().trim(); // KEYWORDS
    var edit_tags = linha.find("td:eq(6)").text().trim(); // TAGS
    var edit_meta_description_post = linha.find("td:eq(7)").text().trim(); // M. Descrip.


    $("#edit_titulo_post").val(edit_titulo_post);
    $("#edit_link_post").val(edit_link_post);
    $("#edit_id_post").val(edit_id_post); //DATA
    $("#edit_keywords_post").val(edit_keywords_post);
    $("#edit_tags").val(edit_tags);
    $("#edit_meta_description_post").val(edit_meta_description_post);

}