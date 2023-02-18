const category = document.getElementById('category');
const specification = document.getElementById('specification');

category.addEventListener('change', (event) => {
   if(category.value === 'woodenpallet') {
    specification.style.display = 'none';
   }else{
    specification.style.display = '';
   }
});