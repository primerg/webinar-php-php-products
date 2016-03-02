
/*
    Removes all items from your shopping cart by deleting the cart cookie
*/
function emptyCart()
{            
    console.log("Emptying cart.");
    $.cookie('cart','');
    $("#cart_item_count").text(0);    
}

function removeItem(id)
{                
    var cart_cookie = $.cookie('cart');            
    if(cart_cookie != null)
    {
        // Remove trailing comma
        cart_cookie = cart_cookie.replace(/,\s*$/, "");

        if(cart_cookie.indexOf(id)>=0)
        {
            var newCart = "";
            
            var cartSplit = cart_cookie.split(",");
            for (var i = 0; i < cartSplit.length; i++) 
            {
                if( cartSplit[i] == id )
                {
                    // Don't add it to the new cart
                }
                else
                {
                    newCart += cartSplit[i] + ",";
                }                                                                                 
            };
            newCart = newCart.trim();                    
        }                                      
        
        var count = 0;
        if( newCart.trim().length == 0 )
        {
            count = 0;
            $.cookie('cart', '');
            // Add empty cart text right when they remove the last item
            // e.g. $("#checkout_hover_button").closest("li").prepend("<p style='padding:4px'>There's nothing in your cart yet!</p>");        
        }
        else
        {                    
            $.cookie('cart', newCart);

            // Remove trailing comma after updating the cookie
            newCart = newCart.replace(/,\s*$/, "");
            count = newCart.split(",").length; 
        }
                        
        $("#cart_item_count").text(count);                
    }
}

function addToCart(menuId,element)
{
    console.log("Adding " + menuId + " to cart.");
    
    var numCartItem = $('#num_cart_items').val();
    
    // Set this to 1 for our demo
    numCartItem = 1;

    // If they added more than one of the same item                       
    var menuString = "";
    for (var i = 0; i < numCartItem; i++) {                    
        menuString += menuId + ",";
    };
    // Remove trailing comma            
    menuString = menuString.replace(/,\s*$/, "");

    menuId = menuString;            

    // Get the cookie
    var cart_cookie = $.cookie('cart');
    console.log("Cart Before Add: |" + cart_cookie + "|");

    if(cart_cookie == null)
    {
        cart_cookie = menuId + ",";
        $.cookie('cart', cart_cookie);                
    }
    else
    {
        cart_cookie += menuId + ",";
        $.cookie('cart', cart_cookie);   
    }
    // console.log("Cart After Add: |" + cart_cookie + "|");
    
    // Remove trailing comma for our count
    cart_cookie = cart_cookie.replace(/,\s*$/, "");
    var count = cart_cookie.split(",").length;
    $("#cart_item_count").text(count);
    console.log("Done adding " + menuId + " to cart.");                          
}