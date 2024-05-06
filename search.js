function searchMenu() {
    
    var input = document.getElementById("form-control me-2").value.toLowerCase();

    
    var productTitles = document.querySelectorAll(".product-title");

   
    productTitles.forEach(function(title) {
        var productBox = title.parentElement;
        var productName = title.textContent.toLowerCase();

       
        if (productName.includes(input)) {
            productBox.style.display = "block"; 
        } else {
            productBox.style.display = "none"; 
        }
    });
}





