	class Observable {  
		constructor() {
			this.listeners = new Map();
		}
		addListener(label, callback) { 
			//console.log('listeners: '+this.listeners);
			//console.log('has label: ('+label+') '+this.listeners.has(label));
			//console.log('get label: ('+label+') '+this.listeners.get(label));
			this.listeners.has(label) || this.listeners.set(label, []);
			this.listeners.get(label).push(callback);
		}
		removeListener(label, callback) { 
			let listeners = this.listeners.get(label),
				index;

			if (listeners && listeners.length) {
				index = listeners.reduce((i, listener, index) => {
					return ((typeof listener == 'function' || false) && listener.toString() === callback.toString()) ?
						i = index :
						i;
				}, -1);

				if (index > -1) {
					listeners.splice(index, 1);
					this.listeners.set(label, listeners);
					return true;
				}
			}
			return false;		
		}
		emit(label, ...args) {  

			let listeners = this.listeners.get(label);
			//console.log('listeners#: '+listeners);
			if (listeners && listeners.length) {
				listeners.forEach((listener) => {
					listener(...args); 
					//console.log('listener: '+listener);
				});
				//console.log('args: '+args);
				return true;
			}
			return false;
				
		}
	}	
	
	class Observer {  
		constructor(label, subject) {
			this.label = label;
			this.handler = [];
			this.subject = subject;
			this.subject.addListener(label, (data) => this.onChange(data));
		}
		terminate(){
			let label = this.label,
			callback = this.subject.listeners.get(label);
			// remove listener Observable
			this.subject.removeListener(label, callback);
			// and remove from this object the callback
			//if we added handler somewhere else like inside another object observer.handler['valami'] = callback
		}		
		onChange(data) {
			console.log('label:'+this.label+' data:'+obj);
			// we call that handler what have same name than label
			// if we used "redirect" then we pass data to:
			// observer.handler['redirect'](daraObj);
			//this.handler[this.label](data);
		}
	}


	let observable = new Observable();  
	let listener1 = new Observer("change", observable);
	let listener2 = new Observer("change2", observable);
	
	observable.emit("change", { a: 2 });  	
	listener1.terminate();
	observable.emit("change", { a: 32 });  	
