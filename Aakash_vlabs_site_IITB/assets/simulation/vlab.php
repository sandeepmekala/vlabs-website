<html>

<head>
<!--From ASH rises the WORLD-->	
<!--Virtual labs 10:00 18 July 2014-->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="../img/akash2.png" type="image/png" sizes="16x16">
</head>

<style>

*{
	padding: 0px;
	margin: 0px;
}

body{
	background-color: #000000;
}

#canvas{
	background-color: #FFFFFF;
	border: 5px solid #444444;
}

#pics{
	background-color: #333333;
	overflow: auto;
	overflow-x: hidden;
}

#csvDisplay{
	padding: 10px;
}

td {
	text-align: center;
	vertical-align: middle;
}

#container{
	padding: 25px;
	z-index: 1000;
	background-color: #222222;
}

#container2{
	padding: 25px;
	z-index: 1000;
	background-color: #222222;
}

</style>

<body>

<div id="container" style="display: none">
	<font color="red">Enter the Text:</font>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<button value="Done" onclick="textbox();">Done</button>
 	<BR><BR>
	<input id="con_text" type="text" size="25" value="" autofocus /><BR><BR>
	<font color="red">Any question attached?<BR>(optional):</font>
	<BR><BR>
	<input id="con_info" type="text" size="25" value="" />
</div>

<div id="container2" style="display: none">
	<font id="ques" color="red"></font>
 	<BR><BR>
	<input id="con_text2" type="text" size="25" value="" autofocus /><BR><BR>
	<button value="Done" onclick="textbox2();">Done</button>
</div>

<center>
<font id="message" style="font-size: 20px" color="#FFFFFF">Begin by clicking an object</font>
</center>

<button class="btn btn-primary" id="gencsv">Genarate CSV</button>
<button id="loadcsv" style="display:none">Load CSV</button>
<button class="btn btn-warning" id="comsim">Complete Simulation</button>
<button class="btn btn-success" id="stepsim">Step Simulation</button>
<button class="btn btn-success" id="nextsim" style="display: none">Next Step</button>
<button class="btn btn-danger" id="endstep" style="display: none">End Simulation</button>

<img id="graph_back" src="other/graph1.jpg" style="display: none" />

<div id="pics">
<font id="csvDisplay" color="#FF0000" style="display: none"></font>
<table id="picTable" width="200" border="2">
	<tr>
		<td id="td_dline" width="100" height="100"><strong><font color="red" id="dline">Line</font></strong></td>
		<td id="td_dtbox" width="100" height="100"><strong><font color="red" id="dtbox">TextBox</font></strong></td>
	</tr>
	<tr>
		<td id="td_img1" width="100" height="100"><img id="img1" src="images/img1.png" height="100px" width="100px" /></td>
		<td id="td_img2" width="100" height="100"><img id="img2" src="images/img2.png" height="100px" width="100px" /></td>
	</tr>
	<tr> 
		<td id="td_img3" width="100" height="100"><img id="img3" src="images/img3.png" height="100px" width="100px" /></td>
		<td id="td_img4" width="100" height="100"><img id="img4" src="images/img4.png" height="100px" width="100px" /></td>
	</tr>
	<tr>
		<td id="td_img5" width="100" height="100"><img id="img5" src="images/img5.png" height="100px" width="100px" /></td>
		<td id="td_img6" width="100" height="100"><img id="img6" src="images/img6.png" height="100px" width="100px" /></td>
	</tr>
	<tr> 
		<td id="td_img7" width="100" height="100"><img id="img7" src="images/img7.png" height="100px" width="100px" /></td>
		<td id="td_img8" width="100" height="100"><img id="img8" src="images/img8.png" height="100px" width="100px" /></td>
	</tr>
	<tr>
		<td id="td_img9" width="100" height="100"><img id="img9" src="images/img9.png" height="100px" width="100px" /></td>
		<td id="td_img10" width="100" height="100"><img id="img10" src="images/img10.png" height="100px" width="100px" /></td>
	</tr>
	<tr> 
		<td id="td_img11" width="100" height="100"><img id="img11" src="images/img11.png" height="100px" width="100px" /></td>
		<td id="td_img12" width="100" height="100"><img id="img12" src="images/img12.png" height="100px" width="100px" /></td>
	</tr>	
</table>
</div>
<canvas id="canvas"> 
</canvas>
<button id="ghost" style="display: none">Ghost</button>
<button id="end_ghost" style="display: none">End Ghost</button>
<script>

var change_mode = -1;
var current_img = -1;
var current_id = 0;
var pauseFunctionality = false;
////
var dline = document.getElementById('dline');
var dtbox = document.getElementById('dtbox');
var img1 = document.getElementById('img1');
var img2 = document.getElementById('img2');
var img3 = document.getElementById('img3');
var img4 = document.getElementById('img4');
var img5 = document.getElementById('img5');
var img6 = document.getElementById('img6');
var img7 = document.getElementById('img7');
var img8 = document.getElementById('img8');
var img9 = document.getElementById('img9');
var img10 = document.getElementById('img10');
var img11 = document.getElementById('img11');
var img12 = document.getElementById('img12');
////
var td_dline = document.getElementById('td_dline');
var td_dtbox = document.getElementById('td_dtbox');
var td_img1 = document.getElementById('td_img1');
var td_img2 = document.getElementById('td_img2');
var td_img3 = document.getElementById('td_img3');
var td_img4 = document.getElementById('td_img4');
var td_img5 = document.getElementById('td_img5');
var td_img6 = document.getElementById('td_img6');
var td_img7 = document.getElementById('td_img7');
var td_img8 = document.getElementById('td_img8');
var td_img9 = document.getElementById('td_img9');
var td_img10 = document.getElementById('td_img10');
var td_img11 = document.getElementById('td_img11');
var td_img12 = document.getElementById('td_img12');
////
var gencsv = document.getElementById('gencsv');
var loadcsv = document.getElementById('loadcsv');
var comsim = document.getElementById('comsim');
var stepsim = document.getElementById('stepsim');
var nextsim = document.getElementById('nextsim');
var endstep = document.getElementById('endstep');
var ghost = document.getElementById('ghost');
var end_ghost = document.getElementById('end_ghost');
////
//var graph_back = document.getElementById('graph_back');
////
var message = document.getElementById('message');
comsim.style.position = "absolute";
stepsim.style.position = "absolute";
gencsv.style.position = "absolute";
loadcsv.style.position = "absolute";
nextsim.style.position = "absolute";
endstep.style.position = "absolute";
ghost.style.position = "absolute";
end_ghost.style.position = "absolute";

ghost.style.left = 0;
ghost.style.top = window.innerHeight-40;
end_ghost.style.left = 0;
end_ghost.style.top = window.innerHeight-20;

nextsim.style.left = 0;
nextsim.style.top = 0;
endstep.style.left = 90;
endstep.style.top = 0;
comsim.style.left = 0;
comsim.style.top = 0;
stepsim.style.left = 160;
stepsim.style.top = 0;
gencsv.style.left = window.innerWidth - 125;
gencsv.style.top = 0;

loadcsv.style.left = window.innerWidth - 65;
loadcsv.style.top = 20;

var initialX = 0.3;
var initialY = 0.4;

var container = document.getElementById('container');
var container2 = document.getElementById('container2');
var con_text = document.getElementById('con_text');
var con_text2 = document.getElementById('con_text2');
var con_info = document.getElementById('con_info');
var picTable = document.getElementById('pics');
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var csvString = "";

canvas.width = window.innerWidth*0.8;
canvas.height = window.innerHeight*0.85;
canvas.style.position = "absolute";

picTable.style.height = canvas.height + 10;
picTable.style.width = 226;
var offsetX = (window.innerWidth - canvas.width - 226)/2;
var offsetY = (window.innerHeight - canvas.height)/2;
canvas.style.left = offsetX;
canvas.style.top = offsetY;

picTable.style.position = "absolute";
picTable.style.left = offsetX + 4 + canvas.width;
picTable.style.top = offsetY;

container.style.position = "absolute";
container.style.left = (window.innerWidth - 250)/2;
container.style.top = (window.innerHeight)/2 - 100;

container2.style.position = "absolute";
container2.style.left = (window.innerWidth - 250)/2;
container2.style.top = (window.innerHeight)/2 - 100;

var pic_obj = [];
var spic_obj = [];

var lineStartx;
var lineStarty;
var chosenLineWidth = 5;
var changeActive = 0;

var simtym;
var csv,ci;
var sr,ss;
var sx,sy,sd;
var isComSim = 1;
var isGhost = 0;
var csv2;
var ci2;
var ghost_cx;
var ghost_cy;
var ghost_ca;
var ghost_cw;
var ghost_ch;
var ghostIn;
var ghostSelect = -1;

function object(id,x,y,a,ow,oh,fw,fh,q,text) {
	this.id = id; //picture id
	this.x = x; //x coord
	this.y = y; //y coord
	this.a = a; //angle deg
	this.ow = ow; //original width
	this.oh = oh; //original height
	this.fw = fw; //final width
	this.fh = fh; //final height
	this.q = q;
	this.text = text;
}

//pic_obj.push(new object(1,100,100,0,100,100,100,100));
nextsim.addEventListener("click",nextStepSim);
endstep.addEventListener("click",endStepSim);
end_ghost.addEventListener("click",endGhostMode);

/*canvas.addEventListener("mousemove",move_img);
canvas.addEventListener("mousedown",findobj);
canvas.addEventListener("mouseup",finish_transform);
window.addEventListener("keydown",zoom_rotate);*/

function check_student() {
	if(pic_obj[current_img].x > (spic_obj[current_img].x-10) && pic_obj[current_img].x < (spic_obj[current_img].x+10) && pic_obj[current_img].y > (spic_obj[current_img].y-10) && pic_obj[current_img].y < (spic_obj[current_img].y+10)) {
		if(pic_obj[current_img].a > (spic_obj[current_img].a-10) && pic_obj[current_img].a < (spic_obj[current_img].a+10)) {
			if(pic_obj[current_img].fw > (spic_obj[current_img].fw-10) && pic_obj[current_img].fw < (spic_obj[current_img].fw+10)) {
				if(pic_obj[current_img].fh > (spic_obj[current_img].fh-10) && pic_obj[current_img].fh < (spic_obj[current_img].fh+10)) {
					return 1;
				}
			}
		}
	} else {
		return 0;
	}
}

function drawcanvas() {
	if(isGhost != 1)
		ctx.clearRect(0,0,canvas.width,canvas.height);
	//ctx.drawImage(graph_back,0,0,canvas.width,canvas.height);
	for(var i=0;i<pic_obj.length;i++) {
		if(pic_obj[i].a == 0) {
			if(pic_obj[i].id == -2) {
				ctx.font= pic_obj[i].fh + "px Georgia";
				ctx.fillText(pic_obj[i].text,pic_obj[i].x,pic_obj[i].y+pic_obj[i].fh);
			} else if(pic_obj[i].id == -3) {
				ctx.beginPath();
				ctx.moveTo(pic_obj[i].x,pic_obj[i].y);
				ctx.lineTo(pic_obj[i].fw,pic_obj[i].fh);
				ctx.lineWidth = chosenLineWidth;
				ctx.stroke();
				ctx.closePath();
			} else
				ctx.drawImage(document.getElementById("img"+pic_obj[i].id),pic_obj[i].x,pic_obj[i].y,pic_obj[i].fw,pic_obj[i].fh);
		}
		else {
			ctx.save();
			ctx.translate(pic_obj[i].x+pic_obj[i].fw/2,pic_obj[i].y+pic_obj[i].fh/2);
			ctx.rotate(pic_obj[i].a*Math.PI/180);
			if(pic_obj[i].id == -2) {
				ctx.font= pic_obj[i].fh + "px Georgia";
				ctx.fillText(pic_obj[i].text,-1*pic_obj[i].fw/2,-1*pic_obj[i].fh/2+pic_obj[i].fh);
			} else if(pic_obj[i].id == -3) {
				ctx.beginPath();
				ctx.moveTo(pic_obj[i].x,pic_obj[i].y);
				ctx.lineTo(pic_obj[i].fw,pic_obj[i].fh);
				ctx.lineWidth = chosenLineWidth;
				ctx.stroke();
				ctx.closePath();
			} else
				ctx.drawImage(document.getElementById("img"+pic_obj[i].id),-1*pic_obj[i].fw/2,-1*pic_obj[i].fh/2,pic_obj[i].fw,pic_obj[i].fh);
			ctx.restore();
		}
	}
}

function sdrawcanvas() {
	ctx.clearRect(0,0,canvas.width,canvas.height);
	//ctx.drawImage(graph_back,0,0,canvas.width,canvas.height);
	if(isGhost == 1)
		ctx.globalAlpha = 0.3;
	
	for(var i=0;i<spic_obj.length;i++) {
		if(spic_obj[i].a == 0) {
			if(spic_obj[i].id == -2) {
				ctx.font= spic_obj[i].fh + "px Georgia";
				ctx.fillText(spic_obj[i].text,spic_obj[i].x,spic_obj[i].y+spic_obj[i].fh);
			} else if(spic_obj[i].id == -3) {
				ctx.beginPath();
				ctx.moveTo(spic_obj[i].x,spic_obj[i].y);
				ctx.lineTo(spic_obj[i].fw,spic_obj[i].fh);
				ctx.lineWidth = chosenLineWidth;
				ctx.stroke();
				ctx.closePath();
			} else
				ctx.drawImage(document.getElementById("img"+spic_obj[i].id),spic_obj[i].x,spic_obj[i].y,spic_obj[i].fw,spic_obj[i].fh);
		}
		else {
			ctx.save();
			ctx.translate(spic_obj[i].x+spic_obj[i].fw/2,spic_obj[i].y+spic_obj[i].fh/2);
			ctx.rotate(spic_obj[i].a*Math.PI/180);
			if(spic_obj[i].id == -2) {
				ctx.font= spic_obj[i].fh + "px Georgia";
				ctx.fillText(spic_obj[i].text,-1*spic_obj[i].fw/2,-1*spic_obj[i].fh/2+spic_obj[i].fh);
			} else if(spic_obj[i].id == -3) {
				ctx.beginPath();
				ctx.moveTo(spic_obj[i].x,spic_obj[i].y);
				ctx.lineTo(spic_obj[i].fw,spic_obj[i].fh);
				ctx.lineWidth = chosenLineWidth;
				ctx.stroke();
				ctx.closePath();
			} else
				ctx.drawImage(document.getElementById("img"+spic_obj[i].id),-1*spic_obj[i].fw/2,-1*spic_obj[i].fh/2,spic_obj[i].fw,spic_obj[i].fh);
			ctx.restore();
		}
	}
	if(isGhost == 1)
		ctx.globalAlpha = 1;
}

function finish_transform() {
	if(change_mode == 0 && isGhost!=1) {
		var perX = parseInt(pic_obj[current_img].x/canvas.width*100);
		var perY = parseInt(pic_obj[current_img].y/canvas.height*100);
		pic_obj[current_img].x = parseInt(perX*canvas.width/100);
		pic_obj[current_img].y = parseInt(perY*canvas.height/100);
		csvString += perX + "," + perY + "\n";	
	} else if(change_mode == 0 && isGhost==1) {
		if(check_student()==1) {
			pic_obj[current_img].x = spic_obj[current_img].x;
			pic_obj[current_img].y = spic_obj[current_img].y;
			ci2+=1;
			if(ci2<csv2.length-1)
				simulate(0,0);
			else
				endGhostMode();
		} else {
			pic_obj[current_img].x = ghost_cx;
			pic_obj[current_img].y = ghost_cy;
		}
	}

	else if(change_mode == 1 && isGhost!=1) {
		var scaling = parseInt(pic_obj[current_img].fh/canvas.height*100);
		var cimg = current_img+1;
		pic_obj[current_img].fh = parseInt(scaling*canvas.height/100);
		pic_obj[current_img].fw = parseInt(pic_obj[current_img].fh*pic_obj[current_img].ow/pic_obj[current_img].oh);
		csvString += "s," + cimg + "," + scaling + "\n";
	} else if(change_mode == 1 && isGhost==1) {
		if(check_student()==1) {
			pic_obj[current_img].fw = spic_obj[current_img].fw;
			pic_obj[current_img].fh = spic_obj[current_img].fh;
			ci2+=1;
			if(ci2<csv2.length-1)
				simulate(0,0);
			else
				endGhostMode();
		} else {
			pic_obj[current_img].fw = ghost_cw;
			pic_obj[current_img].fh = ghost_ch;
		}
	}

	else if(change_mode == 2 && isGhost!=1) {
		var cimg = current_img+1;
		csvString += "r," + cimg + "," + pic_obj[current_img].a + "\n";
	} else if(change_mode == 2 && isGhost==1) {
		if(check_student()==1) {
			pic_obj[current_img].a = spic_obj[current_img].a;
			ci2+=1;
			if(ci2<csv2.length-1)
				simulate(0,0);
			else
				endGhostMode();
		} else {
			pic_obj[current_img].a = ghost_ca;
		}
	}

	else if(change_mode == 3) {
		message.innerHTML = "Object Deleted";
	}

	current_img = -1;
	change_mode = -1;
	if(isGhost == 1)
		sdrawcanvas();
	drawcanvas();
}

function move_img(e) {
	if(current_img != -1 && (change_mode == -1 || change_mode == 0)) {
		if(change_mode == -1 && isGhost!=1) {
			console.log(current_img); 
			var perX = parseInt(pic_obj[current_img].x/canvas.width*100);
			var perY = parseInt(pic_obj[current_img].y/canvas.height*100);
			var cimg = current_img+1;
			csvString += "m," + cimg + "," + perX + "," + perY + ",";
		}
		///////////
		change_mode = 0;
		///////////
		//if(parseInt((e.clientX - offsetX) - pic_obj[current_img].fw/2) < 0 || parseInt((e.clientY - offsetY) - pic_obj[current_img].fh/2) < 0 || parseInt((e.clientX - offsetX) - pic_obj[current_img].fw/2) > (canvas.width - pic_obj[current_img].fw) || parseInt((e.clientY - offsetY)-pic_obj[current_img].fh/2) > (canvas.height - pic_obj[current_img].fh)) {
		//} else {
			pic_obj[current_img].x = parseInt((e.clientX - offsetX) - pic_obj[current_img].fw/2);
			pic_obj[current_img].y = parseInt((e.clientY - offsetY) - pic_obj[current_img].fh/2);			
			if(isGhost==1)
				sdrawcanvas();
			drawcanvas();
		//}
	}
}

function zoom_rotate(e) {
	//console.log(e.keyCode);
	if(current_img != -1) {
		if(e.keyCode == 107 && (change_mode == -1 || change_mode == 1)) {
			////////////
			change_mode = 1;
			////////////
			pic_obj[current_img].fw += 2;
			pic_obj[current_img].fh += 2;
		} else if(e.keyCode == 109 && (change_mode == -1 || change_mode == 1)){
			////////////
			change_mode = 1;
			////////////
			pic_obj[current_img].fw -= 2;
			pic_obj[current_img].fh -= 2;
		} else if(e.keyCode == 39 && (change_mode == -1 || change_mode == 2)) {
			////////////
			change_mode = 2;
			////////////
			pic_obj[current_img].a += 2;
			if(pic_obj[current_img].a >= 360)
				pic_obj[current_img].a -= 360;
		} else if(e.keyCode == 37 && (change_mode == -1 || change_mode == 2)) {
			////////////
			change_mode = 2;
			////////////
			pic_obj[current_img].a -= 2;
			if(pic_obj[current_img].a < 0)
				pic_obj[current_img].a += 360;
		} else if(e.keyCode == 46) {
			////////////
			change_mode = 3; //delete obj
			////////////
			pic_obj.splice(current_img,1);
			var cimg = current_img+1;
			csvString += "d," + cimg + "\n";
			current_img = -1;
		} else if(e.keyCode == 67) {
			message.innerHTML = "Select the object which will replace current";
			////////////
			change_mode = 4; //change obj
			////////////
			changeActive = 1;
			removeAllEventListeners();
		}
	if(isGhost==1)
		sdrawcanvas();	
	drawcanvas();
	}
}

function findobj(e) {
	for(var i=0;i<pic_obj.length;i++)
		if((e.clientX - offsetX)  >= pic_obj[i].x && (e.clientX - offsetX) <= (pic_obj[i].x+pic_obj[i].fw) && (e.clientY - offsetY) >= pic_obj[i].y && (e.clientY - offsetY) <= (pic_obj[i].y+pic_obj[i].fh)) {
			if(pic_obj[i].id != -3) {
				if((isGhost==1 && ghostSelect==i) || isGhost==0) {
					current_img = i;
					break;
				}	
			}
		}	
}

function createobj(picid) {
	if(pauseFunctionality == false && changeActive == 0) {
		console.log("obj created");
		message.innerHTML = "Hold object and press +/- to zoom<BR>Hold object and press arrow keys to rotate";
		pic_obj.push(new object(picid,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,100,100,100,100,"",""));
		///////
		csvString += "a," + (picid-1) + "," + pic_obj.length + "\n";
		///////
		drawcanvas();
	} else if(changeActive == 1) {
		pic_obj.push(new object(picid,pic_obj[current_img].x,pic_obj[current_img].y,pic_obj[current_img].a,100,100,pic_obj[current_img].fw,pic_obj[current_img].fh,"",""));
		pic_obj.splice(current_img,1);
		///////
		csvString += "c," + (current_img+1) + "," + (picid-1) + "\n";
		///////
		current_img = -1;
		changeActive = 0;
		addAllEventListeners();
		drawcanvas();
	}
}

function drawobj(drawid) {
	if(pauseFunctionality == false && changeActive == 0) {
		console.log("draw created");
		if(drawid == -2) {
			message.innerHTML = "Fill details about the text";
			removeAllEventListeners();
			stopImgListeners();
			con_text.value = "";
			con_info.value = "";
			container.style.display = "block";
		} else if(drawid == -3) {
			message.innerHTML = "Click at a point to begin drawing line";
			removeAllEventListeners();
			stopImgListeners();
			canvas.addEventListener("click",drawlinestart);
		}
	} else if(changeActive == 1) {
		message.innerHTML = "Only Pictures can be used for REPLACE";
	}
}

function drawlinestart(e) {
	lineStartx = parseInt(e.clientX - offsetX);
	lineStarty = parseInt(e.clientY - offsetY);
	canvas.removeEventListener("click",drawlinestart);
	canvas.addEventListener("mousemove",drawlinemove);
	canvas.addEventListener("click",drawlineend);
}

function drawlinemove(e) {
	//ctx.clearRect(0,0,canvas.width,canvas.height);
	drawcanvas();
	ctx.beginPath();
	ctx.moveTo(lineStartx,lineStarty);
	ctx.lineTo(e.clientX - offsetX,e.clientY - offsetY);
	ctx.lineWidth = chosenLineWidth;
	ctx.stroke();
	ctx.closePath();
	message.innerHTML = "Click at a point to end drawing line";
}

function drawlineend(e) {
	canvas.removeEventListener("mousemove",drawlinemove);
	canvas.removeEventListener("click",drawlineend);
	var xin = parseInt(lineStartx/canvas.width*100);
	var yin = parseInt(lineStarty/canvas.height*100);
	var xf = parseInt((e.clientX - offsetX)/canvas.width*100);
	var yf = parseInt((e.clientY - offsetY)/canvas.height*100);
	///////
	csvString += "l," + xin + "," + yin + "," + xf + "," + yf + "\n";
	///////
	pic_obj.push(new object(-3,parseInt(xin*canvas.width/100),parseInt(yin*canvas.height/100),0,0,0,parseInt(xf*canvas.width/100),parseInt(yf*canvas.height/100),"",""));
	addAllEventListeners();
	resumeImgListeners();
	drawcanvas();
}

function stopImgListeners() {
	pauseFunctionality = true;
}

function resumeImgListeners() {
	pauseFunctionality = false;
}

function textbox() {
	if(con_text.value == "") {
		alert("Cannot Be Empty");
		return;
	}
	if(con_text.value.indexOf(',') !== -1) {
		alert("The character ',' is not allowed");
		return;
	}

	message.innerHTML = "Hold object and press +/- to zoom<BR>Hold object and press arrow keys to rotate";
	pic_obj.push(new object(-2,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,50,20,50,20,con_info.value,con_text.value)); //20 is pixel size
	csvString += "t," + pic_obj.length + "," + con_info.value + "," + con_text.value + "\n";
	addAllEventListeners();
	resumeImgListeners();
	container.style.display = "none";
	drawcanvas();
}

function textbox2() {
	if(con_text2.value == pic_obj[pic_obj.length - 1].text) {
		container2.style.display = "none";
		ci2++;
		sdrawcanvas();
		if(isGhost == 1)
			drawcanvas();
		simulate(0,0);
	} else {
		message.innerHTML = "Wrong value inserted...Try again!";
	}
}

function waste() {
	//ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.drawImage(img1,canvas.width - 110,0,100,100);
	ctx.drawImage(img2,canvas.width - 110,100,100,100);
	ctx.drawImage(img3,canvas.width - 110,200,100,100);
	ctx.drawImage(img4,canvas.width - 110,300,100,100);
	ctx.moveTo(canvas.width - 120,0);
	ctx.lineTo(canvas.width - 120,canvas.height);
	ctx.stroke();
}

function imageCreationListeners() {
	//ctx.drawImage(graph_back,0,0,canvas.width,canvas.height);
	td_dline.addEventListener("click",function(){drawobj(-3);});
	td_dtbox.addEventListener("click",function(){drawobj(-2);});
	td_img1.addEventListener("click",function(){createobj(1);});
	td_img2.addEventListener("click",function(){createobj(2);});
	td_img3.addEventListener("click",function(){createobj(3);});
	td_img4.addEventListener("click",function(){createobj(4);});
	td_img5.addEventListener("click",function(){createobj(5);});
	td_img6.addEventListener("click",function(){createobj(6);});
	td_img7.addEventListener("click",function(){createobj(7);});
	td_img8.addEventListener("click",function(){createobj(8);});
	td_img9.addEventListener("click",function(){createobj(9);});
	td_img10.addEventListener("click",function(){createobj(10);});
	td_img11.addEventListener("click",function(){createobj(11);});
	td_img12.addEventListener("click",function(){createobj(12);});
}

function addAllEventListeners() {
	//ctx.drawImage(graph_back,0,0,canvas.width,canvas.height);
	gencsv.addEventListener("click",genCSV);
	loadcsv.addEventListener("click",loadCSV);
	comsim.addEventListener("click",pre_simulate);
	stepsim.addEventListener("click",startStepSim);
	ghost.addEventListener("click",ghostmode);

	canvas.addEventListener("mousemove",move_img);
	canvas.addEventListener("mousedown",findobj);
	canvas.addEventListener("mouseup",finish_transform);
	window.addEventListener("keydown",zoom_rotate);
}

function removeAllEventListeners() {
	gencsv.removeEventListener("click",genCSV);
	loadcsv.removeEventListener("click",loadCSV);
	comsim.removeEventListener("click",pre_simulate);
	stepsim.removeEventListener("click",startStepSim);
	ghost.removeEventListener("click",ghostmode);

	canvas.removeEventListener("mousemove",move_img);
	canvas.removeEventListener("mousedown",findobj);
	canvas.removeEventListener("mouseup",finish_transform);
	window.removeEventListener("keydown",zoom_rotate);
}

function nextStepSim() {
	if(ci!=(csv.length-1)) {
		nextsim.removeEventListener("click",nextStepSim);
		simulate(0,0);
	}	
}

function endStepSim() {
	console.log("simulation done");
	drawcanvas();
	document.getElementById("csvDisplay").style.display = "none";
	document.getElementById("picTable").style.display = "block";
	addAllEventListeners();
	nextsim.style.display = "none";
	endstep.style.display = "none";
	gencsv.style.display = "block";
	loadcsv.style.display = "block";
	comsim.style.display = "block";
	stepsim.style.display = "block";
	isComSim = 1;
	ci = 0;
	clearTimeout(simtym);
}

function ghostmode() {
	if(csvString != "") {
		console.log("ghost mode started");
		isGhost = 1;
		pic_obj = [];
		csv2 = csvString.split("\n");
		ci2 = 0;
		pre_startGhost();
		pre_simulate();
	}
}

function endGhostMode() {
	isGhost = 0;
	removeAllEventListeners();
}

function pre_startGhost() {
	gencsv.style.display = "none";
	loadcsv.style.display = "none";
	comsim.style.display = "none";
	stepsim.style.display = "none";
}

function startStepSim() {
	if(csvString != "") {
		gencsv.style.display = "none";
		loadcsv.style.display = "none";
		comsim.style.display = "none";
		stepsim.style.display = "none";
		nextsim.style.display = "block";
		endstep.style.display = "block";
		isComSim = 0;
		pre_simulate();
	}
}

function pre_simulate() {
	if(csvString != "") {
		removeAllEventListeners();
		document.getElementById("picTable").style.display = "none";
		document.getElementById("csvDisplay").style.display = "block";
		document.getElementById("csvDisplay").innerHTML = "";
		spic_obj = [];
		ci = 0;
		csv = csvString.split("\n");
		simulate(0,0);
	}
} 

function simulate(mode,imgIn) {
	//ctx.clearRect(0,0,canvas.width,canvas.height);
	if(mode == 0) {
		document.getElementById("csvDisplay").innerHTML += (ci+1) + ". " + csv[ci] + "<BR>";
		if(csv[ci][0] == 'a') {
			var items = csv[ci].split(",");
			spic_obj.push(new object(parseInt(items[1])+1,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,100,100,100,100,"",""));
		} else if(csv[ci][0] == 't') {
			var items = csv[ci].split(",");
			//if(items[2] != "" && isGhost == 1) {
			//	document.getElementById('ques').innerHTML = items[2];
			//	spic_obj.push(new object(-2,parseInt(0.1*canvas.width),parseInt(0.32*canvas.height),0,50,20,50,20,items[2],items[3]));
			//	container2.style.display = "block";
			//	return;
			//} else {
				spic_obj.push(new object(-2,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,50,20,50,20,items[2],items[3]));
			//}
		} else if(csv[ci][0] == 'l') {
			var items = csv[ci].split(",");
			spic_obj.push(new object(-3,parseInt(items[1]*canvas.width/100),parseInt(items[2]*canvas.height/100),0,0,0,parseInt(items[3]*canvas.width/100),parseInt(items[4]*canvas.height/100),"",""));
		} else if(csv[ci][0] == 'd') {
			var items = csv[ci].split(",");
			spic_obj.splice(parseInt(items[1])-1,1);
		} else if(csv[ci][0] == 'c') {
			var items = csv[ci].split(",");
			var changeIndex = parseInt(items[1])-1;
			spic_obj.push(new object(parseInt(items[2])+1,spic_obj[changeIndex].x,spic_obj[changeIndex].y,spic_obj[changeIndex].a,100,100,spic_obj[changeIndex].fw,spic_obj[changeIndex].fh,"",""));
			spic_obj.splice(changeIndex,1);
		} else if(csv[ci][0] == 'm') {
			var items = csv[ci].split(",");
			imgIn = parseInt(items[1])-1;
			mode = 1;
			sx = parseInt(parseInt(items[4])*canvas.width/100);
			sy = parseInt(parseInt(items[5])*canvas.height/100);
			sd = Math.abs(Math.atan((spic_obj[imgIn].y-sy)/(spic_obj[imgIn].x-sx)));
			console.log("sd: "+(sd*180/Math.PI));
		} else if(csv[ci][0] == 's') {
			var items = csv[ci].split(",");
			imgIn = parseInt(items[1])-1;
			mode = 2;
			ss = parseInt(parseInt(items[2])*canvas.height/100);
		} else if(csv[ci][0] == 'r') {
			var items = csv[ci].split(",");
			imgIn = parseInt(items[1])-1;
			mode = 3;
			sr = parseInt(items[2]);
		}
	}	

	if(mode == 1) {
		if(Math.sqrt(Math.pow(Math.abs(sx-spic_obj[imgIn].x),2) + Math.pow(Math.abs(sy-spic_obj[imgIn].y),2)) > 2) {
			if(sx > spic_obj[imgIn].x) {
				spic_obj[imgIn].x += (2*Math.cos(sd));
			} else if(sx < spic_obj[imgIn].x) {
				spic_obj[imgIn].x -= (2*Math.cos(sd));
			}
			if(sy > spic_obj[imgIn].y) {
				spic_obj[imgIn].y += (2*Math.sin(sd));
			} else if(sy < spic_obj[imgIn].y) {
				spic_obj[imgIn].y -= (2*Math.sin(sd));
			} 
		} else {
			spic_obj[imgIn].x = sx;
			spic_obj[imgIn].y = sy;
			ghostIn = imgIn;
			mode = 0;
			imgIn = 0;
			ci++;
		}
	} else if(mode == 2) {
		if(spic_obj[imgIn].fh<ss) {
			if(Math.abs(spic_obj[imgIn].fh-ss) < 2) {
				spic_obj[imgIn].fh = ss;
				spic_obj[imgIn].fw += Math.abs(spic_obj[imgIn].fh-ss);
			}	
			else {
				spic_obj[imgIn].fh += 2;
				spic_obj[imgIn].fw += 2;
			}	
		} else if(spic_obj[imgIn].fh>ss) {
			if(Math.abs(spic_obj[imgIn].fh-ss) < 2) {
				spic_obj[imgIn].fh = ss;
				spic_obj[imgIn].fw -= Math.abs(spic_obj[imgIn].fh-ss);
			}	
			else {
				spic_obj[imgIn].fh -= 2;
				spic_obj[imgIn].fw -= 2;
			}	
		} else {
			ghostIn = imgIn;
			mode = 0;
			imgIn = 0;
			ci++;
		}
	} else if(mode == 3) {
		if(spic_obj[imgIn].a<sr) 
			spic_obj[imgIn].a += 2;
		else if(spic_obj[imgIn].a>sr) 
			spic_obj[imgIn].a -= 2;
		else {
			ghostIn = imgIn;
			mode = 0;
			imgIn = 0;
			ci++;
		}
	} else {
		ci++;
	}

	if(isGhost == 1) {
		if(mode == 0 && (csv[ci-1][0] == 'm' || csv[ci-1][0] == 's' || csv[ci-1][0] == 'r' || csv[ci-1][0] == 't')) {
			var items2 = csv[ci-1].split(",");
			ghostSelect = parseInt(items2[1])-1;
			while(ci2<(ci)) {
				if(csv2[ci2][0] == 'a') {
					var items = csv2[ci2].split(",");
					pic_obj.push(new object(parseInt(items[1])+1,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,100,100,100,100,"",""));
					ci2++;
					sdrawcanvas();
					drawcanvas();
				} else if(csv2[ci2][0] == 'l') {
					var items = csv2[ci2].split(",");
					pic_obj.push(new object(-3,parseInt(items[1]*canvas.width/100),parseInt(items[2]*canvas.height/100),0,0,0,parseInt(items[3]*canvas.width/100),parseInt(items[4]*canvas.height/100),"",""));
					ci2++;
					sdrawcanvas();
					drawcanvas();
				} else if(csv2[ci2][0] == 'd') {
					var items = csv2[ci2].split(",");
					pic_obj.splice(parseInt(items[1])-1,1);
					ci2++;
					sdrawcanvas();
					drawcanvas();
				} else if(csv2[ci2][0] == 'c') {
					var items = csv2[ci2].split(",");
					var changeIndex = parseInt(items[1])-1;
					pic_obj.push(new object(parseInt(items[2])+1,pic_obj[changeIndex].x,pic_obj[changeIndex].y,pic_obj[changeIndex].a,100,100,pic_obj[changeIndex].fw,pic_obj[changeIndex].fh,"",""));
					pic_obj.splice(changeIndex,1);
					ci2++;
					sdrawcanvas();
					drawcanvas();
				} else if(csv2[ci2][0] == 't') {
					var items = csv2[ci2].split(",");
					if(items[2] == "") {
						pic_obj.push(new object(-2,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,50,20,50,20,items[2],items[3]));
					} else {
						pic_obj.push(new object(-2,parseInt(initialX*canvas.width),parseInt(initialY*canvas.height),0,50,20,50,20,items[2],items[3]));
						document.getElementById('ques').innerHTML = items[2];
						container2.style.display = "block";
						return;
					}
					ci2++;
					sdrawcanvas();
					drawcanvas();
				} else {
					break;
				}
			}
				
			ghost_cx = pic_obj[ghostIn].x;
			ghost_cy = pic_obj[ghostIn].y;
			ghost_ca = pic_obj[ghostIn].a;
			ghost_cw = pic_obj[ghostIn].fw;
			ghost_ch = pic_obj[ghostIn].fh;

			canvas.addEventListener("mousemove",move_img);
			canvas.addEventListener("mousedown",findobj);
			canvas.addEventListener("mouseup",finish_transform);
			window.addEventListener("keydown",zoom_rotate);
			return;
		}
	}

	sdrawcanvas();
	if(isGhost == 1)
		drawcanvas();

	if(mode==0 && isComSim==0) {
		nextsim.addEventListener("click",nextStepSim);
		return;
	} else if(ci!=(csv.length-1)) {
		if(mode == 0)
			simtym = setTimeout(function(){simulate(mode,imgIn);},100);
		else
			simtym = setTimeout(function(){simulate(mode,imgIn);},5);
	} else {
		console.log("simulation done");
		drawcanvas();
		document.getElementById("csvDisplay").style.display = "none";
		document.getElementById("picTable").style.display = "block";
		addAllEventListeners();
		nextsim.style.display = "none";
		endstep.style.display = "none";
		gencsv.style.display = "block";
		loadcsv.style.display = "block";
		comsim.style.display = "block";
		stepsim.style.display = "block";
		isComSim = 1;
		clearTimeout(simtym);
	}
}

var xmlHttp;
function init_ajax() {
	
		if(window.ActiveXObject){
			try{xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}
			catch (e){xmlHttp = false;}
		}
		else{
			try{xmlHttp = new XMLHttpRequest();}
			catch (e){xmlHttp = false;}
		}
	}
		
function genCSV(){
		var ajaxRequest;  // The variable that makes Ajax possible!
		var FileName = "";
		if (typeof(Storage) != "undefined") {
			// Retrieve
			Username = localStorage.getItem("Username");
			specification = localStorage.getItem("specification");
			//alert(Username+ '  '+specification);
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			 var str = ajaxRequest.responseText;
			 FileName = str;
			 if (typeof(Storage) != "undefined") {
				localStorage.setItem("FileName", FileName);
			} else {
				alert("Sorry, your browser does not support Web Storage...");
			}
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "data="+csvString;
		 ajaxRequest.open("POST", "create.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);		
		
		alert("Simulation generated successfully. Go for next step.");
		window.close(window.location.href);
		
	}

function loadCSV(){
		
		init_ajax();
		if(!xmlHttp){
			console.log('xmlhttp not working ...');
		}
		else {
			xmlHttp.onreadystatechange=function(){
			  if (xmlHttp.readyState==4 && xmlHttp.status==200){
					csvString = xmlHttp.responseText;
				}
			  else {
			  }
			 }
			 
			xmlHttp.open("GET","display.php",true);
			xmlHttp.send();
		}
		
	}

	//////////////////////////////////////
	//////////////////////////////////////

		window.onload = function checkingLogin(){		
			if (typeof(Storage) != "undefined") {
			// Retrieve
				Username = localStorage.getItem("Username");
				specification = localStorage.getItem("specification");
				if(Username == "" || Username == null){
					alert("Please login first.");
					window.open("http://localhost/newAakashSiteMergeUpload/signIn.php","_self");
				}
				else if(specification == "reviewer"){
					alert("Please login as contributor.");
					window.open("http://localhost/newAakashSiteMergeUpload/signIn.php","_self");
				}
				else{
					//alert(Username+ '  '+specification);
					//increment();
					//updateSignIn();
				}
			} else {
				alert("Sorry, your browser does not support Web Storage...");
			}
		}

////////////////////////////////////
/////////////////////////////////////	
	
addAllEventListeners();
imageCreationListeners();

</script>


</body>
</html>
