const category = document.getElementById('category');
const specification = document.getElementById('specification');
const specification_sel = document.getElementById('specification_sel');

category.addEventListener('change', (event) => {
   if (category.value === 'woodenpallet') {
      specification.style.display = 'none';
      // 変更箇所 start
      specification_sel.disabled = "disabled";
      // 変更箇所 end
   } else {
      specification.style.display = '';
      // 変更箇所 start
      specification_sel.disabled = null;
      // 変更箇所 end
   }
});