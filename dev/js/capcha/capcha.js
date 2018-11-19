//init global vars
var numberA=Math.floor(Math.random() * 25);
var numberB=Math.floor(Math.random() * 25); ///random numbers
var CapchaAnswer;

show_numbers();
document.getElementById('form').onsubmit = function() { return answer(); };

function show_numbers()
{
	//init variables
	var randomOperand=Math.floor(Math.random() * 1);
    if (randomOperand==0)

     {
     	document.getElementById("NumberA").innerHTML=numberA;
     	document.getElementById("Operand").innerHTML= " + ";
     	document.getElementById("NumberB").innerHTML=numberB;
     	d=numberA+numberB;//usseles math operation
     }
     if (randomOperand==1)

     {
     	document.getElementById("NumberA").innerHTML=numberA;
     	document.getElementById("Operand").innerHTML= " - ";  /// i dont know ,this shit work or not
     	document.getElementById("NumberB").innerHTML=numberB;
     	d=numberA-numberB;//usseles math operation
     }
}

function answer()
{
	//init variebles    
	var answers=document.getElementById('Answer').value;
    answers=parseInt(answers);///entered value in  input
 	if (d==answers) 
 	{
 		alert("Поздравляю ты не робот");
 		//go to autorezation.php/registration.php/etc
 	}
 	else              
 	{
 		alert("Я вижу ты робот-гуманитарий");
 		//something do
 	}
}

function show_numbers()
{
    //init global vars
    var numberA = Math.floor(Math.random() * 25);
    var numberB = Math.floor(Math.random() * 25); ///random numbers
    var CapchaAnswer;

    //init variables
    document.getElementById("NumberA").innerHTML = numberA;
    document.getElementById("Operand").innerHTML = " + ";
    document.getElementById("NumberB").innerHTML = numberB;
    d=numberA+numberB;//usseles math operation
}

function answer()
{
    //init variebles    
    var answers = document.getElementById('Answer').value;
    answers = parseInt(answers);///entered value in  input
    if (d == answers) 
    {
        alert("Поздравляю ты не робот");
        //go to autorezation.php/registration.php/etc
        return true;
    }
    else              
    {
        show_numbers();
        document.getElementById('Answer').value = "";
        return false;
    }
}