$(document).ready(function() {
    // Function to update cart icon
    function updateCartIcon(numItems) {
        if (numItems > 0) {
            $('#cart-icon').addClass('has-items');
            $('#cart-badge').text(numItems).show(); // Show badge and update text
        } else {
            $('#cart-icon').removeClass('has-items');
            $('#cart-badge').hide(); // Hide badge when no items
        }
    }

    // Example: Get the number of items in the cart (replace with your actual logic)
    var numItemsInCart = 1; // Replace with your actual code to get the number of items

    // Update cart icon initially
    updateCartIcon(numItemsInCart);
});

// Function to handle click on heart icon
$(document).on('click', '.fa-heart', function() {
    var productId = $(this).attr('id').split('-')[2];
    
    // Make an AJAX request to add to favorites
    addToFavorites(productId);

    // Change color of the heart icon to red by changing the class
    $(this).removeClass('far').addClass('fas').css('color', 'red');
});

function addToFavorites(productId) {
    // Make an AJAX request
    $.ajax({
        type: "POST",
        url: "favorit.php",
        data: { product_id: productId },
        success: function(response) {
            if (response === "added") {
                // If product is successfully added to favorites, you may handle it here
            } else {
                // Handle error or display a message
                console.error("Error adding product to favorites.");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
        }
    });
}

