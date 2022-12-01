// Mobile navigation bar

const bars = document.getElementById('bars');
const closed = document.getElementById('closed');
const navbar = document.getElementById('navbar');

if(bars){
	bars.addEventListener('click', () => {
		navbar.classList.add('active');
	})
}

if(closed){
	closed.addEventListener('click', () => {
		nav.classList.remove('active');
	})
}



	
	
