let  tabsBtn = document.getElementById('tabs'),
    closeBtn = document.querySelector('.close');

tabsBtn.addEventListener('click' , function(){
    modal.style.display = 'block';
});

closeBtn.addEventListener('click' , function(){
    modal.style.display = 'none';
});