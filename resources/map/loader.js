window.onload = function(){

	if (navigator.geolocation)
	{
			navigator.geolocation.watchPosition(showPosition);
			//frontpage.listingbtn();
			//frontpage.category();
			//frontpage.mainmenu();
			//search.keyword();
			//search.opensearch();

	}
	else{
			console.log("Geolocation is not supported by this browser.");
	}

};
