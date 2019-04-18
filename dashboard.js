var modal = document.getElementById("customer_form");

var btn = document.getElementById("place_order");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

// clicking anywhere outside the modal closes it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}