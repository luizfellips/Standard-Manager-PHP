const mapping = {
    DVD: "dvd_attributes",
    Book: "book_attributes",
    Furniture: "furniture_attributes"
}

function HideFields(node){

    node.style.display = "none";
    node.lastElementChild.removeAttribute('required');

}
function selectProductType(value) {

    
    document.querySelectorAll('.fieldbox').forEach((node) => (HideFields(node)));

    document.getElementById(mapping[value]).style.display = "flex";
    document.getElementById(mapping[value]).style.flexDirection = "column";
    document.getElementById(mapping[value]).lastElementChild.setAttribute('required','');
    

}