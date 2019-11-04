var xhttp 	= new XMLHttpRequest();
var _data;

var __Ajax = {

      start: function(){
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              _data = this.responseText;
          }
        }

      },
      post: function(_httpurl,params){
        xhttp.open("POST", _httpurl , true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
      },
      loadJson: function(){
            var jsondata = JSON.parse(_data);
            return jsondata;
      }

}
