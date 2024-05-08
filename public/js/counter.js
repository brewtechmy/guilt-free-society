/**
* Counter.js  - written by Victor N - 22/Nov/2013 - www.vitim.us
* Repo: https://github.com/victornpb/analog-counter-wheel
*/

var totalProtein = 0
var totalCarbs = 0
var totalFat = 0
var totalCalorie = 0
var totalQuantity = 0
function Counter(counterElementId){

	this.pos = 0;
	this.values = ['0','1','2','3','4','5','6','7','8','9','10'];

	this.options = {
		mousewheel: true,
		digitHeight: 0,
		inverted: false
	};
	var counterElement = document.getElementById(counterElementId);
	var pos = counterElementId.replace('acw-','');

	this.posId = pos

	this.DOM = {
		counter : counterElement,
		wheel : document.createElement('div'),
		digitAbove : document.createElement('div'),
		digitCenter : document.createElement('div'),
		digitBelow : document.createElement('div')
	};

	//Initial Values
	if(this.DOM.counter.innerHTML.indexOf('|')>-1){
		this.values = this.DOM.counter.innerHTML.split('|');
	}
	this.DOM.counter.innerHTML = "";

	this.DOM.counter.classList.add('counter');
	this.DOM.wheel.classList.add('wheel');
	this.DOM.digitAbove.classList.add('digit');
	this.DOM.digitCenter.classList.add('digit');
	this.DOM.digitBelow.classList.add('digit');
	this.DOM.digitAbove.classList.add('above');
	this.DOM.digitCenter.classList.add('center');
	this.DOM.digitCenter.classList.add('center-'+pos);
	this.DOM.digitBelow.classList.add('below');

	this.DOM.counter.appendChild(this.DOM.wheel);
	this.DOM.wheel.appendChild(this.DOM.digitAbove);
	this.DOM.wheel.appendChild(this.DOM.digitCenter);
	this.DOM.wheel.appendChild(this.DOM.digitBelow);

	//compute digit height
	//this.options.digitHeight = this.DOM.digitCenter.offsetHeight;
	this.options.digitHeight = parseInt(window.getComputedStyle(this.DOM.digitCenter, null).getPropertyValue("height"));
	this.setPos(0);

	this.DOM.counter.onmousewheel = this.mouseWheel();

}

Counter.prototype.setValue = function(value){
	var pos = this.values.indexOf(value);
	if(pos>=0) return this.setPos(pos);
	else throw new Error('"'+value+'" is not a item on Counter.values[]');
};

Counter.prototype.getValue = function(){
	return this.values[this.pos];
};

Counter.prototype.getPos = function(){
	return this.pos;
};

Counter.prototype.setPos = function(x){

	//function that cycle values between 0..max
	function n(x,max){
		if(x>=max) x=(x%(max));
		if(x<0) x=max-(Math.abs(x)%max);
		return x;
	}

	var offsetAbove, offsetBelow;
	var max = this.values.length;

	this.pos = n(x, max);

	if(!this.options.inverted){ //numbers increase rolling down
		offsetAbove = n(this.pos-1, max);
		offsetBelow = n(this.pos+1, max);
	}
	else{ //numbers increase rolling up
		offsetAbove = n(this.pos+1, max);
		offsetBelow = n(this.pos-1, max);
	}

	var prev = isNaN(parseFloat(this.DOM.digitCenter.innerHTML).toFixed(2)) ? 0 : parseFloat(this.DOM.digitCenter.innerHTML).toFixed(2)
	this.DOM.digitAbove.innerHTML = this.values[offsetAbove];
	this.DOM.digitCenter.innerHTML = this.values[this.pos];
	this.DOM.digitBelow.innerHTML = this.values[offsetBelow];

	var pos = parseInt(this.pos)
	var parts = this.posId.split('-');
	var item = arr[parts[0]].list[parts[1]]
	var itemName = item['name']
	var itemCarb = parseFloat(item['carbs']).toFixed(2)
	var itemProtein = parseFloat(item['protein']).toFixed(2)
	var itemFat = parseFloat(item['fat']).toFixed(2)
	var itemQuantity = parseFloat(item['quantity']).toFixed(2)
	var itemCalorie = parseFloat(item['kcal']).toFixed(2)
	var cq = isNaN(parseFloat(document.getElementById('carb-quantity').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('carb-quantity').innerHTML).toFixed(2)
	var cc = isNaN(parseFloat(document.getElementById('carb-calories').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('carb-calories').innerHTML).toFixed(2)
	var pq = isNaN(parseFloat(document.getElementById('protein-quantity').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('protein-quantity').innerHTML).toFixed(2)
	var pc = isNaN(parseFloat(document.getElementById('protein-calories').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('protein-calories').innerHTML).toFixed(2)
	var fq = isNaN(parseFloat(document.getElementById('fat-quantity').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('fat-quantity').innerHTML).toFixed(2)
	var fc = isNaN(parseFloat(document.getElementById('fat-calories').innerHTML).toFixed(2)) ? 0 : parseFloat(document.getElementById('fat-calories').innerHTML).toFixed(2)

	cq = parseFloat(cq - prev*itemCarb + pos*itemCarb).toFixed(2)
	document.getElementById('carb-quantity').innerHTML = cq
	pq = parseFloat(pq - prev*itemProtein + pos*itemProtein).toFixed(2)
	document.getElementById('protein-quantity').innerHTML = pq
	fq = parseFloat(fq - prev*itemFat + pos*itemFat).toFixed(2)
	document.getElementById('fat-quantity').innerHTML = fq


	cc = parseFloat(cq*carbMultiplier).toFixed(2)
	document.getElementById('carb-calories').innerHTML = cc
	pc = parseFloat(pq*proteinMultiplier).toFixed(2)
	document.getElementById('protein-calories').innerHTML = pc
	fc = parseFloat(fq*fatMultiplier).toFixed(2)
	document.getElementById('fat-calories').innerHTML = fc
	document.getElementById('total-quantity').innerHTML = (parseFloat(cq) + parseFloat(pq) + parseFloat(fq)).toFixed(2)
	document.getElementById('total-cal').innerHTML = (parseFloat(cc) + parseFloat(pc) + parseFloat(fc)).toFixed(2)
	// if(prev != pos){
	// 	var irow = document.querySelector("tr[id*='nut-tr-"+this.posId+"']")
	// 	if(irow){
	// 		if(pos != 0){
	// 			document.querySelector("tr[id*='nut-tr-"+this.posId+"']").innerHTML = '<td>'+itemName+'</td><td>'+parseFloat(pos*itemQuantity).toFixed(2)+'</td><td>'+parseFloat(pos*itemProtein).toFixed(2)+'</td><td>'+parseFloat(pos*itemCarb).toFixed(2)+'</td><td>'+parseFloat(pos*itemFat).toFixed(2)+'</td><td>'+parseFloat(pos*itemCalorie).toFixed(2)+'</td>'
	// 			totalCalorie +=
	// 			totalCarbs
	// 			totalFat
	// 			totalProtein
	// 			t
	// 		}else{
	// 			document.querySelector("tr[id*='nut-tr-"+this.posId+"']").remove()
	// 		}
	// 	}else{
	// 		var newTr = document.createElement("tr");
	// 		newTr.setAttribute("id", "nut-tr-"+this.posId);
	// 		newTr.innerHTML = '<td>'+itemName+'</td><td>'+parseFloat(pos*itemQuantity).toFixed(2)+'</td><td>'+parseFloat(pos*itemProtein).toFixed(2)+'</td><td>'+parseFloat(pos*itemCarb).toFixed(2)+'</td><td>'+parseFloat(pos*itemFat).toFixed(2)+'</td><td>'+parseFloat(pos*itemCalorie).toFixed(2)+'</td>'
	// 		document.getElementById('nut-tbody').appendChild(newTr)
	// 	}
	// }

	// var totalrow = document.querySelector("tr[id*='nut-tr-total']")
	// if(totalrow){
	// 	if(document.getElementById('nut-tbody').childNodes.length > 1){}
	// }else{
	// 	var newTotalTr = document.createElement("tr");
	// 	newTr.setAttribute("id", "nut-tr-total");
	// 	newTr.innerHTML = '<td></td><td>Total</td><td>'+parseFloat(pos*itemProtein).toFixed(2)+'</td><td>'+parseFloat(pos*itemCarb).toFixed(2)+'</td><td>'+parseFloat(pos*itemFat).toFixed(2)+'</td><td>'+parseFloat(pos*itemCalorie).toFixed(2)+'</td>'
	// }

	//dispatch event if handler is set
	if(this.onChange){
		this.onChange.call(this, this.pos);
	}

	return this.pos;
};

Counter.prototype.moveBy = function(x){
	var self = this;
	if(x!=0){

		this.setPos(this.pos+x);

		//amount of movement
		var d = this.options.digitHeight;

		//set direction of movement
		if(x>0) d*=1;
		if(x<0) d*=-1;

		//invert direction of movement animation
		if(this.options.inverted) d*=-1;

		this.DOM.wheel.classList.remove('animate');
		this.DOM.wheel.style.top = d+"px";

		setTimeout(function(){
			self.DOM.wheel.classList.add('animate');
			self.DOM.wheel.style.top = "0px";
		},0);
	}
};

Counter.prototype.moveTo = function(pos){

	if(this.pos!=pos){

		var max = this.values.length-1;

		var direction = pos - this.pos;
		if(this.pos==max && pos==0) direction = 1;
		if(this.pos==0 && pos==max) direction = -1;

		this.moveBy(direction);

		var cur = this.setPos(pos);

	}
};


Counter.prototype.next = function(){
	this.moveBy(1);
};

Counter.prototype.previous = function(){
	this.moveBy(-1);
};

Counter.prototype.mouseWheel = function(){

    var self = this;
    var lastScroll=0, eventCount=0;

    this.DOM.counter.addEventListener('click', function(e) {
        var rect = self.DOM.counter.getBoundingClientRect();
        var y = e.clientY - rect.top; // Getting y-coordinate relative to the counter element
        if (y < rect.height / 2) {
            self.next();
        } else {
            self.previous();
        }
    });

    this.DOM.counter.addEventListener('touchstart', function(e) {
        var touch = e.touches[0];
        this.touchY = touch.clientY;
        e.stopPropagation();
        e.preventDefault();
    });

    this.DOM.counter.addEventListener('touchmove', function(e) {
        var touch = e.touches[0];
        var deltaY = touch.clientY - this.touchY;
        if (deltaY > 5) {
            self.next();
            this.touchY = touch.clientY;
        } else if (deltaY < -5) {
            self.previous();
            this.touchY = touch.clientY;
        }
        e.stopPropagation();
        e.preventDefault();
    });

    //function attached to onmousewheel
    return function(e){
        if(self.options.mousewheel==false) return;

        // cross-browser wheel delta
        e = window.event || e; // old IE support
        e.preventDefault();

        var now = Date.now();
        var dif = now-lastScroll;

        this.lastScroll = now;

        var delta = e.wheelDelta;
        //var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

        if(self.options.inverted)
            delta*=-1;

        if(e.webkitDirectionInvertedFromDevice)
            delta*=-1;

        if((dif>20 && Math.abs(delta)>=12) || Math.abs(eventCount)>50){
            if(delta>0){
                self.next();
            }
            else{
                self.previous();
            }
            eventCount = 0;
        }
        else{
            eventCount+=e.wheelDelta;
        }

        //console.log("timestamp %s \t dif: %s \t deltaMode: %s \t inverted: %s \t wheelDelta: %s \t delta: %s \t x: %d",
        //			e.timeStamp, dif, e.deltaMode, e.webkitDirectionInvertedFromDevice, e.wheelDelta, delta, wheel);
    };
};