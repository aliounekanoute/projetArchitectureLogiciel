function showForm(id){
  document.getElementById(id).style.display='block';
}

function closeForm(id) {
  document.getElementById(id).style.display='none';
}


$("#addArticleForm").submit((e) =>
{
    e.preventDefault();
    var formData = new FormData(e.target);
    formData.append('requete','addArticle');
    $.ajax({
      url : './admin/admin.php',
      type : 'POST',
      data : formData,
      async : true,
      success : function(response){
        alert(response);
        window.location.reload() = true;
      },
      cache : false,
      contentType : false,
      processData : false,
      error : (error) => {
        alert(error);
      }
    });
});

$("#addCategoryForm").submit((e) =>
{
  e.preventDefault();
  var formData = new FormData(e.target);
  formData.append('requete','addCategory');
  $.ajax({
    url : './admin/admin.php',
    type : 'POST',
    data : formData,
    async : true,
    success : function(response){
      alert(response);
      window.location.reload() = true;
    },
    cache : false,
    contentType : false,
    processData : false,
    error : (error) => {
      alert(error);
    }
  });
});
