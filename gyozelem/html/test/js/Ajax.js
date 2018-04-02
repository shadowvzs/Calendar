function Ajax (setup, success, error) {

    if (typeof error != "function" || typeof success != "function") { return alert('Missing classback(s)....'); }
    if (!setup || !setup.url) { return error('no settings for request'); }
    var type = (!/(GET|POST|PUT|DELETE)/.test(setup.method)) ? "GET": setup.method ; 
    var url = setup.url;
    var data = setup.data;
    var httpRequest = new XMLHttpRequest();     
    
    if ((!data || (Object.keys(data).length === 0 && data.constructor === Object))) {
        data = null;
    } else if (type === "GET") {
        url += (~url.indexOf("?") ? "&" : "?") + serialize(data);
        data = null;
    }

    
    httpRequest.onreadystatechange = function(event) {
    
        if (this.readyState === 4) {
            if (this.status === 200) {
                if (!this.response) { error("no returned data"); return false; }
 				let newAuth = this.response.auth,
					notifyMsg = this.response.notify;
				if (newAuth) {
					if (Auth.hash != newAuth.hash || Auth.role != newAuth.role || Auth.hash != newAuth.domain) {
						Auth = { ...newAuth };
						localStorage.setItem("Auth", JSON.stringify(Auth));
						App.ajax_tmp();
						// SWAP BACK IF ALL JS IN SAME FILE
						//render.visibility();
					}
				}

				if (notifyMsg) {
					// SWAP BACK IF ALL JS IN SAME FILE
					// notify.add(...notifyMsg);
					App.notify_tmp(notifyMsg);
				}
                if (!this.response.success) { return error(this.response); }
               // if (this.response.error) { error(this.response.error); return false; }
                success (this.response.data || this.response);
 
            } else {
                error(this.status);
            }
        }
    };
    
    httpRequest.responseType = 'json';
    httpRequest.open(type, url, true);

    if (type !== "POST" || !data) {
        httpRequest.send();
    }else{
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send(serialize(setup.data));
    }
}

var serialize = function(obj, prefix) {
  var str = [], p;
  for(p in obj) {
    if (obj.hasOwnProperty(p)) {
      var k = prefix ? prefix + "[" + p + "]" : p, v = obj[p];
      str.push((v !== null && typeof v === "object") ?
        serialize(v, k) :
        encodeURIComponent(k) + "=" + encodeURIComponent(v));
    }
  }
  return str.join("&");
};