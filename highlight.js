$(document).ready(function(){

var code=$('.highlight')[0];
var editor=CodeMirror.fromTextArea(code,{
	
	lineNumbers:true,
	lineWrap:true,
	styleActiveLine:true,
	autoCloseBrackets:true,
	autoCloseTags:true,
	matchBrackets: true,
	
	matchTags:{bothTags: true},
	extraKeys: {"Ctrl-J": "toMatchingTag",
				"Alt-F": "findPersistent",
				"Ctrl-F": "find",
				"Ctrl-Space":"autocomplete",
				"F11":function(cm){
					cm.setOption("fullScreen",!cm.getOption("fullScreen"))
				},
				"Esc":function(cm){
					if(cm.getOption("fullScreen"))cm.setOption("fullScreen",false)
				}
	}
	});
	//language change
$('#language').on('change', function() {
	
   editor.setOption("mode",this.value);
   
 
   
   
});
//theme change
$('#theme').on('change', function() {

	var theme=this.value;
	var style1= '<link rel="stylesheet" href="codemirror-5.16.0\\theme\\'+theme+'.css">';
	
	$('head').append(style1);
	
   editor.setOption("theme",this.value);
  
   
   
});
// user jquery
$("#custom_textarea").hide();

$("#custom_input").click(function(){
	if($(this).is(":checked")){
		$("#custom_textarea").fadeIn(1000);
		
	}
	else{
		
		$("#custom_textarea").fadeOut(1000);
	}
});

$("#submit").click(function(){
	
	var language = document.forms["input_form"]["language"].value;
    var code = editor.getValue();


    if (language != "text/x-csrc" || language == "") {
        alert("Currently we are supporting C language only.");
		document.forms["input_form"]["language"].focus();
        return false;
    } else if (code == "" || code == null) {
        alert("Please enter the code you want to run in the editor.");
        return false;
    } else {
		
		$("#custom_textarea").fadeOut(1000);
        document.getElementById("output").style = "border:2px solid grey; height:auto;";
    }

	});

});