$(".article").on("click",".afficher",function(e)
{
  const articleId = $(e.target).closest("a").data("id");
  //alert(articleId);
  formData = new FormData();
  formData.append('requete','getArticleById');
  formData.append('id',articleId);
  $.ajax({
    url : '../requete.php',
    type : 'POST',
    data : formData,
    async : true,
    success : function(response){
      var titre,contenu;
      var vir = response.indexOf(',');
      titre = response.slice(0, vir);
      contenu = response.slice(vir+1, response.length);
      //alert(titre+'  '+contenu);
      var gauche = document.getElementById('gauche');
      while (gauche.firstChild)
      {
        gauche.removeChild(gauche.firstChild);
      }
      var div = document.createElement('div');
      var a = document.createElement('a');
      a.setAttribute('href','index.php');
      a.innerHTML = 'page d\'acceuil';
      div.appendChild(a);
      div.classList.add('div')
      gauche.appendChild(div);
      var h2 = document.createElement('h2');
      var p = document.createElement('p');
      h2.innerHTML = titre;
      p.innerHTML = contenu;
      div.appendChild(h2);
      div.appendChild(p);
    },
    cache : false,
    contentType : false,
    processData : false,
    error : (error) => {
      alert(error)
    }
  });
});

/*$(".category").on("click",".afficher",function(e)
{
  const id_category = $(e.target).closest("a").data("id");
  //alert(id_category);
  formData = new FormData();
  formData.append('requete','getArticleByCategoryId');
  formData.append('id',id_category);
  $.ajax({
    url : '../requete.php',
    type : 'POST',
    data : formData,
    async : true,
    success : function(response){
      //console.log(response.length);
      var id,titre,contenu,vir = 0,i,j = 0;
      var ul = document.getElementById('LastArticle');
      var ul1,a,li,br,p;
      var responseLength = response.length;
      var gauche = document.getElementById('gauche');
      while (gauche.firstChild)
      {
        gauche.removeChild(gauche.firstChild);
      }
      for(i = 0 ; i < responseLength ; i++)
      {
        ul1 = document.createElement('ul');
        li = document.createElement('li');
        li.classList.add('article');
        a = document.createElement('a');
        a.classList.add('afficher');
        br = document.createElement('br');
        p = document.createElement('p');
        p.classList.add('p');
        vir = response.indexOf(',',vir);
        id = response.slice(j , vir);
        a.setAttribute('data-id',id);
        vir++;
        j += (++id.length);
        vir = response.indexOf(',',vir);
        titre = response.slice(j, vir);
        a.innerHTML = titre;
        vir++;
        j += (++titre.length);
        vir = response.indexOf(',',vir);
        contenu = response.slice(j, vir);
        p.innerHTML = contenu;
        vir++;
        j += (++contenu.length);
        vir = response.indexOf(';',vir);
        i = vir;
        li.appendChild(a);
        li.appendChild(br);
        li.appendChild(p);
        ul1.appendChild(li);
        ul.appendChild(ul1);
        console.log(titre);
      }
    },
    cache : false,
    contentType : false,
    processData : false,
    error : (error) => {
      alert(error)
    }
    });
});*/

$(".category").on("click",".afficher",function(e){
  const id_category = $(e.target).closest("a").data("id");
  document.location.href="index.php?requete=getArticleByCategoryId&id="+id_category;
});
