<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    {{-- for server  --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-fthieMNU.css') }}">
    <script src="{{ asset('build/assets/app-vZDQhnJA.js') }}"></script>
    <style>
        .invoice {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 600px;
            margin: auto;
            background-color: #fff;
            color: #111827;
        }

        .header {
            text-align: center;
            padding: 16px;
            background-color: #f3f4f6;
        }

        .header h2 {
            font-size: 2rem;
            font-weight: 600;
        }

        .details p {
            margin-bottom: 3px;
        }

        .barcode-qr-code {


            text-align: center;
            margin: 10px auto;
        }

        .barcode-qr-code img,
        .barcode-qr-code svg {
            max-width: 15%;
            height: auto;
            margin-bottom: 8px;
        }

        .payment-info p {
            margin-bottom: 3px;
        }

        .footer {
            padding: 16px;
            text-align: center;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class=" rounded shadow-sm p-8 my-8">
        <x-card>
            <div class="invoice">
                <div class="header">
                    <h2>Invoice Slip</h2>
                </div>

                <div class="details px-8 py-2">
                    <p class="flex justify-between my-3"><strong>Token No:</strong> #123456</p>
                    <p class="flex justify-between my-3"><strong>Date:</strong> January 22, 2024</p>
                    <p class="flex justify-between my-3"><strong>Time:</strong> 11.00 pm - 12.30 am</p>
                </div>

                <div class="barcode-qr-code flex justify-between px-8">
                    <!-- Include barcode image here -->
                    <img src="data:image/png;base64,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"
                        alt="Barcode">
                    <br>
                    <!-- Include QR code image here -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example" alt="QR Code">
                </div>

                <div class="payment-info py-2 px-8">
                    <p class="flex justify-between my-3"><strong>Payment Type:</strong> Advance</p>
                    <p class="flex justify-between my-3"><strong>Total:</strong> $500</p>
                    <p class="flex justify-between my-3"><strong>Advance:</strong> $100</p>
                    <p class="flex justify-between my-3"><strong>Due:</strong> $400</p>
                    <p class="flex justify-between my-3"><strong>Payment Method:</strong> bKash</p>
                    <p class="flex justify-between my-3"><strong>Transaction Number:</strong> 123456789</p>
                    <p class="flex justify-between my-3"><strong>Transaction ID:</strong> ABCDEF123</p>
                </div>

                <div class="footer">
                    <p class="text-sm">Thank you for your booking!</p>
                </div>
            </div>


        </x-card>
    </div>

</body>

</html>
