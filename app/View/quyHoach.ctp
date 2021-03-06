<div class="col-xs-12 col-planning-map mb10">
<div class="title-group">
<h1 id="mapName">Bản đồ quy hoạch Tp. Hồ Chí Minh</h1>
</div>
<div id="id_content_view" class='content_view'>
	<form class="form-horizontal" style="display: block;" on>
		<ul class="row fillter">
			<li class="col-lg-2 col-md-2 col-sm-3"><select class="combobox"
				id="DistrictId" style="display: block;">
				<value>
				-- Chọn Quận / Huyện --
				</value>
			</select> <input id="ipDistrictId" name="DistrictId" type="hidden" /></li>
			<li class="col-lg-2 col-md-2 col-sm-3"><select class="combobox"
				id="WardId" style="display: block;">
				<value>
				-- Chọn Phường / Xã --
				</value>
			</select> <input id="ipWardId" name="WardId" type="hidden" /></li>
			<li class="col-lg-2 col-md-2 col-sm-3"><input type="submit"
				value="Xem bản đồ quy hoạch"></li>
		</ul>
	</form>
	</div>
	<div id="photo" tabindex="0" style="position: relative;width: 900px;height: 700px;"></div>
</div>
<script type="text/javascript">	
		var url_string = window.location.href;
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		var url = url_string.replace('/quyHoach','');
		var district = "";
		var ward = "";
		var isloading = false;
		window.onload = function() {
			isloading = true;
		}
		district = getParameterByName("DistrictId", url_string);
		ward = getParameterByName("WardId", url_string);
		/*if(msie > 0 && !!document.documentMode == true || navigator.appVersion.indexOf('Trident/') > 0){
			district = getParameterByName("DistrictId", url_string);
			ward = getParameterByName("WardId", url_string);
		} else{
			url = new URL(url_string);
			district = url.searchParams.get("DistrictId");
			ward = url.searchParams.get("WardId");
		}*/		
		console.log(district);
		console.log(ward);
		var cbbDistrict = document.getElementById('DistrictId'),
		cbbWard = document.getElementById('WardId');
		
      var map = L.map('photo').setView(new L.LatLng(0,0), 0);
		
		// load combobox data
		$.getJSON("<?php echo RwsConstant::FULL_BASE_URL_HOST;?>" + "/maps/Data/data.json", function( json ) {
			console.log( "JSON Data: " + json);
			empty(cbbDistrict);
			addOption("","-- Chọn Quận / Huyện --", cbbDistrict);		
			var quans = [];
			for(var t = 0; t < json.data.length; t++){
				var quanInfo = json.data[t];
				quans.push(quanInfo);
			}
			quans.sort(function(a,b) {return (a.sort > b.sort) ? 1 : ((b.sort > a.sort) ? -1 : 0);} );
			addQuanOptions(quans);
			$('#DistrictId').val(district).trigger('change');
		});		
			
		var iwidth = 14040;
		var iheight = 9930;
		function parse(document){
			iwidth = document.firstChild.attributes["WIDTH"].value;
			iheight = document.firstChild.attributes["HEIGHT"].value;
			L.tileLayer.zoomify('<?php echo RwsConstant::FULL_BASE_URL_HOST;?>' + '/maps/Maps/'+district+'/'+ward+'/', { 
				width: iwidth, 
				height: iheight,
				tolerance: 1,
				attribution: 'Photo: CCH'
			}).addTo(map);
		}
			
		// load map
		if(district != null && ward != null){
			$.ajax({
				url: '<?php echo RwsConstant::FULL_BASE_URL_HOST;?>' + '/maps/Maps/' +district+ '/' + ward + '/ImageProperties.xml', // name of file you want to parse
				dataType: "xml",
				success: parse,
				error: function(){alert("Error: don't load file - Something went wrong");}
			});											
		}   
		
		cbbDistrict.onchange = function (e) {
			var val = e.target.value;
			document.getElementById('ipDistrictId').value = val;
			$.getJSON("<?php echo RwsConstant::FULL_BASE_URL_HOST;?>" + "/maps/Data/data_sort.json", function( json ) {
				console.log( "JSON Data: " + json);
				empty(cbbWard);
				addOption("", "-- Chọn Phường / Xã --", cbbWard);
				for(var t = 0; t < json.data.length; t++){
					var quanInfo = json.data[t];
					if(quanInfo.id == val){		
						var phuongs = [];
						for(var i=0;i<quanInfo.phuong.length;i++){
							console.log( "JSON Data: " + quanInfo.phuong.length);
							phuongs.push(quanInfo.phuong[i]);							
						}
						phuongs.sort(function(a,b) {return (a.sort > b.sort) ? 1 : ((b.sort > a.sort) ? -1 : 0);} );
						addPhuongOptions(phuongs);
					}
				}
				if(isloading && ward != null){				
					$('#WardId').val(ward).trigger('change');
					isloading = false;					
				}
			})		
		};
		cbbWard.onchange = function(e){
			document.getElementById('ipWardId').value = e.target.value;
		}
		function empty(select) {
			select.innerHTML = '';
		}
		
		function addOption(val, text, select) {
			var option = document.createElement('option');
			option.value = val;
			option.innerHTML = text;			
			select.appendChild(option);
		}
		
		function addQuanOptions(quans) {		
			for(var i=0;i<quans.length;i++){
				var option = document.createElement('option');
				option.value = quans[i].id;
				option.innerHTML = quans[i].quan;			
				cbbDistrict.appendChild(option);
			}			
		}
		
		function addPhuongOptions(phuongs) {		
			for(var i=0;i<phuongs.length;i++){
				var option = document.createElement('option');
				option.value = phuongs[i].id;
				option.innerHTML = phuongs[i].ten;			
				cbbWard.appendChild(option);
			}			
		}
		
		function getParameterByName(name, url) {
			if (!url) url = window.location.href;
			name = name.replace(/[\[\]]/g, "\\$&");
			var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		
    </script>
