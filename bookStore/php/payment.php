<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #007bff, #0056b3);
        }

        .payment-container {
            background: #fff;
            padding: 25px 30px;
            width: 100%;
            max-width: 420px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(135deg, #0056b3, #003c7a);
            transform: translateY(-2px);
        }

        .note {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 15px;
        }

        .card-icons {
            display: flex;
            justify-content: right;
            gap: 10px;
            margin: 10px 0;
        }

        .card-icons img {
            width: 40px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h1>Secure Payment</h1>
    <div class="card-icons">

        <img src="../img/visa.png" alt="Visa">
        <img src="../img/master.svg" alt="MasterCard">
        <img src="../img/ae.png" alt="American Express">
    </div>
    <form action="process-payment.php" method="POST">
        <label for="card-name">Cardholder Name</label>
        <input type="text" id="card-name" name="card_name" placeholder="Enter cardholder name" required>

        <label for="card-number">Card Number</label>
        <input type="number" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>

        <label for="expiry-date">Expiry Date</label>
        <input type="date" id="expiry-date" name="expiry_date" required>

        <label for="cvv">CVV</label>
        <input type="number" id="cvv" name="cvv" placeholder="123" required>

        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount" required>

        <button type="submit">Pay Now</button>
    </form>
    <p class="note">*Secure payment processing with SSL encryption</p>
</div>

</body>
</html>
