// Registration JS validation

const form = document.getElementById('form');

const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password1 = document.getElementById('password1');
const password2 = document.getElementById('password2');

const errorElement = document.getElementById('error');

form.addEventListener('registerbtn', e => {
	let message = []
	if (fname.value === '' || fname.value == null){
		message.push('Name is required')
	}
	
	if (lname.value === '' || lname.value == null){
		message.push('Surname is required')
	}
	
	if (username.value === '' || username.value == null){
		message.push('Username is required')
	}
	
	if (email.value === '' || email.value == null){
		message.push('Email is required')
	}
	
	if (password1Value === ''){
		setError(password1, 'Password is required');
	}else if{
		setError(password1, 'Password should be 6 more characters!')
	}
	else{
		setSuccess(password1);
	}
	
	if (password2Value === ''){
		setError(password2, 'Password is required');
	}else if{
		setError(password2, 'Passwords do not match!')
	}
	else{
		setSuccess(password2);
	}
	
	if (messages.length > 0){
		e.preventDefault()
		errorElement.innerText = message.join(', ')
	}
	
})