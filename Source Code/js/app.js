window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle
    ('window-scroll', window.scrollY > 0)
 })
 
 let profile = document.querySelector('.nav .flex .profile');
 
 document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    search.classList.remove('active');
 }
 
 let search = document.querySelector('.nav .flex .search-form');
 
 document.querySelector('#search-btn').onclick = () =>{
    search.classList.toggle('active');
    profile.classList.remove('active');
 }
 
 const menu = document.querySelector(".navmenu");
 const openmenu = document.querySelector("#menu-btn");
 const closemenu = document.querySelector("#close-btn");
 
 openmenu.addEventListener('click', () => {
    menu.style.display="flex";
    closemenu.style.display="inline-block";
    openmenu.style.display="none";
    
 })
 
 const closeNav = () => {
    menu.style.display = "none";
    closemenu.style.display="none";
    openmenu.style.display="inline-block";
 
 }
 closemenu.addEventListener('click', closeNav)
 
 
 
 const faqs = document.querySelectorAll('.faq');
 faqs.forEach(faq => {
    faq.addEventListener('click', () => {
       faq.classList.toggle('open');
    
    const icons=faq.querySelector('.faq_icon i');
    if(icons.className === 'uil uil-plus'){
       icons.className="uil uil-minus";
    }
    else{
       icons.className="uil uil-plus";
    }
    })
 })
 let toggleBtn = document.getElementById('toggle-btn');
 let body = document.body;
 let darkMode = localStorage.getItem('dark-mode');
 
 const enableDarkMode = () =>{
    toggleBtn.classList.replace('fa-sun', 'fa-moon');
    body.classList.add('dark');
    localStorage.setItem('dark-mode', 'enabled');
 }
 
 const disableDarkMode = () =>{
    toggleBtn.classList.replace('fa-moon', 'fa-sun');
    body.classList.remove('dark');
    localStorage.setItem('dark-mode', 'disabled');
 }
 
 if(darkMode === 'enabled'){
    enableDarkMode();
 }
 
 toggleBtn.onclick = (e) =>{
    darkMode = localStorage.getItem('dark-mode');
    if(darkMode === 'disabled'){
       enableDarkMode();
    }else{
       disableDarkMode();
    }
 }