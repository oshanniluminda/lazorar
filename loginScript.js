const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container"); 

sign_up_btn.addEventListener('click',() =>{
    container.classList.add("sign-up-mode")
});

sign_in_btn.addEventListener('click',() =>{
    container.classList.remove("sign-up-mode")
}); 

//validation 
var usernameError =document.getElementById('username-error');
var emailError =document.getElementById('email-error');
var passwordError =document.getElementById('password-error');
var comPasswordError = document.getElementById('com-password-error');
var submitError =document.getElementById('submit-error'); 
var uError =document.getElementById('uerror'); 
var eError =document.getElementById('emailerror');
var passError =document.getElementById('passerror');
var pass2Error =document.getElementById('pass2error');


function validateUserName(){
	var username=document.getElementById('username').value; 
	if (username.length==0){
		usernameError.innerHTML = '<i class="fas fa-times"></i>'; 
		uError.innerHTML = 'Username is required*'; 
		return false;
	} 
	usernameError.innerHTML ='<i class="fas fa-check"></i>';
	uError.innerHTML = '';
	return true;

}  

function validateEmail(){
	var email = document.getElementById('email').value;

	if(email.length == 0){
		emailError.innerHTML ='<i class="fas fa-times"></i>';
		eError.innerHTML = 'Email is required*'; 
		return false;
	} 
	if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
	   emailError.innerHTML ='<i class="fas fa-times"></i>';
	   eError.innerHTML = 'Invalid email*'; 
	   return false;
	}  
	else{
		emailError.innerHTML ='<i class="fas fa-check"></i>' ;
		eError.innerHTML = ''; 
		return true;
	}
	
}   

function validatePassword(){
	var password = document.getElementById('password').value;

	if(password.length == 0){
		passwordError.innerHTML ='<i class="fas fa-times"></i>';
		passError.innerHTML = 'Password is required*';
		return false;
	}  
	if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)){
		passwordError.innerHTML ='<i class="fas fa-times"></i>';
		passError.innerHTML = 'Minimum 8 digits at least inlude a uppercase , a number and a special character';
		return false;
	}  
	else{
		passwordError.innerHTML ='<i class="fas fa-check"></i>' ;
		passError.innerHTML = '';
		return true;
	}
	
}   

function validateComfirmPassword(){ 
	var password = document.getElementById('password').value;
	var comPassword = document.getElementById('comfirm-password').value;

	if(comPassword.length == 0){
		comPasswordError.innerHTML ='<i class="fas fa-times"></i>';
		pass2Error.innerHTML = 'Confirm Password is required*';
		return false;
	} 
	if(password != comPassword){
	   comPasswordError.innerHTML ='<i class="fas fa-times"></i>';
	   pass2Error.innerHTML = 'Password does not match*';
	   return false;
	}  
	else{
		comPasswordError.innerHTML ='<i class="fas fa-check"></i>' ;
		pass2Error.innerHTML = '';
		return true;
	}
	
} 

function validateForm(){
	if ( !validateUserName()||  !validateEmail() || !validatePassword() || !validateComfirmPassword()) {
        submitError.innerHTML ="Please fix error to submit!!";
		return false;
	}  
	else { 
        submitError.innerHTML =" ";
		return true;
	}
}  
