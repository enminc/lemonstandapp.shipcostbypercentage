lemonstandapp.shipcostbypercentage
==================================

Check if the ship cost quote is a value that start with a . (decimal) if so it treats it as a percentage or order total

How this works
-----------------
If the "Shop - Ship Option" Rate of a matching ship quote starts with a decimal (ex: .25) then the value is assumed to be a percentge. That value is then multiplied against the "total_price" of the order.

This allows us to have the following setup

$1.00 - $25.00 = $5
$25.01 - $50.00 = $10
$50.01 - $1000000 = .25

When the order is over $50.01 it will be 25% of the order total.
