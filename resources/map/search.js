var searchText = document.getElementById("searchText");
var opensearch = document.getElementById("opensearch");
var hint = document.getElementById("hint");
var jsonResult,htmlresult,id;
var search = {

  keyword: function(){
      searchText.addEventListener("keyup", function(){
        //console.log(searchText.value.length);

        if(searchText.value !== ""){
            hint.style.display = "block";
            htmlresult ="";
            __Ajax.start();
            __Ajax.post(BASEURL +"front/search", "title="+searchText.value);
            jsonResult = __Ajax.loadJson();
            //console.log(jsonResult);
            for(var i = 0; i<jsonResult.length; i++){
                if(typeof jsonResult[i].name !==undefined){
                  id = jsonResult[i].id;
                  htmlresult += "<p style='text-align:left;font-size:15px; padding:0; margin:0; line-height:40px;'>"+"<a href='#' onclick='searchbyname("+id+");' style='width:100%; display:block; text-decoration:none; border-bottom:1px solid #ccc; color:green;'>" + jsonResult[i].name +"</a>"+"</p>";

                }
            }
            if(htmlresult !==""){
                hint.innerHTML = htmlresult;
            }else{
                hint.innerHTML = "<h5 style='text-align:center;'>No Result Found</h5>";
                //hint.style.display="none";
            }

        }else{
            hint.style.display="none";
        }


      });

    },
    opensearch: function(){
        var count = 0;
        opensearch.addEventListener("click", function(e){
        
          			count++;
          			if(count ==1 ){
          				searchText.style.display="block";
          				count = -1;
          			}else{
          				searchText.style.display="none";
                  hint.style.display="none";
          				count = 0;
          			}
          e.preventDefault();
        });
    }

}

function searchbyname(ID){
  __Ajax.start();
  __Ajax.post(BASEURL + "map", "ID="+ID +"&type=searchbyname");
  jsonResult = __Ajax.loadJson();

  //console.log(data);
  for(var i =0; i<jsonResult.length; i++){
    frontpage.marker(jsonResult[i]['Y'],jsonResult[i]['X'],jsonResult[i]['Name'],jsonResult[i]['Pic_Url'],jsonResult[i]['distance'],jsonResult[i]['Phone'],jsonResult[i]['id']);
    console.log(jsonResult[i]['Name']);
  }
  //window.testMarker.remove();
  hint.style.display="none";

  //console.log(jsonResult);
  //alert(ID);

}
