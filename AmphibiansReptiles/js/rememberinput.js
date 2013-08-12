/**
 * @author Aidan Quinn
 */


		/***********************************************
		* Remember Text INPUT field values- by JavaScriptKit.com
		* This notice MUST stay intact for use
		* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and more
		***********************************************/

		var remembervalues_days=60 //Remember text input values for how many days?
		var dyncookiename=encodeURI(window.location.pathname) //Name of cookie. Changes depending on the page.
		
		var recallinput=function(){
		var cookienamevalue=rememberinput.getCookie(dyncookiename).split("##")
		for (var i=0; i<cookienamevalue.length; i++){
		var cookiename=cookienamevalue[i].split("#")[0]
		var cookievalue=cookienamevalue[i].split("#")[1]
		if (document.getElementById(cookiename)!=null && (document.getElementById(cookiename).type=="tel" || document.getElementById(cookiename).type=="date" || document.getElementById(cookiename).type=="number" || document.getElementById(cookiename).type=="text" || document.getElementById(cookiename).type=="email")) //if this text field has a stored value
		document.getElementById(cookiename).value=decodeURI(cookievalue)
		}
		}
		
		var rememberinput=function(){
		var rememberit=""
		for (var i=0; i<arguments.length; i++){
		if ((document.getElementById(arguments[i]).type=="date" || document.getElementById(arguments[i]).type=="number" || document.getElementById(arguments[i]).type=="tel" || document.getElementById(arguments[i]).type=="text"  || document.getElementById(arguments[i]).type=="email") && document.getElementById(arguments[i]).value!="") //if this is a form text INPUT and not empty
		rememberit+=arguments[i]+"#"+encodeURI(document.getElementById(arguments[i]).value)+"##"
		}
		rememberinput.setCookie(dyncookiename, rememberit, remembervalues_days)
		}
		
		rememberinput.getCookie=function(Name){ //get cookie value
		var re=new RegExp(Name+"=[^;]+", "i"); //construct RE to search for target name/value pair
		if (document.cookie.match(re)) //if cookie found
		return document.cookie.match(re)[0].split("=")[1] //return its value
		return ""
		}
		
		rememberinput.setCookie=function(name, value, days){ //set cookie value
		var expireDate = new Date()
		//set "expstring" to either future or past date, to set or delete cookie, respectively
		var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days))
		document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+";";
		}
		
		if (window.addEventListener) {
			window.addEventListener("load", recallinput, false)
		}
		else if (window.attachEvent){
			window.attachEvent("onload", recallinput)
		}
		else if (document.getElementById){
			window.onload=recallinput
			};