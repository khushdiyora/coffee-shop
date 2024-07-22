let cart = [];

function addToCart(item) {
const itemIndex = cart.findIndex(cartItem => cartItem.name === item.name);
if (itemIndex !== -1) {
 cart[itemIndex].quantity += 1;
} else {
 cart.push({ ...item, quantity: 1 });
}
updateCartUI();
}

function updateQuantity(name, quantity) {
const itemIndex = cart.findIndex(cartItem => cartItem.name === name);
if (itemIndex !== -1) {
 cart[itemIndex].quantity += quantity;
 if (cart[itemIndex].quantity <= 0) {
     cart.splice(itemIndex, 1);
 }
}
updateCartUI();
}

function updateCartUI() {
const cartContainer = document.getElementById('cart-items');
cartContainer.innerHTML = '';

cart.forEach(item => {
 const cartItem = document.createElement('div');
 cartItem.classList.add('cart-item');
 cartItem.innerHTML = `
     <div class="cart-item-info">
         <span class="cart-item-name">${item.name}</span>
         <span class="cart-item-price">$${item.price.toFixed(2)}</span>
     </div>
     <div class="cart-item-quantity">
         <button class="quantity-btn" onclick="updateQuantity('${item.name}', -1)">-</button>
         <span>${item.quantity}</span>
         <button class="quantity-btn" onclick="updateQuantity('${item.name}', 1)">+</button>
     </div>
 `;
 cartContainer.appendChild(cartItem);
});
}

function checkout() {
    let total = 0;

    let billContent = `
    <div style="text-align: center;">
        <img src="../images/main-logo-transparent.png" alt="Cafe Logo" style="width: 150px; height: auto;">
        <h1>Arabica Cofféé - Order Receipt</h1>
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px;">Item</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Price</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Quantity</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Total</th>
                </tr>
            </thead>
            <tbody>
    `;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        billContent += `
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">${item.name}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">$${item.price.toFixed(2)}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">${item.quantity}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">$${itemTotal.toFixed(2)}</td>
            </tr>
        `;
    });

    billContent += `
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="border: 1px solid #ddd; padding: 8px; text-align: right;"><strong>Total</strong></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><strong>$${total.toFixed(2)}</strong></td>
                </tr>
            </tfoot>
        </table>
        <p>Thank you for your purchase!</p>
        <p style="color:brown">Arabica Café </p>
        <p>Digital Stamp Arabica Cofféé</p>
        <div style="text-align: center;">
            <img src="../images/main-logo-transparent-orange-circle-gray.png" alt="Cafe Logo" style="width: 150px; height: auto;">
        </div>
        <div style="text-align: bottom;">
        <h5>
        <p>support@arabicacafe.com</p>
        <p>+91 (931)-689-0367</p>
        </h5>
        </div>
        <br>
        <br>
        <form id="sendEmailForm" action="./send_invoince.php" method="POST" target="_blank">
            <input type="hidden" name="billContent" value="${encodeURIComponent(billContent)}">
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Send Details</button>
        </form>
        
    `;

    const billWindow = window.open('', '_blank');
    billWindow.document.write(`
        <html>
            <head>
                <title>Arabica Cofféé - Order Receipt</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    h1 { text-align: center; }
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ddd; padding: 8px; }
                    th { background-color: #f2f2f2; }
                    tfoot { font-weight: bold; }
                </style>
            </head>
            <body>${billContent}</body>
        </html>
    `);
    billWindow.document.close();

    cart = [];
    updateCartUI();
}

function printInvoice() {
    window.print();
}
