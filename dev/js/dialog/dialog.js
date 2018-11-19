$(document).scroll (function(){
	function getNewMessage() {
		$.ajax({
			url: "controllers/messageController.php",
			type: "POST",
			data: {newMessage: 1, idDialog :getUrlVars()["id"]},
			success: function(data){
				$('#dialog').html(data);
			}
		});
	}
	setInterval(getNewMessage, 1000);
	});
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
function loadingOldMessage(idMess){
	$.ajax({
		url: "controllers/messageController.php",
		type: "POST",
		data: {id: getUrlVars()["id"], idM: idMess},
		success: function(data){
			$('#dialog').html(data);
		}
    });
} 
function addedMessage(){
	$.ajax({
		url: "controllers/messageController.php",
		type: "POST",
		data: $("#addedMessage").serialize(),
		success: function(){
			document.getElementById('messageText').value = "";
		}
    });
} 
