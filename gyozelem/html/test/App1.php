<!DOCTYPE html>
<html>
	<head>
		<title>JS MVC</title>
		<meta charset="UTF-8">
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="John Doe">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/test/css/index.css" type="text/css"/>
	</head>
	<body>
		<div class="modal-layer">
			<div id="AddNews" class="window"><div class="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Új hír szerkesztése</b><div class="close" onclick="core.closeModalWindow('#AddNews');">&times;</div></div> 
				<div class="content">
					<br>Ki láthatja: <select name="cat"><option value='0'>Nyilvános</option><option value='1'>Bejelentkezet</option><option value='2'>Tag</option><option value='3'>Moderátor</option></select><br>
					<br>Cím: <input type="text" name="Newstit" maxlength="50"><br>
					<br>Szöveg: <br><textarea name="txt" id="txt" onKeyUp="alert(this.value);counttext();"></textarea><br><br>
					<span class="button"> Ment </span>&nbsp;&nbsp;<span class="button" onclick="core.closeModalWindow('#AddNews');"> Mégse </span>
				</div>
			</div>
		</div>
		
		<div class="header-line">
			<div class="burger">
				<input type="checkbox" />
				<span class="burger-line"></span>
				<span class="burger-line"></span>
				<span class="burger-line"></span>
				<span class="burger-line"></span>
				<span id="burger_menu">
					<nav>
						<a href="/home" title="Vissza a főoldalra"> <span class="menuButton" href="/3"><img src="/test/img/icons/menu/home.png"></span></a>	
						<a href="javascript:void(0);" title="Események megtekintése"> <span class="menuButton"> <img src="/test/img/icons/menu/calendar.png"></span></a>	
						<a href="javascript:void(0);" title="Videók megtekintése"> <span class="menuButton"> <img src="/test/img/icons/menu/videos.png"></span></a>	
						<a href="javascript:void(0);" title="Kép galéria megtekintése"> <span class="menuButton"> <img src="/test/img/icons/menu/albums.png"></span></a>	
						<a href="javascript:void(0);" title="Dicséretek halgatása vagy letöltése"> <span class="menuButton"> <img src="/test/img/icons/menu/worship.png"></span></a>	
						<a href="javascript:void(0);" title="Ugrás az Online Biblia oldalra"> <span class="menuButton"> <img src="/test/img/icons/menu/bible.png"></span></a>	
						<a href="javascript:void(0);" title="Üzenőfal megtekintése"> <span class="menuButton"> <img src="/test/img/icons/menu/wall.png"></span></a>	
						<a href="javascript:void(0);" title="Cikkek megtekintése"> <span class="menuButton"> <img src="/test/img/icons/menu/articles.png"></span></a>
					</nav>
					<span class="log-related">
						<span class="log-in">
							<a href="javascript:void(0);" title="Üzenetek megtekintése"><span class="menuButton"> <img src="/test/img/icons/menu/messages.png"></span></a>	
							<a href="javascript:void(0);" title="Beállítások megtekintése"><span class="menuButton"> <img src="/test/img/icons/menu/settings.png"></span></a>
							<a href="javascript:void(0);" title="Kijelentkezés"><span class="menuButton"> <img src="/test/img/icons/menu/logout.png"></span> </a>					
						</span>
						<span class="logout">
							<a href="javascript:void(0);" title="Bejelentkezés"><span class="menuButton"> <img src="/test/img/icons/menu/login.png"></span> </a>
						</span>
					</span>
				</span>					
			</div>		
		</div>		
		<div class="grid">
			<header>
				<div class="shadow"></div>
				<div class="log-menu">
					<div class="logged">
						<a href="javascript:void(0);" title="Üzenetek megtekintése"> <img src="/test/img/icons/menu/messages.png"> </a>	
						<a href="javascript:void(0);" title="Beállítások megtekintése"> <img src="/test/img/icons/menu/settings.png"> </a>
						<a href="javascript:void(0);" title="Kijelentkezés"> <img src="/test/img/icons/menu/logout.png"> </a>
					</div>
					<div class="guest" style="display:none;">
						<a href="javascript:void(0);" title="Bejelentkezés"> <img src="/test/img/icons/menu/login.png"> </a>
					</div>
				</div>
				<picture>
				  <div class="igevers"> </div>				  
				</picture>			
			</header>
			<nav>
				<div class="menu">
					<a href="/home2" title="Vissza a főoldalra"> 121212</a>
					<a href="/home" title="Vissza a főoldalra"> <span class="menuButton"><img src="/test/img/icons/menu/home.png"> <span class="buttonName"> Főoldal </span></span></a>	
					<a href="javascript:void(0);" title="Események megtekintése"> <span class="menuButton"><img src="/test/img/icons/menu/calendar.png"> <span class="buttonName"> Naptár </span></span></a>	
					<a href="javascript:void(0);" title="Videók megtekintése"> <span class="menuButton"><img src="/test/img/icons/menu/videos.png"> <span class="buttonName"> Videók </span></span></a>	
					<a href="javascript:void(0);" title="Kép galéria megtekintése"> <span class="menuButton"><img src="/test/img/icons/menu/albums.png"> <span class="buttonName"> Képek </span></span></a>	
					<a href="javascript:void(0);" title="Dicséretek halgatása vagy letöltése"> <span class="menuButton"><img src="/test/img/icons/menu/worship.png"> <span class="buttonName"> Énekek </span></span></a>	
					<a href="javascript:void(0);" title="Ugrás az Online Biblia oldalra"> <span class="menuButton"><img src="/test/img/icons/menu/bible.png"> <span class="buttonName"> Biblia </span></span></a>	
					<a href="javascript:void(0);" title="Üzenőfal megtekintése"> <span class="menuButton"><img src="/test/img/icons/menu/wall.png"> <span class="buttonName"> Üzenőfal </span></span></a>	
					<a href="javascript:void(0);" title="Cikkek megtekintése"> <span class="menuButton"><img src="/test/img/icons/menu/articles.png"> <span class="buttonName"> Cikkek </span></span></a>	
				</div>
			</nav>
			<div class="page">
				<div class="home">
					<div class="index" style="display: none;">
						<main>
							<div class="content">
								<!-- linkekt s functionket ki kell majdjvitani -->
								<div class="header">
									<h1> </h1><br><br>
									<div class="media">
										<div class="coverFrame"><div class="coverPicture"></div>
										</div>
										<div class="stickyNote">
											<h2>December 25-en</h2>
											<p>ide kerulnek a hirek es esemenyek, az elozmenyeknel pedig megnyithato a regebbi hirek, mint pl mikor kik voltak vendegek stb<br>Az elozo oldalhoz kepes ez itt most jelentosen hosszabodott, szoval tobb szoveg fer ide</p>
											<div class="more button col-gray">Előzmények</div>
										</div>								
									</div>
								</div>	
								<br>
								<h2>Rólunk:</h2> Gyülekezetünk 15 éve jött létre és 7 helységben vannak gyülekezeteink: <a id='NagyvaradBox' onclick=alert('Jobb&nbsp;oldalon&nbsp;látható');>Nagyvárad</a>, <a href='javascript:void(0);' onclick='ShowMissionInfo(1);'>Szalonta</a>, <a href='javascript:void(0);' onclick='ShowMissionInfo(2);'>Székelyhíd</a>, Mónospetri, Bogyoszló, <a href='javascript:void(0);' onclick='ShowMissionInfo(5);'>Margitta</a>, <a href='javascript:void(0);' onclick='ShowMissionInfo(6);'>Érmihályfalva.</a><br><br>
								<h2>Hitünk:</h2> Hiszünk az egy igaz Istenben, Jézus Krisztusban mint Isten fiában aki a mi megváltónk, a Szent Szellemben mint vígasztaló és tanító, a Bibliában mint Isten igéjeben ami Istentől ihletett útmutatónk. Részletes hitvallás <a href='OurFaith.php'> ezen a linken </a> tekinthető meg.<br><br>
								<h2>Vallás:</h2> Jézus nem vallást teremtett hanem keresztény életformát, ez egy helyreállításról szól Isten és emberközt, nem ember által alkotott tradiciókra épül hanem egy élő kapcsolatra.<br>Isten nem egy vallás, nem egy felekezet hanem egy személyes kapcsolat...<br><br>
								<h2>Célunk:</h2> Célunk, hogy emberek megtérjenek, megtapasztálják a Isten szeretetét, áldásait amit Jézus Krisztusban kijelentett az egész világ számára....<br><br>
							</div>
						</main>
						<aside> 
							<div class="fund">
								Ha szeretnéd támogatni anyagilag a gyülekezetet vagy missziókat:
								<br><br><h3>Bank adress:</h3> BANCPOST S.A. str. Tudor Vladimirescu nr. 1
								<br><i><b>ASOCIATIA CENTRUL CRESTIN BIRUINTA</b></i> str. Dunarea nr.13 ORADEA RO
								<br><br><h3>Bank account number:</h3> RO38BPOS05003108254ROL01
								<br><br><span class="red"><b>Swift code:</b></span> BPosRoBu
							</div>
							<div class="social">
								Követhet minket a követkző helyeken:
								<br><br><h3>facebook:</h3> fgfhfhfgh
								<br><br><h3>youtube:</h3> dfgdfdgfdgdfg
							</div>				
							<div class="service">
								<h2>Alkalmaink:</h2><br>
								<b>Istentisztelet:</b> <span class="main-service">Vasárnap 16:00</span><br>
								<b>Imaalkalom:</b> <span class="pray-service">Csütörtök 19:00</span><br>
								<b>Imaéjszaka:</b> <span class="night-service">Minden hó utolsó szombata 19:00</span><br><br>
								<b>Címünk:</b> <p>Románia, Nagyvárad/Oradea, Dunarea utca, 13-as szám.<br>
								<a href='http://maps.google.ro/maps?hl=ro&client=firefox-a&hs=jOB&rls=org.mozilla:en-GB:official&q=oradea%20dunarii%2013&um=1&ie=UTF-8&sa=N&tab=wl'> google map </a> - 
								<a href='http://maps.google.ro/maps?f=q&source=s_q&hl=ro&geocode=&q=oradea+dunarii+13&aq=&sll=47.061791,21.934934&sspn=0.007177,0.013797&g=oradea+dunarea+13&ie=UTF8&hq=&hnear=Strada+Dun%C4%83rea,+Oradea&ll=47.061674,21.933931&spn=0.001794,0.003449&z=18&layer=c&cbll=47.061709,21.933823&panoid=PxLWmzGtTo3-Es2FfLygjg&cbp=12,19.47,,0,23.9'>google map 2</a>
								</p><br>
								<b>Email cím:</b> office@gyozelem.ro 
							</div>
						</aside>
					</div>
				</div>
				<div class="error">
					<div class="index" style="display: none;">			
						<main>
							<b>Error #{{id}}:</b> {{msg}}
						</main>
					</div>			
				</div>					
			</div>
			<footer>
				&copy; 2017 by Varga Zsolt
			</footer>	
		</div>



<script src="/test/js/Router.js" type="text/javascript"></script> 		
<script src="/test/js/Ajax.js" type="text/javascript"></script> 		
<!-- 
<script src="../js/Router.js" type="text/javascript"></script> 		
<script src="/test2/js/Router.js" type="text/javascript"></script> 		-->
<script type="text/javascript">

var App = function() { 

//window.onload = init;
//var isLocalStorageSupported = !!window.localStorage;
	
/*  Setup a new page:
 *     in Route.js->routes array
 *	
*/
//Ajax	
	var pages = {
		home: {
			index: {
				view: {
					render: function(data, template, dom) {

					}					
				},
				model: {
					getData: function(data) {
						return {
							id:1
						}
					}					
				}
			},
		},
		user: {
			edit: {
				view: {
					render: function(data, template, dom) {
						let str = template;
						Object.keys(data).forEach(function(key) {
							str = str.replace("{{"+key+"}}", data[key]);
						//	console.log('render: '+key + ': ' + data[key]);
						});
						//console.log(str);
						dom.innerHTML = str;
					}					
				},
				model: {
					getData: function(data) {
						let page = data.prefix ? data.prefix+' '+data.action : data.action;
						return {
							page
						}
					}					
				}
			},
		},
		error: {
			index: {
				view: {
					render: function(data, template, dom) {
						let str = template;
						Object.keys(data).forEach(function(key) {
							str = str.replace("{{"+key+"}}", data[key]);
						});
						dom.innerHTML = str;
					}
				},
				model: {
					getData: function(data) {

						var arr = [], id = data.param.id;
						arr[403] = "Cannot access page";
						arr[404] = "Page not found";
						return {
							id: id,
							msg: arr[id] || 'Unknown error!',
						}
					}
				},
				templates: {
					link: '<a href="$1">$2</a>',
				},
				element: {
					menu: {
						container: '#menu_list',
						bone: 'link',
						data: [
							[ BASE_ROOT+'/pages/index', 'Pages'],
							[ BASE_ROOT+'/home', 'Home'],
							[ BASE_ROOT+'/users/1', 'View: User #1'],
						]
					}
				
				}
			}
			
		}
	};

	
	function Model() {
		model = null;
	}
	
	function View(){
		view = null
	} 	
	
	function Controller(model, view, middleware){

		this.page = null;
		this.pageData = null;
		this.middleware = middleware;
		this.middleware.add('redirect', setPage); 
		this.model = model;
		this.view = view;
		this.pageEvent = [];

		function setPage(data){
			
			if (this.page) {
				terminate(this.page, this.pageData);
			}
			
			this.pageData = data;
			this.page = getPage( this.pageData.controller, this.pageData.action);
			if (!this.page) { return alert('View not exist, please contact with Admin!'); }
			//console.log(this.page);
			start(this.page, this.pageData);
			//alert(JSON.stringify(data))
		}
		
		function getPage(controller, action) {
			//console.log('.pages .'+controller+' .'+action);
			//console.log(document.querySelector('.page .'+controller+' .'+action).innerHTML);
			return document.querySelector('.page .'+controller+' .'+action);
		}
		
		function terminate(dom, data) {
			// remove listeners
			// remove elements
			// hide view			
			dom.style.display = 'none';
			//reset bone to original
			dom.innerHTML = this.pageBone;
		}
		
		function start(dom, data) {
			// create elements
			// create listeners
			// show view	
			// cache the page bone
			this.pageBone = dom.innerHTML;
			let	cache = pages[data.controller][data.action] || null;
			if (cache) {
				this.model = cache.model || null;
				this.view = cache.view || null;
				
				let getData = this.model.getData, 
					render = this.view.render; 
				if (getData && render) {
					render(getData(data), this.pageBone, dom);
				}
			}
			dom.style.display = 'block';			
		}
		
	} 

	
	class Middleware {
		constructor() {
			this.handler = {};
		}		
		add (label, callback=null){
			if (typeof label === "string") {
				this.handler[label] = callback;
				//console.log('Register handler: '+label+' ['+this.handler[label].toString()+']');
			}
		}
		run (label, data) {
			if (typeof label === "string" && typeof this.handler[label] ==="function") {
				this.handler[label](data);
				//console.log('Run handler: '+label+' ['+this.handler[label].toString()+']');
			}
		}
		remove (label){
			if (typeof label === "string" && this.handler[label]) {
				delete this.handler[label];
				//console.log('Remove handler: '+label+' ['+this.handler[label].toString()+']');
			}
		}
	}
	
	let middleware = new Middleware();  
	let router = new Router(middleware);
	let model = new Model();
	let view = new View();
	let controller = new Controller(model, view, middleware);
	let ajax = new Ajax();
	router.init();
	
		
	document.addEventListener("click", function(e){

		let href = e.target.getAttribute("href") || e.target.parentElement.getAttribute("href");
		if (href && href.charAt(0) === "/") {
			e.preventDefault();
			console.log(href);
			router.redirect(href);
		}
		
	});

	//console.log(controller);
	//console.log(view);
	//console.log(router.init());


	/*
	function Event(key, event, handler){
		
		this.obj = document.querySelector(key);
		this.eventOn = true;			
		if (window.addEventListener) {
			this.obj.addEventListener(event, handler);
		} else if (window.attachEvent) {
			this.obj.attachEvent('on'+event, handler);
		}else{
			this.eventOn = false;
		}
		this.key = key;
		this.event = event; 			
		this.handler = handler;	
		
	}

	var o1 = new Event('#home', 'click', function(){alert(12);});
	var o2 = new Event('#edit', 'click', function(){alert(1222);});
	
	console.log(o1);
	console.log(o2);
	*/
		
	//page_pages
	
	//document.getElementById('pages').add
	
	//var e = new Elem('#b3');
	//e.addEvent();	
/*

	var Elem = function (key) {
		this.obj = document.querySelector(key);
		this.event = null; 			// init property
		this.handler = null;		// init property
		this.eventOn = false;		// init property
	};

	Elem.prototype.removeEvent = function(){
		console.log('entered into remove event function');
		console.log(this.event);
		console.log(this.handler);
		if (!this.event || !this.handler) { return; }
		
		if (window.removeEventListener) {
			this.obj.removeEventListener(this.event, this.handler);
		} else if (window.attachEvent) {
			this.obj.detachEvent('on'+event, handler);
		}
		
		if (!this.obj.removeEventListener(this.event, this.handler)){ return; }
		this.event = null; 				// reset
		this.handler = null;			// reset
		this.eventOn = false;
		console.log(this.eventOn);
	};

	
	Elem.prototype.addEvent = function(event = null, handler = null){

		console.log('entered into add event function');
		if (!event || !handler) { return; }
		if (window.addEventListener) {
			this.obj.addEventListener(event, handler);
		} else if (window.attachEvent) {
			this.obj.attachEvent('on'+event, handler);
		}

		this.eventOn = true;
		this.event = event; 			// save event type
		this.handler = handler;			// save handler
		console.log(this.event);
		console.log(this.handler);

		
		console.log(this.eventOn);
	};
	*/
	/*
	
	var b = new Elem('#pages');
	b.addEvent('click', function(e){alert(this.dataset.route);});

	
	*/
	
	/*
	var e = new Elem('#b3');
	e.addEvent();
	e.addEvent('click', function() { alert('1'); });
	
	var e1 = new Elem('.v3');
	e1.addEvent('click', function() { alert('21'); });	
	*/
	
	//alert(BASE_QUERY_STRING);		
	//console.log(BASE_QUERY);	
	
	//window.history.replaceState( null , null, BASE_ROOT+'/asdas' );
	//setTimeout(function(){
	//	alert(JSON.stringify(getURL()));		
	//}, 1000);
	/*
	function redirect(path){
		if (!routes.hasOwnProperty(path)) { return alert('Page not exist'); }
		window.history.pushState( {valami:'aaaa'} , routes['path'], path );
		window.history.replaceState( {valami:'aaaa'} , routes['path'], path );
	}

	function test() {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
		  document.getElementById("response").innerHTML = this.responseText;
		}
	  };
	  xhttp.open("PUT", "test.php", true);
	  xhttp.send();   
	}

	test();
	
	
	function Controller(model){
		var self = this;
		function ErrorController() {
			
			function showError() {
				
			}
			
			return {
				index(code=404){
					showError(code);
				}
			}
		}
		
		function set(name, action){
			
		}
		
		return {
			set(name, action),
		}
	}
	
	var controlle = new Controller();

	
	*/	
	
}();

</script>
	</body>
</html>