
var Nearby	= document.getElementById("Nearby");
var listingsbtn = document.getElementById("listingsbtn");
var lists				= document.getElementById("lists");
var map 				= document.getElementById('map');
var HTML 				= "";
var details 		= document.getElementById("details");
var lat,lng,leafletMap;
var mainmenu 		= document.getElementById("mainmenu");
var menulists 	= document.getElementById("menulists");

var frontpage =  {

	load: function(lat,lng){

			leafletMap  = L.map('map', {
			     crs: L.CRS.Baidu,
			     minZoom: 3,
			     maxZoom: 18,
			     attributionControl: false,
			     //center: [32.109333, 34.855499],
					 center: [lat,lng],
					 zoom: 14
			});
			//控制地图底图
			L.control.layers(
			{
			 "百度地图": L.tileLayer.baidu({ layer: 'vec' }).addTo(leafletMap),
			 "百度卫星": L.tileLayer.baidu({ layer: 'img' }),
			 "百度地图-大字体": L.tileLayer.baidu({ layer: 'vec',bigfont:true }),
			 "百度卫星-大字体": L.tileLayer.baidu({ layer: 'img', bigfont: true }),
			 "自定义样式-黑色地图": L.tileLayer.baidu({ layer: 'custom', customid:'dark' }),
			 "自定义样式-蓝色地图": L.tileLayer.baidu({ layer: 'custom', customid:'midnight' })
			 },
			 {
			  "实时交通信息": L.tileLayer.baidu({ layer: 'time' })
			 },
			 { position: "topright" }).addTo(leafletMap);
			 // test
			 //new L.marker([31.839177, 117.232039]).addTo(leafletMap);

	},
	Nearby: function(lat,lng){
			console.log("NEARBY LAT LONG: " + lat + " " +lng);

		//Nearby.addEventListener("touchstart", function(e){
			map.style.display ="block";
			lists.style.display ="none";

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var data = JSON.parse(this.responseText);


					console.log(data);
					for(var i =0; i<data.length; i++){
						frontpage.marker(data[i]['X'],data[i]['Y'],data[i]['Name'],data[i]['Pic_Url'],data[i]['distance'],data[i]['Phone'],data[i]['id']);
						//console.log(data[i]['Name']);
					}

				}
			};
			xhttp.open("POST", BASEURL + "map", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//xhttp.send("lat=32.109333&lng=34.855499");
			xhttp.send("lat="+lat+"&lng="+lng);


	},
	mylocation: function(lat,lng){
		window.testMarker = L.marker([lat, lng], { icon: L.icon({
			iconUrl: BASEURL + 'images/you.png',
			iconSize: [43, 64],
			iconAnchor: [22, 64],
			popupAnchor: [0, -64]
		})} ).addTo(leafletMap); // add to, adds marker to the map

	},
	marker: function(lat,lng,businessname,img,distance,phone,ID) {
		var title = new L.TextIcon({ text: title, color: 'red' });

		window.testMarker = L.marker([lat, lng], {icon: title}).addTo(leafletMap);

		testMarker.myPopupInfo = L.popup({autoClose: false, closeOnClick: true, autoPan: false});
		testMarker.myPopupInfo.setContent("<img src='https://business-images.unl.edu/content/tile_campus_571.jpg' style='width:222px;'><h3 style='margin:0; padding:0; color: #fff;  font-size: 15px; '>"+businessname+"</h3><p style='font-size:14px; padding:0; margin:0; text-align:left; color:#F6C22E;'> Distance: " +distance+"<span style='clear:both; display:block; margin-right:10px;'><strong>Phone:</strong>"+phone+"</span></p>" +"<a href='#' onclick='view("+ID+")' style='float:right; margin-right:5px; padding:10px; color:#fff; background:#379ADD; border-radius:10px;'>VIEW</a></p>");
		testMarker.bindPopup(testMarker.myPopupInfo);
		testMarker.on('click', function(e){
		testMarker.openPopup();

		});
	},
	listingbtn: function(){

			listingsbtn.addEventListener("touchstart", function(){
			lists.style.display ="block";
			map.style.display ="none";
			HTML +="<div style='position:fixed; top:0; background:#5AABB8; width:100%; padding:5px;'><h5 style='text-align:center; color:#fff; padding:0; margin:0;'>Search Results</h5></div>"
			HTML +="<div style='width:100%; height:40px;'></div>";
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					//console.log(data);
					for(var i =0; i<data.length; i++){
						HTML += "<div style='position:relative; border-bottom:1px solid #51A7B4; padding:5px; height:200px; margin-bottom:5px; '>";

						HTML += "<h6 style='margin:0; padding:0; font-weight:700;'><a href='#' style='color:#51A7B4; text-decoration:none; display:block;'>" + data[i]['Name'] + "</a></h6>";
						HTML += "<p style='margin:0; padding:0; font-size:20px;'>" + data[i]["ShortDescription"] + "</p>";
						HTML += "<span style='position:absolute; bottom:50px; left:5px;  font-size:15px; '><strong>Phone: " + data[i]['Phone'] + "</strong></span>";
						HTML += "<span style='position:absolute; bottom:50px; right:5px;  font-size:15px; '><strong>City: " + data[i]['City'] + "</strong></span>";
						HTML += "<span style='position:absolute; bottom:5px; right:5px;  font-size:15px; color:#fff; background:#FF8501; padding:10px; border-radius'><strong><a href='#' onclick='view("+data[i]['id']+")'>View Details</a></strong></span>";

						HTML +="</div>";
						lists.innerHTML = HTML;
					}

				}
			};
			xhttp.open("POST", BASEURL + "map", true);
			//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("lat=32.109333&lng=34.855499");
		});

	},
	category: function(){
		var category = document.getElementById("Category");
		var categories = document.getElementById("categories");
		var count = 0;
		category.addEventListener("touchstart", function(){
					count++;
				if(count ==1 ){
					categories.style.display="block";
					count = -1;
				}else{
					categories.style.display="none";
					count = 0;
				}	//alert(1);
		},false);

	},
	mainmenu: function(){
		var count = 0;
		mainmenu.addEventListener("touchstart", function(e){
			count++;
			if(count ==1 ){
				menulists.style.display="block";
				count = -1;
			}else{
				menulists.style.display="none";
				count = 0;
			}

			e.preventDefault();
		});

	}

}






function showPosition(position){
	 lat = position.coords.latitude;
	 lng = position.coords.longitude;
	 frontpage.load(lat, lng);
	 //frontpage.mylocation(lat, lng);
	 console.log(lat + " , " + lng);

}

function view(ID){
	var output = "";

	details.classList.add("selected");
	details.classList.remove("dismiss");
	details.style.display="block";
	output += "<img src='https://business-images.unl.edu/content/tile_campus_571.jpg' style='width:100%;'>";
	output +="<div style='width:100%; background:#F5F5F5; overflow:auto;'>";
	output +="<a href='#' class='dsbtn'>Get Direction</a><a href='#' class='dsbtn' onclick='dsclose()'>CLOSE</a>"
	output +="</div>";
	xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					//output += this.responseText;
					//console.log(data);
					for(var i =0; i<data.length; i++){
						output += "<h6 style='margin:0; margin-bottom:5px; padding:0; font-weight:700; font-size: 25px; padding-left: 10px;'><a href='#' style='color:#51A7B4; text-decoration:none; display:block;'>" + data[i]['Name'] + "</a></h6>"
						output += "<div style='position:relative; width:100%; clear:both; border-bottom:1px solid #51A7B4; padding:5px; overflow:auto; margin-bottom:5px; '>";
						output += "<div class='dsbtn2'><a href='javascript:void()' onclick='waypoints()'><i class='fas fa-directions'></i></a><span>Direction</span></div>";
						output += "<div class='dsbtn2'><a href='#'><i class='fas fa-heart'></i></a><span>Add to my List</span></div>";
						output += "<div class='dsbtn2'><a href='#'><i class='fas fa-volume-up'></i></a><span>Audio</span></div>";
						output += "<div class='dsbtn2'><a href='#'><i class='fas fa-cloud-download-alt'></i></a><span>Download PDF</span></div>";
						output += "<div class='dsbtn3'><a href='#'><i class='fas fa-video'></i></a><span>Video</span></div>";
						output += "<div class='dsbtn3'>";
						output += "<p style='text-align:left; margin:0;  margin-bottom:5px; padding:5px; font-size:20px;'><strong>Opening Hours: </strong>" + data[i]["Opening_Hours"] + "</p>";
						output += "</div>";
						output += "<div class='dsbtn3'>";
						output += "<p style='text-align:left;  margin:0;  margin-bottom:5px; padding:5px; font-size:19px;'> <strong>Description:</strong> <br />" + data[i]["ShortDescription"] + "</p>";
						output += "</div>";
						output += "<div class='dsbtn3'>";
						output += "<p style='text-align:left;  margin:0;  margin-bottom:5px; padding:5px; font-size:19px;'><strong>Parking:</strong>&nbsp;&nbsp;" + data[i]["Parking"] + "&nbsp;&nbsp; <strong>Near To:</strong>" +data[i]["Near_To"]+"</p>";
						output += "</div>";

					}
						details.innerHTML = output;
				}
	};
	xhttp.open("POST", BASEURL + "map/detail/", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("ID=" + ID);


}

function dsclose(){
	details.classList.add("dismiss");
	details.classList.remove("selected");
	setTimeout(function(){
		details.style.display ="none";
	}, 2000);


}

function nearby(){
	frontpage.mylocation(lat,lng);
	window.testMarker.remove();
	frontpage.Nearby(lat,lng);

}

function createButton(label, container) {
    var btn = L.DomUtil.create('button', '', container);
    btn.setAttribute('type', 'button');
    btn.innerHTML = label;
    return btn;
}


function waypoints(){
	details.classList.add("dismiss");
	var ReversablePlan = L.Routing.Plan.extend({
    createGeocoders: function() {
        var container = L.Routing.Plan.prototype.createGeocoders.call(this),
            reverseButton = createButton('↑↓', container);
        return container;
    	}
	 });
	var plan = new ReversablePlan([
        L.latLng(57.74, 11.94),
        L.latLng(57.6792, 11.949)
    ], {
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true
    }),
    control = L.Routing.control({
        routeWhileDragging: true,
        plan: plan
    }).addTo(leafletMap);

}




// remove marker
// window.testMarker.remove();
