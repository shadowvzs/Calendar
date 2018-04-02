//localStorage.removeItem("Auth");
const BASE_PROTOCOL = location.protocol,
BASE_HOSTNAME = location.hostname,
BASE_DIR = "/test",
BASE_ROOT = BASE_PROTOCOL+'//'+BASE_HOSTNAME+BASE_DIR,
MODEL_PATH = BASE_ROOT+"/"+"model/",
IMAGE_PATH = BASE_ROOT+"/"+"img/",
GALLERY_PATH = IMAGE_PATH+"gallery/",
THUMBNAIL_PATH = GALLERY_PATH+"mini/",

MENU_ICON_PATH = IMAGE_PATH+"/icons/menu/",

VALIDATOR = {
	'NUMBER': /^[0-9]+$/,
	'ALPHA': /^[a-zA-Z]+$/,
	'ALPHA_NUM': /^[a-zA-Z0-9]+$/,
	'STR_AND_NUM': /^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+|[a-zA-Z]+[0-9]+[a-zA-Z]+)$/,
	'LOW_UP_NUM': /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/,
	'SLUG': /^[a-zA-Z0-9-_]+$/,
	'NAME': '',
	'NAME_HUN': /^([a-zA-Z0-9 ÁÉÍÓÖŐÚÜŰÔÕÛáéíóöőúüűôõû]+)$/,
	'EMAIL': /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/,
	'IP': /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?).){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/,
},

INTERNAL_ERROR_URL = '/error/500',	 
NOT_FOUND_URL = '/error/404',	 
NO_ACCESS_URL = '/error/403';	 

// default auth
var Auth = localStorage.getItem("Auth") 
	? JSON.parse(localStorage.getItem("Auth")) 
	: {	sessionHash: '',
		roleId: 0,
		name: 'Guest',
		domain: '',
	};	

function Router(middleware){
	var errorPage = '';
	var stopLoop = false,
	path = () => {
		var tmp_path = encodeURI(location.href).split('#'),
			base_path = tmp_path[0].substr(BASE_ROOT.length),
			base_arr = base_path.split('?'),
			base_url = base_arr[0],
			url_array = base_url.substr(1).split('/'),
			query_string = base_arr[1] || '',
			query_array = query_string.length === 0 
					? [] 
					: base_arr[1]
						.split('&')
						.map(str => { 
							let q = str.split('=');
							return { [q[0]] : q[1] || '' };
						})		
		return {
			base_path, base_arr, base_url, url_array, query_string, query_array
		};
	},

	routes = [
		['/home', false, null, false],
		//['/admin/home/:id/:name', 'admin', 1, ['NUMBER', 'SLUG']],
		//['/admin/home/texco/asad', 'admin', null, false],
		//['/admin/user/edit/:id/:name', 'admin', 1, ['NUMBER', 'SLUG']],
		//['/admin/user/edit', 'admin', 1, false],
		//['/user/edit', false, null, false],
		['/video/playlist/:id/:index', false, null, ['SLUG','NUMBER']],
		['/video/playlist/:id', false, null, ['SLUG']],
		['/video', false, null, false],
		['/gallery/album/:id/:index', false, null, ['SLUG','NUMBER']],
		['/gallery/album/:id', false, null, ['SLUG']],
		['/gallery', false, null, false],
		['/user/login', false, null, false],
		['/user/logout', false, null, false],
		['/user/registration', false, null, false],
		['/error/:id', false, null, ['NUMBER']],
	];

	//url: prefix/controller/view | prefix | auth group | validation for params		

	function validateRoute(){
		// like a interface
		let { base_path, base_arr, url_array, query_string, query_array } = path(),
		data = {
			'prefix': null,
			'controller': null,
			'action': null,
			'param' : {},
		},
		routes_len = routes.length,
		dataKeys = Object.keys(data),
		paramCount = 0,
		len, i, route_url, firstChar, shiftIndex;
		//console.log(query_array);
		
		for ( route of routes ) {
			route_url = route[0].substr(1).split('/');
			len = url_array.length;
			i = 0;
			paramCount = 0;
			shiftIndex = route[1] ? 1 : 0;
			
			if (route_url.length != len) { continue; }
			if (route[1] &&  route_url[0] != url_array[0]) { continue; }
			if (route_url[shiftIndex] != url_array[shiftIndex]) { continue; }
		
			for (; i<len; i++ ) {
				firstChar = route_url[i].charAt(0);
				if (firstChar !== ":" && route_url[i] === url_array[i] && i < 3) {
					//verification or static url piece
					//console.log('STATIC PARAM: '+route_url[i]);
					data[dataKeys[i + 1 - shiftIndex]] = url_array[i];
				} else if (firstChar === ":" && route_url[i].length > 0 && i > 0) {
					//console.log('DYNAMIC PARAM: '+route_url[i]);
					// verification for dynamic params like :id
					if (Array.isArray(route[3])) {
						if (VALIDATOR[route[3][paramCount]].test(url_array[i])) {
							//console.log('    VALIDATION: validation on '+url_array[i]+' passed');
							data.param[route_url[i].substr(1)] = url_array[i];
						} else {
							//console.log('    VALIDATION: missing or wrong validation for '+url_array[i]+'');
							// if incorrect data with dynamic param like :id
							return redirect(NOT_FOUND_URL, 'Not Found');
						}
					}
					paramCount++;
					
				} else {
					//console.log('DROPPED PARAM: '+route_url[i]);
					// skip every checking if first param not same
					//i = len;
					break;
				}
				if (i === len - 1 ) {
					if (!isNaN(parseInt(route[2])) && Auth.roleId < route[2] ) {
						//console.log('User have no access for '+base_path+', we redirect to '+NO_ACCESS_URL);
						return redirect(NO_ACCESS_URL, 'Forbidden');
					}
					// verification for route[2] role rank
					// this not done yet because no users						
					if (data.controller && !data.action) { data.action = 'index'; }
					// reuse the len and i ariable because anyway i will escape 
					// from here with return
					if (query_array.length) {
						for ( query_param of query_array ) {
							Object.assign(data.param, query_param);
						}
						//Object.assign(data.param, query_array);
					}
					//console.log(data.param);
				
					return data; 
				}
			}

		}

		return redirect(NOT_FOUND_URL, 'Not Found');
	}
	
	function redirect(newUrl=null, title=null, obj=null) {
		//console.log('old path: '+path().base_path);
		history.pushState( null , title, BASE_ROOT+path().base_path );				
		if (newUrl) {
			//console.log('new path: '+newUrl);
			history.replaceState( null , title, BASE_ROOT+newUrl );
		}				
		var data = validateRoute();
		if (data) {
			//console.log('Redirecting:'+JSON.stringify(data));
			middleware.run("redirect", data ); 
		}
	}	

	

	function eventRegistation() {
		// event handler if user click to a link
		document.addEventListener("click", e => {
			let t = e.target, depth = 3, i = 0, href;
			for (; i < depth; i++) {
				if (t.hasAttribute("href")){
					href = t.getAttribute("href");
					break;
				} else {
					if (!t.parentElement) { return ;}
					t = t.parentElement;
				}
			}
			
			// no href then no action

			if (!href) { return; }
			// internal link handle redirect(url)
			if (href.charAt(0) === "/") {
				console.log('internal page link was detected');
				e.preventDefault();
				redirect(href);
			} else if (href.length > 7 && href.substr(0,7) === 'submit:') {
				console.log('form event link was detected');
				e.preventDefault();
				form = document.getElementById(href.substr(7)+"_Form");
				if (!form) { alert('Invalid form!'); }
				// must change if merge with big js
				// model.sendForm(form);
				App.model.sendForm(form);
			} else if (href.length > 6 && href.substr(0,6) === 'popup:') {
				console.log('popup event link was detected');
				e.preventDefault();
				// App need to fix here to 
				// view.popUpRender(href.substr(6));
				App.view.popUpRender(href.substr(6));
			}else{
				console.log('normal link redirect to other page');
			}
		});
		
		// event handler if user click to BACK button
		window.addEventListener('popstate', event => {
			// The popstate event is fired each time when the current history entry changes.
			let href = location.href;
			history.back();
			if (href != location.href) {
				console.log('back');
				redirect();
			}
			event.preventDefault();
			// Uncomment below line to redirect to the previous page instead.
			// window.location = document.referrer // Note: IE11 is not supporting this.
			// history.pushState(null, null, window.location.pathname);

		}, false);
	}
	
	if (document.readyState === 'complete') {
		eventRegistation();
	}else{
		document.onreadystatechange = () => {
		  if (document.readyState === 'complete') {
			 eventRegistation();
		  }
		};	
	}
	
	function virtualRedirect(url=null){
		
		//BASE_ROOT+path().base_path
	}
	
	return {
		url() {
			return {
				base_path, 
				base_url, 
				url_array,
				query_string,
				query_array
			}
		},
		redirect(newUrl=null, title=null, obj=null) {
			return redirect(newUrl, title, obj);
		},
		virtualRedirect(newUrl){
			history.pushState( null, null, location.href );				
			history.replaceState( null, null, newUrl );
			console.log(newUrl);
		},
		// not dry but maybe easier to read, anyway not too much plus
		init() {
			return redirect();
		}
	}
};

