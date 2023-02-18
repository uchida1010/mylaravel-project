

function itemDel() {
        
    const category = document.getElementById( "category" ) ;
    const specification = document.getElementById( "specification" ).value;
    
    if(category.textContent === "木製パレット") {
        specification.style.display="none";
    }
    alert(category.textContent);
}