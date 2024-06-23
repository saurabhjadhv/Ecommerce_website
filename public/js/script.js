document.getElementById('pay-button').onclick = function(e) {
    alert("hi");
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var amount = document.getElementById('amount').value * 100; // Converting to smallest currency unit

    var options = {
        "key": "YOUR_RAZORPAY_KEY", // Enter the Key ID generated from the Dashboard
        "amount": amount,
        "currency": "INR",
        "name": "candere by kalyan jewelers",
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        "handler": function (response){
            alert("Payment successful!");
            console.log(response);
        },
        "prefill": {
            "name": name,
            "email": email,
        },
        "theme": {
            "color": "#0080ff"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
}
